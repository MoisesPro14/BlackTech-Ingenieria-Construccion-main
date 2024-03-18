<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Obra;
use App\Models\LibretaTiempo;

class ObraPagesController extends Controller
{
    //En este index enviamos el id de la obra seleccionada y redireccionamos a la vista index de inicio de obra.
    public function inicio($id)
    {
    	$obra = Obra::find($id);
    	return view('obra.inicio.index', compact('obra'));
    }

    //Funcion para la consulta de grafico de Epp/trabajador
    public function epptrabajador($id)
    {
        $obra = Obra::find($id);
        return view('obra.reportes.epp-trabajador', compact('obra'));
    }

    //Funcion para la consulta de grafico de horas/semanas
    public function horassemana($id)
    {
        $obra = Obra::find($id);
		return view('obra.reportes.horas-semana', compact('obra'));
    }

    //Funcion para la consulta de grafico de Acumulado/horas
    public function acumuladohoras($id)
	{
		$obra = Obra::find($id);
		return view('obra.reportes.acumulado-horas', compact('obra'));
	}

     //Funcion para la consulta de grafico de epp/semana
     public function eppsemana($id)
     {
         $obra = Obra::find($id);
         return view('obra.reportes.epp-semana', compact('obra'));
     }

     //Funcion para la consulta de grafico de acumulado/epp
     public function acumuladoepp($id)
     {
         $obra = Obra::find($id);
         return view('obra.reportes.acumulado-epp', compact('obra'));
     }

}
