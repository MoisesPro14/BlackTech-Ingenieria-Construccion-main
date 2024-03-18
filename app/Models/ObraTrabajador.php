<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraTrabajador extends Model
{
    use HasFactory;

    protected $table = 'obra_trabajador';
    protected $fillable = [
    	'obra_id', 'trabajador_id'
    ];

    public function obra()
    {
    	return $this->belongsTo(Obra::class, 'obra_id');
    }

    public function trabajador()
    {
    	return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public function libreta_tiempo()
	{
		return $this->belongsToMany(LibretaTiempo::class, 'obra_trabajador_id');
	}

}
