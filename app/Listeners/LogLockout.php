<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use App\Models\ConfigLog;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;

class LogLockout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Lockout  $event
     * @return void
     */
    public function handle(Lockout $event)
    {
        $isLoggable = ConfigLog::find(1)->log_lock_out;

        if ($isLoggable)
        {
            $credential = $event->request->request->get('email');

            $user = User::firstWhere('email', '=', $credential);
            $userRole = $user ? $user->role->name : null;
            $userId = $user ? $user->id : null;

            $msg = 'bloqueado por demasiados intentos de inicio de sesión';
            $description = $user
                            ? $user->email . ' ' . trans($msg)
                            : $credential . ' ' . trans($msg);

            $data = [
                'description' => $description,
                'user_role'   => $userRole,
                'user_id'     => $userId,
                'http_route'  => $event->request->fullUrl(),
                'ip_address'  => $event->request->ip(),
                'user_agent'  => $event->request->header('user-agent'),
                'locale'      => $event->request->header('accept-language'),
                'referer'     => $event->request->header('referer'),
                'method_type' => $event->request->method(),
            ];

            ActivityLog::create($data);
        }
    }
}
