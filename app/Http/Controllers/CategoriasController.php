<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoriasController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-categoria|crear-categoria|editar-categoria|borrar-categoria')->only('index');
        $this->middleware('permission:crear-categoria', ['only' => ['store']]);
        $this->middleware('permission:editar-categoria', ['only' => ['update']]);
        $this->middleware('permission:borrar-categoria', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //En el index llamamos todos los datos del modelo almacen que contiene la tabla categoria
    public function index()
    {
        $categorias = Categoria::all();
        return view('mantenimiento.categorias.index ', compact('categorias'));
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
    //EN el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla Categorias.
    public function store(Request $request)
    {
        request()->validate([
            'descripcion' => 'required|unique:categorias,descripcion'
        ]);

        Categoria::create($request->all());
    //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
    return redirect()->route('categorias.index')->with('create', 'Registro agregado correctamente');
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

    public function edit(Categoria $categoria)
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
    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla Categoria ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, Categoria $categoria)
    {
        request()->validate([
            'descripcion' => 'required',
        ]);

        $categoria->update($request->all());
        //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('categorias.index')->with('update', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //EN el destroy enviamos el id que deseamos eliminar y al hacer click en el boton aceptar, te redirecciona a la vista index ,
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('delete', 'Registro eliminado correctamente');
    }
    //funcion para cambiar estado de una categoria segun el id
    public function cambiarEstado($id)
    {
        $categoria=Categoria::find($id);
        if($categoria->estado==1){
            DB::table('categorias')->where('id',$id)->update(['estado'=>0]);
            return redirect()->route('categorias.index');

        }
        DB::table('categorias')->where('id',$id)->update(['estado'=>1]);
        return redirect()->route('categorias.index');
    }
}
