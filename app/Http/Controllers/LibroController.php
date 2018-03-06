<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();

        return view('libros.index')->with(['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.create');
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
            'nombre'    => 'required',
            'genero'    => 'required',
            'editorial' => 'required',
            'autor'     => 'required',
            'cantidad'  => 'numeric|required|between:1,10'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        Libro::create($data);

        return redirect('/libros');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);

        return view('libros.edit')->with(['libro' => $libro ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $libro = Libro::findOrFail($id);

        $rules = [
            'nombre'    => 'required',
            'genero'    => 'required',
            'editorial' => 'required',
            'autor'     => 'required',
            'cantidad'  => 'numeric|required|between:1,10'
        ];

        $this->validate($request, $rules);

        if($request->has('nombre'))
        {
            $libro->nombre = $request->nombre; 
        }

        if($request->has('genero'))
        {
            $libro->genero = $request->genero; 
        }

        if($request->has('editorial'))
        {
            $libro->editorial = $request->editorial; 
        }

        if($request->has('autor'))
        {
            $libro->autor = $request->autor; 
        }

        if($request->has('cantidad'))
        {
            $libro->cantidad = $request->cantidad; 
        }

        $libro->save();

        return redirect('/libros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);

        $libro->delete();

        return redirect('/libros');
    }
}
