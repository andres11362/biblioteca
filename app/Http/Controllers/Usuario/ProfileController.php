<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends ResponseController
{
    public function editData()
    {
        $user = User::findOrFail(Auth::id());
 
        return view('user.edit')->with(['user' => $user]);
        
    }

    public function updateData(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name'       => 'required',
            'documento'  => 'numeric|required|between:10000000,999999999',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'direccion'  => 'required',
            'telefono'   => 'numeric|min:7'    
        ];

        $this->validate($request, $rules);

        if($request->has('name'))
        {
            $user->name = $request->name; 
        }

        if($request->has('documento'))
        {
            $user->documento = $request->documento; 
        }

        if($request->has('email') && ($user->email != $request->email))
        {
            $user->email = $request->email; 
        }

        if($request->has('direccion'))
        {
            $user->direccion = $request->direccion; 
        }

        if($request->has('telefono'))
        {
            $user->telefono = $request->telefono; 
        }

        $user->save();

        return redirect('/home');

    }

    public function editPassword()
    {
        return view('user.editPassword');
    }

    public function updatePassword(Request $request)
    {
        if(!(Hash::check($request->get('current-password'), Auth::user()->password)))
        {
            return redirect('/user/editPassword ')->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0)
        {
            return redirect('user/editPassword')->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $rules = [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ];

        $this->validate($request, $rules);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect('/home');
    }

}

