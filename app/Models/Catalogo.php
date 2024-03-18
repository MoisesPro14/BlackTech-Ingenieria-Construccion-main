<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    use HasFactory;

    protected $table = 'catalogo';
    protected $fillable = [
    	'nombre', 'estado', 'unidad', 'tipo_id','categoria_id'
    ];

    public function tipo()
    {
    	return $this->belongsTo(Tipo::class, 'tipo_id');
    }

    public function categoria()
    {
    	return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function scopeActivos()
    {
        return $this->where('estado', true);
    }
}
