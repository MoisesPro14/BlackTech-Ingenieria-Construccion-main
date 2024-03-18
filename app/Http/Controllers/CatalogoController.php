<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Categoria;
use App\Models\Tipo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    //Constructor para controlar permisos
    function __construct()
    {
        $this->middleware('permission:ver-catalogo|crear-catalogo|editar-catalogo|borrar-catalogo')->only('index');
        $this->middleware('permission:crear-catalogo', ['only' => ['store']]);
        $this->middleware('permission:editar-catalogo', ['only' => ['update']]);
        $this->middleware('permission:borrar-catalogo', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //EN este create llamamos el modelo Catalogo para el nuevo producto , ademas a las otras tablas que utilizaremos.
    public function index()
    {
        $catalogos = Catalogo::all();
        $catalogo = new Catalogo();
        //Llamamos los datos descripcion y Id del modelo Tipo.
        $tipo = Tipo::pluck('descripcion', 'id');
        //Llamamos los datos descripcion y Id del modelo Categoria.
        $categoria = Categoria::pluck('descripcion', 'id');
        //Retornamos la vista Crear de catalogo junto a los valores registrados..
        return view('mantenimiento.catalogo.index', compact('catalogos', 'catalogo', 'tipo', 'categoria'));
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

    //EN el Store psasmos los datos que recibiremos y mandaràn a la base de datos de la tabla Catalogo.
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:catalogo,nombre',
            'unidad' => 'required',
            'tipo_id' => 'required',
        ]);

        $catalogo = Catalogo::create($request->all());
        $request->input('nombre');
        $catalogo->id . $request->input('nombre');
        //una vez pasada los datos al clickear el boton redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('catalogos.index')->with('create', 'Registro agregado correctamente');
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

    //EN el update psasmos los datos que recibiremos y actualizarà en la base de datos de la tabla Catalogo ,
    //no olvidar pasar el modelo en los parametros de la funcion Update.
    public function update(Request $request, Catalogo $catalogo)
    {
        request()->validate([
            'nombre' => 'required',
            'unidad' => 'required',
            'tipo_id' => 'required',
        ]);

        $catalogo->update($request->all());
        $request->input('nombre');
        $catalogo->id . $request->input('nombre');
        //una vez pasada los datos para actualizar ,nos redireccionara a la vista index y enviarà los datos a la db.
        return redirect()->route('catalogos.index')->with('update', 'Registro actualizado correctamente');
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
        Catalogo::find($id)->delete();
        return redirect()->route('catalogos.index')->with('delete', 'Registro eliminado correctamente');
    }
}