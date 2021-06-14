<?php

namespace App\Listeners;

use App\Models\ConfigLog;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\PasswordReset;

class LogPasswordReset
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
     * @param  PasswordReset  $event
     * @return void
     */
    public function handle(PasswordReset $event)
    {
        $isLoggable = ConfigLog::find(1)->log_password_reset;

        if ($isLoggable)
        {
            $userRole = $event->user->role->name;
            $userId = $event->user->id;
            $description = trans('restableció su contraseña.');

            $data = [
                'description' => $description,
                'user_role'   => $userRole,
                'user_id'     => $userId,
            ];

            $this->logEvent($data);
        }
    }
}
