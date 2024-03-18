<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;
    protected $table = 'obras';
	protected $fillable = [
		'nombre',
        'fecha_inicio',
        'fecha_fin',
        'lugar',
        'cliente',
        'estado_id'
	];

	public function estado()
	{
		return $this->belongsTo(EstadoObra::class, 'estado_id');
	}

    public function trabajador(){
        return $this->belongsToMany(Trabajador::class,'obra_trabajador');
    }
}
