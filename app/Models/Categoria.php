<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
	protected $fillable = [
		'descripcion', 'estado'
	];

	public function tipos()
	{
		return $this->hasMany(Tipo::class, 'categoria_id');
	}

	public function scopeActivos()
	{
		return $this->where('estado', true);
	}
}
