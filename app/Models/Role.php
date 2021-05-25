<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Campos con valores por defecto.
     *
     * @var array
     */
    protected $attributes = [
        'description' => '',
    ];

    /**
     * Campos asignables en masa.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
