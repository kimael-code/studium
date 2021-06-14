<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Request;

/**
 * Encargado de gestionar el registro de eventos del usuario en el sistema.
 */
trait EventLogger
{
    public function logEvent(array $event)
    {
        $data = [
            'description' => $event['description'],
            'user_role'   => $event['userRole'],
            'user_id'     => $event['userId'],
            'http_route'  => Request::fullUrl(),
            'ip_address'  => Request::ip(),
            'user_agent'  => Request::header('user-agent'),
            'locale'      => Request::header('accept-language'),
            'referer'     => Request::header('referer'),
            'method_type' => Request::method(),
        ];

        ActivityLog::create($data);
    }
}

