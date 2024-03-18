<?php

namespace App\Http\Controllers;


use App\Models\EstadoObra;
use App\Models\Obra;
use Illuminate\Http\Request;



class ObrasController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-obra|crear-obra|editar-obra|borrar-obra', ['only' => ['index']]);
        $this->middleware('permission:crear-obra', ['only' => ['store']]);
        $this->middleware('permission:editar-obra', ['only' => ['update']]);
        $this->middleware('permission:borrar-obra', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo almacen que contiene la tabla Obras
    public function index(Request $request)
    {

        //Con paginación
        $obras = Obra::all();
        $obra = new Obra();
        $estado = EstadoObra::pluck('descripcion','id');
        return view('mantenimiento.obras.index',compact('obras','obra','estado'));

        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $usuarios->links() !!}
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
    //En el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla Marcas.
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:obras,nombre',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'lugar' => 'required',
            'cliente' => 'required',
            'estado_id'=> 'required',

        ]);

        $obra = Obra::create($request->all());
        $request->input('nombre');
        $obra->id . $request->input('nombre');
        //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('obras.index')->with('create','Registro agregado correctamente');;
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
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla obras ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, Obra $obra)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'lugar' => 'required',
            'cliente' => 'required',
            'estado_id' => 'required'
        ]);

        $obra->update($request->all());
        $request->input('descripcion');
        $obra->id . $request->input('descripcion');
        //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('obras.index')->with('update','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //En el destroy enviamos el id que deseamos eliminar y al hacer click en el boton aceptar, te redirecciona a la vista index
    public function destroy($id)
    {
        Obra::find($id)->delete();
        return redirect()->route('obras.index')->with('delete','Registro eliminado correctamente');;
    }
}
