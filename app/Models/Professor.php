<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    /**
     * La conexión usada a la base de datos.
     *
     * @var string
     */
    protected $connection = 'studium';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id',
        'sch_year_id',
    ];
}
