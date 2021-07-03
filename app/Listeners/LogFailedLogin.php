<?php

namespace App\Listeners;

use App\Models\ConfigLog;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\Failed;

class LogFailedLogin
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        $isLoggable = ConfigLog::find(1)->log_failed_auth_attempts;

        if ($isLoggable)
        {
            $credential = $event->credentials['email'];

            $userRole = $event->user ? $event->user->role->name : null;
            $userId = $event->user ? $event->user->id : null;

            $msg = 'falló en iniciar sesión';
            $description = $event->user
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
