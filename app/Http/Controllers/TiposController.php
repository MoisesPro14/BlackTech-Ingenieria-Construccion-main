<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TiposController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-tipo|crear-tipo|editar-tipo|borrar-tipo')->only('index');
        $this->middleware('permission:crear-tipo', ['only' => ['store']]);
        $this->middleware('permission:editar-tipo', ['only' => ['update']]);
        $this->middleware('permission:borrar-tipo', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo almacen que contiene la tabla categoria
    public function index()
    {
        $tipos = Tipo::all();
        $tipo = new Tipo();
        //Llamamos los datos descripcion y Id del modelo categorias.
        $categoria = Categoria::pluck('descripcion', 'id');
        return view('mantenimiento.tipos.index', compact('tipos', 'tipo', 'categoria'));
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
    //EN el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla tipos.
    public function store(Request $request)
    {
        $this->validate($request, [
            'descripcion' => 'required|unique:tipos,descripcion',
            'categoria_id' => 'required',
        ]);

        $tipo = Tipo::create($request->all());
        $request->input('descripcion');
        $tipo->id . $request->input('descripcion');
        //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('tipos.index')->with('create', 'Registro agregado correctamente');
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
    public function edit($id)
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
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla tipos ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, Tipo $tipo)
    {
        request()->validate([
            'descripcion' => 'required',
            'categoria_id' => 'required',
        ]);

        $tipo->update($request->all());
        $request->input('descripcion');
        $tipo->id . $request->input('descripcion');
        //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('tipos.index')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //En el destroy enviamos el id que deseamos eliminar y al hacer click en el boton aceptar, te redirecciona a la vista index ,
    public function destroy($id)
    {
        Tipo::find($id)->delete();
        return redirect()->route('tipos.index')->with('delete', 'Registro eliminado correctamente');
    }
}
