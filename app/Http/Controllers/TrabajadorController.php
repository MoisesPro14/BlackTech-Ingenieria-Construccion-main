<?php

namespace App\Http\Controllers;

use App\Models\CategoriaTrabajador;
use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
     //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-trabajador|crear-trabajador|editar-trabajador|borrar-trabajador')->only('index');
        $this->middleware('permission:crear-trabajador', ['only' => ['store']]);
        $this->middleware('permission:editar-trabajador', ['only' => ['update']]);
        $this->middleware('permission:borrar-trabajador', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //EN este create llamamos el modelo Trabajador para el nuevo producto , ademas a las otras tablas que utilizaremos.
    public function index()
    {
        $trabajadores = Trabajador::all();
        $trabajador = new Trabajador();
        //Llamamos los datos descripcion y Id del modelo CategoriaTrabajador.
        $categoriatrabajadore = CategoriaTrabajador::pluck('descripcion', 'id');
        return view('mantenimiento.trabajador.index', compact('trabajadores', 'trabajador', 'categoriatrabajadore'));
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
    //EN el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla Trabajadores.
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombres' => 'required',
            'apellidos' => 'required',
            'documento' => 'required|unique:trabajadores,documento',
            'categoria_id' => 'required',
        ]);

        $trabajador = Trabajador::create($request->all());
        $request->input('nombres');
        $trabajador->id . $request->input('nombres');
        //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('trabajador.index')->with('create', 'Registro agregado correctamente');
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
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla trabajadores ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, Trabajador $trabajador)
    {
        request()->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'documento' => 'required',
            'categoria_id' => 'required',

        ]);

        $trabajador->update($request->all());
        //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('trabajador.index')->with('update', 'Registro actualizado correctamente');
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
        Trabajador::find($id)->delete();
        return redirect()->route('trabajador.index')->with('delete', 'Registro eliminado correctamente');
    }
    //funcion para cambiar estado de un trabajador segun el id

    public function cambiarEstado($id)
    {
        $trabajadorr=Trabajador::find($id);
        if($trabajadorr->estado==1){
            DB::table('trabajadores')->where('id',$id)->update(['estado'=>0]);
            return redirect()->route('trabajador.index');

        }
        DB::table('trabajadores')->where('id',$id)->update(['estado'=>1]);
        return redirect()->route('trabajador.index');
    }
}
