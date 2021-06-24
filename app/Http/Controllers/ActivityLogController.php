<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use App\Traits\UserAgentDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class ActivityLogController extends Controller
{

    use UserAgentDetails;

    public function index()
    {
        $activityLog = $this->activityLogForHuman(
            ActivityLog::filter(
                FacadesRequest::only('user', 'ip_dir', 'http_route')
            )->paginate(15)
        );
        return Inertia::render('Audit/Index', [
            'filters' => FacadesRequest::all('user', 'ip_dir', 'http_route'),
            'activities_log' => fn () => $activityLog,
        ]);
    }

    private function activityLogForHuman($logs)
    {
        $logs->map(function ($log) {
            $activityTime = Carbon::parse($log->created_at);
            $log['timeSince'] = $activityTime->diffForHumans();
            $log['userAgentDetails'] = UserAgentDetails::details($log->user_agent);
            $log['langDetails'] = UserAgentDetails::localeLang($log->locale);
            $log['userDetails'] = User::find($log->user_id);

            return $log;
        });

        return $logs;
    }
}
