<?php

namespace App\Listeners;

use App\Models\ActivityLog;
use App\Models\ConfigLog;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Request;

class LogRegisteredUser
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $isLoggable = ConfigLog::find(1)->log_registered_user;

        if ($isLoggable)
        {
            $userRole = $event->user->role->name;
            $userId = $event->user->id;
            $description = trans('Usuario creado:') . ' ' . $event->user->email;

            $data = [
                'description' => $description,
                'user_role'   => $userRole,
                'user_id'     => $userId,
            ];

            $this->logEvent($data);
        }
    }
}
