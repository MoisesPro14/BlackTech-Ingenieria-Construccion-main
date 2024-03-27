<?php

namespace App\Http\Controllers;

use App\Models\LibretaTiempo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibretaTiempoController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-libreta|crear-libreta|editar-libreta|borrar-libreta')->only('index');
        $this->middleware('permission:crear-libreta', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-libreta', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-libreta', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //En el index llamamos todos los datos del modelo ControlStock que contiene la tabla Stocks.
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $libretas = DB::table('libreta_tiempo as lt')
                ->select('t.nombres as nombres', 't.apellidos as apellidos', 'lt.semana', 'lt.dia', 'lt.horas', 'ob.nombre as obra', 'u.name as user')
                ->join('obra_trabajador as ot', 'ot.id', '=', 'lt.obra_trabajador_id')
                ->join('obras as ob', 'ob.id', '=', 'ot.obra_id')
                ->join('trabajadores as t', 't.id', '=', 'ot.trabajador_id')
                ->join('users as u', 'u.id', '=', 'lt.user_id')
                ->orderBy('lt.semana', 'desc')
                ->get()
                ->toArray();
            return datatables()
                ->of($libretas)
                ->addColumn('btn', 'proyectos.libretatiempo.actions')
                ->rawColumns(['btn'])
                ->toJson();
        }

        return view('proyectos.libretatiempo.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("proyectos.libretatiempo.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LibretaTiempo $libretatiempo)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
