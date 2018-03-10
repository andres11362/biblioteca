<?php

namespace App\Http\Controllers\Libro;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use App\Libro;
use Illuminate\Support\Facades\Storage;
use File;

class LibroController extends ResponseController
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
            'img'       => 'required|mimes:jpeg,jpg,png|max:1000',
            'cantidad'  => 'numeric|required|between:1,10'
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        $imagen = $request->file('img');

        $data['path'] = $imagen->guessExtension();

        $nombre = $request->nombre. '.' . $data['path'];

        $data['img'] = $nombre;

        Libro::create($data);

        Storage::disk('images')->put($nombre, \File($imagen));

        $texto = 'Libro';

        $this->success( $texto.' insertado correctamente');

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
            'cantidad'  => 'numeric|required|between:1,10',
            'img'       => 'mimes:jpeg,jpg|max:1000',
        ];

        $this->validate($request, $rules);

        $ruta = 'public/imagenes/';

        if($request->hasFile('img'))
        {
            $imagen = $request->file('img');
            $path = $imagen->guessExtension();
            Storage::delete($ruta.$libro->img);
            Storage::disk('images')->put($libro->img, \File($imagen));
        }

        if($request->has('nombre') && ($request->nombre != $libro->nombre))
        {
            Storage::move($ruta.$libro->img, $ruta.$request->nombre.'.'.$libro->path);
            $libro->nombre = $request->nombre;
            $libro->img    = $request->nombre.'.'.$libro->path; 
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

        $texto = 'Libro';

        $this->success( $texto.' actualizado correctamente');

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

        $ruta = 'public/imagenes/';

        Storage::delete($ruta.$libro->img);

        $libro->delete();

        $texto = 'Libro';

        $this->success( $texto.' eliminado correctamente');

        return redirect('/libros');
    }
}
