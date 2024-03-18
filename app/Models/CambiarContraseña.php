<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CambiarContraseña extends Model
{
    use HasFactory;
    public $fillable = ['password_actual','password','confirm_password'];
}
