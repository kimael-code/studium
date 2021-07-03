<?php

namespace App\Listeners;

use App\Models\ConfigLog;
use App\Traits\EventLogger;
use Illuminate\Auth\Events\Validated;

class LogValidated
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
     * @param  Validated  $event
     * @return void
     */
    public function handle(Validated $event)
    {
        $isLoggable = ConfigLog::find(1)->log_successful_login;

        if ($isLoggable)
        {
            $userRole = $event->user->role->name;
            $userId = $event->user->id;
            $description = trans('se validó');

            $data = [
                'description' => $description,
                'user_role'   => $userRole,
                'user_id'     => $userId,
            ];

            $this->logEvent($data);
        }
    }
}
