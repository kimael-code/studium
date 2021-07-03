<?php

namespace App\Listeners;

use App\Models\ConfigLog;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $isLoggable = ConfigLog::find(1)->log_successful_login;

        if ($isLoggable)
        {
            $userRole = $event->user->role->name;
            $userId = $event->user->id;
            $description = trans('inició sesión');

            $data = [
                'description' => $description,
                'user_role'   => $userRole,
                'user_id'     => $userId,
            ];

            $this->logEvent($data);
        }
    }
}
