<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * La conexión usada a la base de datos.
     *
     * @var string
     */
    protected $connection = 'auth';

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

    /**
     * Obtiene los usuarios que pertenecen a un rol particular.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
