<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlStock extends Model
{
    protected $table = 'stocks';
    protected $fillable = [
        'ingresos', 'salidas', 'precio', 'total',
        'ingreso_productos_id', 'restantes'
    ];

    public function ingreso_producto()
    {
        return $this->belongsTo(Almacen::class, 'ingreso_productos_id');
    }
    public function obra()
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}