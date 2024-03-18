<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trabajador;
use App\Models\Obra;
use App\Models\ObraTrabajador;
use App\Models\CategoriaTrabajador;
use Illuminate\Support\Facades\DB;
class ObratrabajadorController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-asignacion_obra|crear-entrega|editar-entrega|borrar-entrega')->only('index');
        $this->middleware('permission:crear-asignacion_obra', ['only' => ['create', 'store']]);
        $this->middleware('permission:borrar-asignacion_obra', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = ObraTrabajador::all();
        $proyecto = new ObraTrabajador();
        $obra= Obra::pluck('nombre','id');
        $trabajador= Trabajador::select(
            DB::raw("CONCAT(apellidos,' ',nombres,'( ',documento,' )') AS name"),'id')->orderby('apellidos','asc')
            ->pluck('name', 'id');
        $trabajadorot = new Trabajador();
        $categoriadetrabajadore = CategoriaTrabajador::pluck('descripcion','id');
        return view('obra.libreta-tiempo.obras_trabajador',compact('proyectos','proyecto','obra','trabajador','trabajadorot','categoriadetrabajadore'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'obra_id' => 'required',
            'trabajador_id' => 'required',
        ]);

        $proyecto = ObraTrabajador::create($request->all());
        $request->input('obra_id');
        $proyecto->id . $request->input('obra_id');
        return redirect()->route('obratrabajador.index')->with('create', 'Registro agregado correctamente');

        $this->validate($request, [
            'nombres'=>'required',
            'apellidos'=>'required',
            'documento'=>'required',
            'categoria_id' => 'required',
        ]);

        $trabajadorot = Trabajador::create($request->all());
        $request->input('nombres');
        $trabajadorot->id . $request->input('nombres');
        return redirect()->route('obratrabajador.index')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ObraTrabajador::find($id)->delete();
        return redirect()->route('obratrabajador.index')->with('delete', 'Registro eliminado correctamente');
    }
}
