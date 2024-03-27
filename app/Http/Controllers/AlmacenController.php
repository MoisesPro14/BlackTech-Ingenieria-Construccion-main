<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngresoProducto;
use App\Models\Obra;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Carbon;

class AlmacenController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-almacen|crear-almacen|editar-almacen|borrar-almacen|crear-stockalmacen')->only('index');
        $this->middleware('permission:crear-almacen', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-almacen', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-almacen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo almacen que contiene la tabla ingreso_productos.
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $ingresos = DB::table('ingresos_producto as i')
                ->select(
                    'i.semana',
                    'i.numero_guia',
                    'i.fecha',
                    'i.precio',
                    'i.cantidad',
                    'ob.nombre as obra',
                    'cat.nombre as catalogo',
                    'ti.descripcion as tipo',
                    'cate.descripcion as categoria',
                    'mar.descripcion as marca',
                    'u.name as user'
                )
                ->join('obras as ob', 'ob.id', '=', 'i.obra_id')
                ->join('marcas as mar', 'mar.id', '=', 'i.marca_id')
                ->join('users as u', 'u.id', '=', 'i.user_id')
                ->join('catalogo as cat', 'cat.id', '=', 'i.catalogo_id')
                ->join('tipos as ti', 'ti.id', '=', 'cat.tipo_id')
                ->join('categorias as cate', 'cate.id', '=', 'ti.categoria_id')
                ->orderBy('i.semana', 'desc')
                ->get()
                ->toArray();
            return datatables()
                ->of($ingresos)
                ->addColumn('btn', 'proyectos.almacen.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('proyectos.almacen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // en este metodo create solo traemos datos con query builder de las respectivas tabla seleccionadas para los input y select del formulario
    public function create()
    {
        $obras = DB::table('obras')->select('id', 'nombre')->get();
        $catalagos = DB::table('catalogo as c')
            ->select(DB::raw('CONCAT(c.id," - ",c.nombre) as catalogo'), 'c.id')
            ->where('c.estado', '=', '1')
            ->get();
        $marcas = DB::table('marcas as m')
            ->select('m.id', 'm.descripcion as marca')
            ->where('m.estado', '=', '1')
            ->get();

        return view("proyectos.almacen.crear", compact('obras', 'catalagos', 'marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //los siguientes metodos del crud fueron modificados para trabajar con tablas maestro detalle, se sugiere normalizar la base de datos para evitar redundandancia.

    //en ingreo_productos se suguiere solo tener los campos semana, numero de guia, fecha, la obra y el campo de estado para eliminar de forma logica y conserva registros en la bd

    // en la tabla productos(detalles de ingresos), conservar los campos catalogo, marca, precio, la cantidad de ingreso, enviar por defecto cantidad 0 para salidad y la relacion de ingreso_id de la tabla ingresos_productos
    public function store(Request $request)
    {


        //validacion de campos requeridos
        /*
        $this->validate($request, [
            'semana' => 'required',
            'numero_guia' => 'required',
            'fecha' => 'required',
            'precio' => 'required',
            'ingresos' => 'required'
        ]);

        try {
            DB::beginTransaction();

            //ingresar datos en la tabla ingresos_productos
            $ingreso = new IngresoProducto();

            $ingreso->semana = $request->get('semana');
            $ingreso->numero_guia = $request->get('numero_guia');
            $mytime = Carbon::now('America/Lima');

            $ingreso->fecha = $mytime->toDateTimeString();
            $ingreso->obra_id     = $request->get('obra_id');
            $ingreso->estado = 'ACTIVO';
            $ingreso->save();

            //datos requeridos para tabla de productos
            $catalogo_id = $request->get('catalogo_id');
            $marca_id = $request->get('marca_id');
            $precio = $request->get('precio');
            $ingresos = $request->get('ingresos');

            //recorrer arreglos por detalles
            $cont = 0;

            while ($cont < count($catalogo_id)) {
                //ingresar datos en la tabla productos
                $detalle = new Producto();
                $detalle->ingreso_id = $ingreso->id;
                $detalle->catalogo_id = $catalogo_id[$cont];
                $detalle->marca_id = $marca_id[$cont];
                $detalle->precio = $precio[$cont];
                $detalle->ingresos = $ingresos[$cont];
                $cont = $cont + 1;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return Redirect::to('almacen.create');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        $ingreso = DB::table('productos as p')
            ->join('catalogo as c', 'c.id', 'p.catalogo_id')
            ->join('tipos as t', 't.id', 'c.tipo_id')
            ->join('categorias as cat', 'cat.id', 't.categoria_id')
            ->join('marcas as m', 'm.id', 'p.marca_id')
            ->join('ingresos_producto as i', 'i.id', 'p.ingreso_id')
            ->join('obras as ob', 'ob.id', '=', 'i.obra_id')
            ->join('users as u', 'u.id', 'i.user_id')
            ->select('i.id', 'i.semana', 'i.numero_guia', 'i.fecha', 'ob.nombre as obra', 'c.nombre as catalogo', 'cat.descripcion as categoria', 't.descripcion as tipo', 'm.descripcion as marca', 'p.precio', 'p.ingresos', 'i.estado', 'u.name as user')
            ->where('p.ingreso_id', '=', $id)
            ->first()
            ->get();

        return view('proyectos.almacen.show', compact('ingreso'));
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN este edit llamamos el modelo almacen para que me devuelva los datos registrados segun el id a editar.
    public function edit($id)
    {
        return view('proyectos.almacen.editar');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla Almacen ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request)
    {
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
        /*
        $ingreso = IngresoProducto::findOrFail($id);
        $ingreso->estado = 'CANCELADO';
        $ingreso->update();

        return Redirect::to('proyectos.almacen');

        */
    }
}
