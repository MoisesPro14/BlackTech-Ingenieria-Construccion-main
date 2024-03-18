<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoObra extends Model
{
    use HasFactory;

    protected $table = 'estados_obra';
	protected $fillable = [
		'descripcion',
        'estado'
	];

	public function obras()
	{
		return $this->hasMany(Obra::class, 'estado_id');
	}

	public function scopeActivos()
	{
		return $this->where('estado', true);
	}
}
