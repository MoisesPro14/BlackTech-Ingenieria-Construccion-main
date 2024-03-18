<?php

namespace App\Http\Controllers;

use App\Models\EntregaProducto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntregaProductoController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-entrega|crear-entrega|editar-entrega|borrar-entrega|crear-stockentrega')->only('index');
        $this->middleware('permission:crear-entrega', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-entrega', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-entrega', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo EntregaProducto que contiene la tabla entrega_productos.
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $libretas = DB::table('entrega_productos as ep')
        ->select('ep.semana', 'ep.cantidad', 'ep.precio','ep.fecha_entrega','ob.nombre as obra','t.nombres as nombres','t.apellidos as apellidos','cat.nombre as producto','u.name as user')
        ->join('obra_trabajador as ot','ot.id','=','ep.obra_trabajador_id')
        ->join('obras as ob','ob.id','=','ot.obra_id')
        ->join('trabajadores as t','t.id','=','ot.trabajador_id')
        ->join('productos as pro','pro.id','=','ep.producto_id')
        ->join('catalogo as cat','cat.id','=','pro.catalogo_id')
        ->join('users as u','u.id','=','ep.user_id')
        ->orderBy('ep.semana','desc')
        ->get()
        ->toArray();
        return datatables()
        ->of($libretas)
        ->addColumn('btn','proyectos.entregaproducto.actions')
        ->rawColumns(['btn'])
        ->toJson();
        }
        return view('proyectos.entregaproducto.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En este create llamamos el modelo EntregaProducto para el nuevo Registro de Stock , ademas a las otras tablas que utilizaremos.
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //En el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla entrega_productos.
    public function store(Request $request)
    {

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
    //En este edit llamamos el modelo EntregaProducto para que me devuelva los datos registrados segun el id a editar.
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla entrega_productos ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, EntregaProducto $entregaproducto)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //En el destroy enviamos el id que deseamos eliminar y al hacer click en el boton aceptar, te redirecciona a la vista index.
    public function destroy($id)
    {

    }
}
