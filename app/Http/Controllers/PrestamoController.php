<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('users','libros')->get();

        return view('prestamos.index')->with(['prestamos' => $prestamos]);   
    }
}
