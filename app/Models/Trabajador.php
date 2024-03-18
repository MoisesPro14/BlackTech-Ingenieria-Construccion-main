<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;

    protected $table = 'trabajadores';
    protected $fillable = [
    	'nombres', 'apellidos', 'documento', 'categoria_id'
    ];

    public function categoria()
    {
    	return $this->belongsTo(CategoriaTrabajador::class, 'categoria_id');
    }

    public function obras(){
        return $this->belongsToMany(Obra::class,'obra_trabajador');
    }

    public function getFullNameAttribute()
{
    return $this->nombres . ' ' . $this->apellidos;
}

    public function scopeActivos()
    {
        return $this->where('estado', true);
    }

}
