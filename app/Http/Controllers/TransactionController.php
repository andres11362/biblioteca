<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Prestamo;
use App\Libro;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::where('id_user', Auth::id())->get();

        return view('prestamo.index')->with(['prestamos' => $prestamos ]);
        
    }

    public function create()
    {
        $libros = Libro::all()->pluck('nombre', 'id');

        return view('prestamo.create')->with(['libros' => $libros ]);
    }

    public function store(Request $request)
    {
    
        $rules = [
            'id_libro' => 'required',
        ];

        $this->validate($request, $rules);

        $query = Prestamo::where('id_libro', $request->id_libro)
                          ->where('id_user', Auth::id());

        if(!$query){
            $libro = Prestamo::create([
                'id_libro'      => $request->id_libro,
                'id_user'       => Auth::id(),
                'fecha_inicio'  => Carbon::now()->addHours(5),
                'fecha_fin'     => Carbon::now()->addDays(5)
                ]
            );
        }else
        {
            return redirect('prestamo');
        }

        return redirect('prestamo');
        
    }


}
