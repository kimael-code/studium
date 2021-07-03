<?php

namespace App\Listeners;

use App\Models\ConfigLog;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $isLoggable = ConfigLog::find(1)->log_successful_login;

        if ($isLoggable)
        {
            $userRole = $event->user->role->name;
            $userId = $event->user->id;
            $description = trans('cerró sesión');

            $data = [
                'description' => $description,
                'user_role'   => $userRole,
                'user_id'     => $userId,
            ];

            $this->logEvent($data);
        }
    }
}
