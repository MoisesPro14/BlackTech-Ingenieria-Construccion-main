<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaTrabajador;

class CategoriaTrabajadorController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-trabajadorcategoria|crear-trabajadorcategoria|editar-trabajadorcategoria|borrar-trabajadorcategoria')->only('index');
        $this->middleware('permission:crear-trabajadorcategoria', ['only' => ['store']]);
        $this->middleware('permission:editar-trabajadorcategoria', ['only' => ['update']]);
        $this->middleware('permission:borrar-trabajadorcategoria', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo almacen que contiene la tabla categoria de Trabajador
    public function index()
    {
        $categoriatrabajadores = CategoriaTrabajador::all();
        return view('mantenimiento.categoria-trabajador.index', compact('categoriatrabajadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //EN el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla Categorìa de Trabajadores.
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
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required|unique:categorias_trabajador,descripcion',
        ]);

        CategoriaTrabajador::create($request->all());
        //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('categoriatrabajadores.index')->with('create', 'Registro agregado correctamente');
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
     //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla Categoria de Trabajador ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function edit(CategoriaTrabajador $categoriatrabajadore)
    {
        return view('mantenimiento.categoria-trabajador.editar', compact('categoriatrabajadore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaTrabajador $categoriatrabajadore)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $categoriatrabajadore->update($request->all());
         //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('categoriatrabajadores.index')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN el destroy enviamos el id que deseamos eliminar y al hacer click en el boton aceptar, te redirecciona a la vista index ,
    public function destroy($id)
    {
        CategoriaTrabajador::find($id)->delete();
        return redirect()->route('categoriatrabajadores.index')->with('delete', 'Registro eliminado correctamente');
    }
}
