<?php

namespace App\Listeners;

use App\Models\ConfigLog;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\Authenticated;

class LogAuthenticated
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
     * @param  Authenticated  $event
     * @return void
     */
    public function handle(Authenticated $event)
    {
        $isLoggable = ConfigLog::find(1)->log_all_auth_events;

        if ($isLoggable)
        {
            $data = [
                'description' => trans('inició sesión'),
                'user_role'   => $event->user->role->name,
                'user_id'     => $event->user->id,
            ];

            $this->logEvent($data);
        }
    }
}
