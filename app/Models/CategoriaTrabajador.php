<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaTrabajador extends Model
{
    use HasFactory;

    protected $table = 'categorias_trabajador';
	protected $fillable = ['descripcion', 'estado'];

	public function scopeActivos()
	{
		return $this->where('estado', true);

    }
}
