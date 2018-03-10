<?php

namespace App\Http\Controllers\Prestamo;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use App\Prestamo;

class PrestamoController extends ResponseController
{
    public function index()
    {
        $prestamos = Prestamo::with('users','libros')->get();

        return view('prestamos.index')->with(['prestamos' => $prestamos]);   
    }

    public function prestamo(Request $request)
    {
        $prestamo = Prestamo::findOrFail($request->id);

        $val = $request->val;

        $est = $prestamo->estado;

        $status = 200;
        $mensaje = 'Cambio de estado realizado correctamente';

        if($est == 0){
            $prestamo->estado = Prestamo::ESTADO_PRESTAMO;
            $prestamo->save();
        }else{
            $status = 422;
            $mensaje = 'Para entregar un libro se debe haber solicitado previamente';
        }

        return response()->json(['mensaje' => $mensaje] , $status);
    }

    public function devolucion(Request $request)
    {
        $prestamo = Prestamo::findOrFail($request->id);

        $val = $request->val;

        $est = $prestamo->estado;

        $status = 200;
        $mensaje = 'Cambio de estado realizado correctamente';

        if($est == 1){
            $prestamo->estado = Prestamo::ESTADO_DEVOLUCION;
            $prestamo->save();
        }else{
            $status = 422;
            $mensaje = 'Para devolver un libro se debe haber sido prestado con anterioridad';
        }
        
        return response()->json(['mensaje' => $mensaje] , $status);
    }

}
