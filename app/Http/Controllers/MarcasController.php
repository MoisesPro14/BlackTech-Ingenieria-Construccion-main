<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-marca|crear-marca|editar-marca|borrar-marca')->only('index');
        $this->middleware('permission:crear-marca', ['only' => ['store']]);
        $this->middleware('permission:editar-marca', ['only' => ['update']]);
        $this->middleware('permission:borrar-marca', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo almacen que contiene la tabla categoria
    public function index()
    {
        $marcas = Marca::all();
        return view('mantenimiento.marcas.index ', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //EN el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla Marcas.
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required|unique:marcas,descripcion',
        ]);

        Marca::create($request->all());
    //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('marcas.index')->with('create', 'Registro agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla Marcas ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, Marca $marca)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $marca->update($request->all());
        //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('marcas.index')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN el destroy enviamos el id que deseamos eliminar y al hacer click en el boton aceptar, te redirecciona a la vista index
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('marcas.index')->with('delete', 'Registro eliminado correctamente');
    }
}
