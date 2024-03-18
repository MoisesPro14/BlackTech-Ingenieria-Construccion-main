<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';
    protected $fillable = [
    	'descripcion', 'estado', 'categoria_id'
    ];

    public function categoria()
    {
    	return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function catalogo()
    {
    	return $this->hasMany(Catalogo::class, 'tipo_id');
    }

    public function scopeActivos()
    {
        return $this->where('estado', true);
    }
}
