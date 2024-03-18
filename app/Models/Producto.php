<?php

namespace App\Models;

use App\Models\catalogo;
use App\Models\Marca;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $fillable = [
    	'precio', 'obra_id', 'catalogo_id', 'marca_id', 'ingresos', 'salidas'
    ];

    public function marca(){
    	return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function catalogo(){
    	return $this->belongsTo(Catalogo::class, 'catalogo_id');
    }

}

