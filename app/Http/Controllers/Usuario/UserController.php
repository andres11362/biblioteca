<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use App\User;
use App\Mail\UserRegistration;
use Illuminate\Support\Facades\Mail;

class UserController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index')->with([ 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'       => 'required',
            'documento'  => 'numeric|required|between:10000000,999999999',
            'email'      => 'required|email|unique:users',
            'direccion'  => 'required',
            'telefono'   => 'numeric|min:7'    
        ];

        $this->validate($request, $rules);

        $campos = $request->all();

        $passrandom = substr(md5(microtime()),1,6);

        $campos['password'] = bcrypt($passrandom);
        $campos['role'] = User::verificarRolePrimerUsuario();
        $campos['estado'] = User::verificarEstadoPrimerUsuario();

        $user = User::create($campos);

        Mail::to($user->email)->send(new UserRegistration($user));

        return redirect('/users');

    }

    public function changeRole(Request $request)
    {
        $user = User::findOrFail($request->id);

        $val = $request->val;

        if($val == 1){
            $user->role = User::USUARIO_ADMINISTRADOR;
        }else{
            if($val == 2){
                $user->role = User::USUARIO_BIBLIOTECARIO;
            }else{
                if($val == 3){
                    $user->role = User::USUARIO_NORMAL;
                }else{
                    return response()->json(['mensaje' => 'Cambio de rol incorrecto'], 422);
                }
            }
        }

        $user->save();

        return response()->json(['mensaje' => 'Cambio de rol realizado correctamente'] , 200);       
    }

}
