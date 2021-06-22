<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ActivityLog extends Model
{
    use HasFactory;

    protected $connection = 'audit';

    protected $attributes = [
        'description' => '',
        'user_role'   => null,
        'user_id'     => null,
        'http_route'  => '',
        'ip_address'  => '',
        'user_agent'  => '',
        'locale'      => '',
        'referer'     => '',
        'method_type' => '',
    ];

    protected $fillable = [
        'description',
        'user_role',
        'user_id',
        'http_route',
        'ip_address',
        'user_agent',
        'locale',
        'referer',
        'method_type',
    ];

    protected $casts = [
        'description' => 'string',
        'user_role'   => 'integer',
        'user_id'     => 'integer',
        'http_route'  => 'string',
        'ip_address'  => 'string',
        'user_agent'  => 'string',
        'locale'      => 'string',
        'referer'     => 'string',
        'method_type' => 'string',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['user'] ?? null,
            fn($query, $search) =>
            $query->where('user_id', '=', $search)
        )->when(
            $filters['ip_dir'] ?? null,
            fn($query, $ipDir) =>
            $query->where(DB::raw('ip_address::text'), 'like', '%'.$ipDir.'%')
        )->when(
            $filters['http_route'] ?? null,
            fn($query, $httpRoute) =>
            $query->where('http_route', 'ilike', '%'.$httpRoute.'%')
        );
    }
}
