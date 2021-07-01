<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * La conexión usada a la base de datos.
     *
     * @var string
     */
    protected $connection = 'studium';
}
