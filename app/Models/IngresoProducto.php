<?php

namespace App\Models;

use App\Models\Catalogo;
use App\Models\Marca;
use App\Models\Obra;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoProducto extends Model
{
    use HasFactory;

    protected $table = 'ingresos_producto';
    protected $fillable = [
    	'id','semana', 'numero_guia', 'fecha', 'precio',
    	'cantidad', 'obra_id', 'catalogo_id', 'marca_id', 'user_id'
    ];

    public function obra(){
    	return $this->belongsTo(Obra::class, 'obra_id');
    }

    public function catalogo(){
    	return $this->belongsTo(Catalogo::class, 'catalogo_id');
    }

    public function marca(){
    	return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
