<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modeloCitas extends Model
{
    use HasFactory;
    protected $table = 'citas'; // Se crea la variable table con el valor de la tabla 'citas' de nuestra base de datos.
    const CREATED_AT = null; // Decimos que la contante CREATED_AT sea nula para que no se guarde en la base de datos.
    const UPDATED_AT = null; // Decimos que la contante UPDATED_AT sea nula para que no se guarde en la base de datos.
    protected $guarded = ['id_citas'];
}
