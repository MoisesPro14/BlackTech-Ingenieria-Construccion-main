<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaProducto extends Model
{
    use HasFactory;

    protected $table = 'entrega_productos';
    protected $fillable = [
        'cantidad', 'semana', 'fecha_entrega',
        'obra_trabajador_id', 'ingreso_producto_id'
    ];

    public function obratrabajador()
    {
        return $this->belongsTo(ObraTrabajador::class, 'obra_trabajador_id');
    }
    public function almacen()
    {
        return $this->belongsTo(Almacen::class, 'ingreso_producto_id');
    }
    public function obra()
    {
        return $this->belongsTo(Obra::class, 'obra_id');
    }
}