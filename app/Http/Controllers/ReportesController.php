<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\EntregaProducto;
use App\Models\LibretaTiempo;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportesController extends Controller
{

	//  función para filtrar graficos por id de una obra, realiza busqueda en el modal del escritorio
	public function inicio($id)
	{
		$obra = Obra::find($id);
		return view('Reportes.inicio.index', compact('obra'));
	}

	// función para generar reportes de equipos de protección personal por trabajador

	//REPORTE 1

	public function eppTrabajador($id)
	{
		$obra = Obra::find($id);

		$datos = DB::table('entrega_productos AS ep')
			->select(
				't.documento',
				'ep.obra_trabajador_id',
				DB::raw('CONCAT(t.apellidos, " ", t.nombres) AS nombres'),
				'cate.descripcion AS categoria',
				DB::raw('SUM(ep.cantidad * ep.precio) AS total')
			)
			->join('obra_trabajador AS ot', 'ep.obra_trabajador_id', 'ot.id')
			->join('trabajadores AS t', 'ot.trabajador_id', 't.id')
			->join('productos AS pro', 'ep.producto_id', 'pro.id')
			->join('catalogo AS cata', 'pro.catalogo_id', 'cata.id')
			->join('tipos AS ti', 'cata.tipo_id', 'ti.id')
			->join('categorias AS cate', 'ti.categoria_id', 'cate.id')
			->where('cate.id', 1) // El ID 1 corresponde a la categoría EPP
			->where('ot.obra_id', $obra->id)
			->where('pro.obra_id', $obra->id)
			->groupBy('t.documento', 'ep.obra_trabajador_id', DB::raw('CONCAT(t.apellidos, " ", t.nombres)'), 'cate.descripcion')
			->orderBy(DB::raw('SUM(ep.cantidad * ep.precio)'))
			->get();
		return view('Reportes.inicio.epptrabajador', compact('obra', 'datos'));
	}

	//REPORTE 2

	public function horasSemana($id)
	{
		$obra = Obra::find($id);

		$datos = DB::table('libreta_tiempo AS LT')
			->select(
				'LT.semana AS semana',
				DB::raw('SUM(LT.horas) AS horas')
			)
			->join('obra_trabajador AS ot', 'LT.obra_trabajador_id', 'ot.id')
			->join('obras AS o', 'ot.obra_id', 'o.id')
			->where('o.id', $obra->id)
			->groupBy('LT.semana')
			->orderBy('LT.semana')
			->get();

		return view('Reportes.inicio.horassemana', compact('obra', 'datos'));
	}

	//REPORTE 3

	public function acumuladoHoras($id)
	{
		$obra = Obra::find($id);

		$datos = DB::table('libreta_tiempo AS LT')
			->select(
				'LT.semana AS semana',
				DB::raw('sum(sum(LT.horas)) over (order by LT.semana asc) AS horas')
			)
			->join('obra_trabajador AS ot', 'LT.obra_trabajador_id', 'ot.id')
			->join('obras AS o', 'ot.obra_id', 'o.id')
			->where('o.id', $obra->id)
			->groupBy('LT.semana')
			->get();

		return view('Reportes.inicio.acumuladohoras', compact('obra', 'datos'));
	}

	//REPORTE 4

	public function eppSemana($id)
	{
		$obra = Obra::find($id);

		$datos = DB::table('entrega_productos AS EP')
			->select(
				'EP.semana AS semana',
				DB::raw('SUM(ep.cantidad * ep.precio) AS total_epp')
			)
			->join('productos AS pro', 'ep.producto_id', 'pro.id')
			->join('catalogo AS cata', 'pro.catalogo_id', 'cata.id')
			->join('obras AS o', 'pro.obra_id', 'o.id')
			->join('tipos AS ti', 'cata.tipo_id', 'ti.id')
			->join('categorias AS cate', 'ti.categoria_id', 'cate.id')
			->where('cate.id', 1)
			->where('o.id', $obra->id)
			->groupBy('EP.semana')
			->orderBy('EP.semana')
			->get();
		return view('Reportes.inicio.eppsemana', compact('obra', 'datos'));
	}

	//REPORTE 5

	public function acumuladoEpp($id)
	{
		$obra = Obra::find($id);

		$datos = DB::table('entrega_productos AS EP')
			->select(
				'EP.semana AS semana',
				DB::raw('SUM(SUM(EP.cantidad* EP.precio)) over (order by EP.semana asc) AS acumulado')
			)
			->join('productos AS pro', 'ep.producto_id', 'pro.id')
			->join('catalogo AS cata', 'pro.catalogo_id', 'cata.id')
			->join('obras AS o', 'pro.obra_id', 'o.id')
			->join('tipos AS ti', 'cata.tipo_id', 'ti.id')
			->join('categorias AS cate', 'ti.categoria_id', 'cate.id')
			->where('cate.id', 1)
			->where('o.id', $obra->id)
			->groupBy('EP.semana')
			->get();
		return view('Reportes.inicio.acumuladoepp', compact('obra', 'datos'));
	}
	//REPORTE 6

	public function epcSemana($id)
	{
		$obra = Obra::find($id);

		$datos = DB::table('entrega_productos AS EP')
			->select(
				'EP.semana AS semana',
				DB::raw('SUM(ep.cantidad * ep.precio) AS total_epc')
			)
			->join('productos AS pro', 'ep.producto_id', 'pro.id')
			->join('catalogo AS cata', 'pro.catalogo_id', 'cata.id')
			->join('obras AS o', 'pro.obra_id', 'o.id')
			->join('tipos AS ti', 'cata.tipo_id', 'ti.id')
			->join('categorias AS cate', 'ti.categoria_id', 'cate.id')
			->where('cate.id', 2)
			->where('o.id', $obra->id)
			->groupBy('EP.semana')
			->orderBy('EP.semana')
			->get();
		return view('Reportes.inicio.epcsemana', compact('obra', 'datos'));
	}

	//REPORTE 7

	public function acumuladoEpc($id)
	{
		$obra = Obra::find($id);

		$datos = DB::table('entrega_productos AS EP')
			->select(
				'EP.semana AS semana',
				DB::raw('SUM(SUM(EP.cantidad* EP.precio)) over (order by EP.semana asc) AS acumulado')
			)
			->join('productos AS pro', 'ep.producto_id', 'pro.id')
			->join('catalogo AS cata', 'pro.catalogo_id', 'cata.id')
			->join('obras AS o', 'pro.obra_id', 'o.id')
			->join('tipos AS ti', 'cata.tipo_id', 'ti.id')
			->join('categorias AS cate', 'ti.categoria_id', 'cate.id')
			->where('cate.id', 2)
			->where('o.id', $obra->id)
			->groupBy('EP.semana')
			->get();
		return view('Reportes.inicio.acumuladoepc', compact('obra', 'datos'));
	}
}