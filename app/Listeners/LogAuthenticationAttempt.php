<?php

namespace App\Listeners;

use App\Models\ConfigLog;
use App\Models\User;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\Attempting;

class LogAuthenticationAttempt
{
    use EventLogger;

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
     * @param  Attempting  $event
     * @return void
     */
    public function handle(Attempting $event)
    {
        $isLoggable = ConfigLog::find(1)->log_auth_attempts;

        if ($isLoggable)
        {
            $credential = $event->credentials['email'];

            $user = User::firstWhere('email', '=', $credential);
            $userRole = $user ? $user->role->name : null;
            $userId = $user ? $user->id : null;

            $msg = 'intentó iniciar sesión';
            $description = $user
                            ? trans($msg)
                            : $credential . ' ' . trans($msg);
            $data = [
                'description' => $description,
                'user_role'   => $userRole,
                'user_id'     => $userId,
            ];

            $this->logEvent($data);
        }
    }
}
