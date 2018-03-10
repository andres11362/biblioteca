<?php

namespace App\Http\Controllers\Prestamo;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Auth;
use App\Prestamo;
use App\Libro;
use Carbon\Carbon;

class TransactionController extends ResponseController
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
                          ->where('id_user', Auth::id())->exists();

                  
        $libro = Libro::findOrFail($request->id_libro);


        $texto = 'Prestamo';
        
        if($libro->cantidad > 1)
        {
            if(!$query){

                $libro->cantidad = $libro->cantidad - 1;
    
                $libro->save();
    
                Prestamo::create([
                    'id_libro'      => $request->id_libro,
                    'id_user'       => Auth::id(),
                    'fecha_inicio'  => Carbon::now()->addHours(5),
                    'fecha_fin'     => Carbon::now()->addDays(5)
                    ]
                );

                $this->success($texto.' asignado correctamente');
    
            }else{
                $this->error('Ya tienes un prestamo con el libro relacionado');
                return redirect('prestamo');
            }
        }else{
            $this->error('No hay existencias del libro solicitado');
            return redirect('prestamo');
        }

        return redirect('prestamo');
        
    }


}
