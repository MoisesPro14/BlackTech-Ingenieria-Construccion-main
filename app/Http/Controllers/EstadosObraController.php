<?php

namespace App\Http\Controllers;

use App\Models\EstadoObra;
use Illuminate\Http\Request;

class EstadosObraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-estado|crear-estado|editar-estado|borrar-estado')->only('index');
        $this->middleware('permission:crear-estado', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-estado', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-estado', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo almacen que contiene la tabla estados_obra
    public function index()
    {
        //Con paginación
        $estados = EstadoObra::all();
        return view('mantenimiento.estados-obra.index ', compact('estados'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}
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
    //EN el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla estados_obra.
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required|unique:estados_obra,descripcion'
        ]);

        EstadoObra::create($request->all());
        //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('estados.index')->with('create', 'Registro agregado correctamente');
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

    public function edit(EstadoObra $estado)
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
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla estados_obra ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, EstadoObra $estado)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $estado->update($request->all());
    //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('estados.index')->with('update', 'Registro actualizado correctamente');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN el destroy enviamos el id que deseamos eliminar y al hacer click en el boton aceptar, te redirecciona a la vista index ,
    public function destroy(EstadoObra $estado)
    {
        $estado->delete();

        return redirect()->route('estados.index')->with('delete', 'Registro eliminado correctamente');
    }
}
