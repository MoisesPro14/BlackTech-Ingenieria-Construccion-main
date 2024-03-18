<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibretaTiempo extends Model
{
    use HasFactory;

    protected $table = 'libreta_tiempo';

	protected $fillable = [
		'semana', 'lunes','martes','miercoles','jueves','viernes','sabado','domingo','horas', 'obra_trabajador_id','user_id'
	];


    public function obra_trabajador()
	{
		return $this->belongsTo(ObraTrabajador::class, 'obra_trabajador_id');
	}

/*
    public function obra()
	{
		return $this->belongsTo(Obra::class, 'obra_id');
	}
	public function trabajador()
	{
		return $this->belongsTo(Trabajador::class, 'trabajador_id');
	}
    */
}
