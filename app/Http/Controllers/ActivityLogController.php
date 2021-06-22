<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class ActivityLogController extends Controller
{
    public function index()
    {
        return Inertia::render('Audit/Index', [
                'filters' => FacadesRequest::all('user', 'ip_dir', 'http_route'),
                'activities_log' => fn () => ActivityLog::filter(
                    FacadesRequest::only('user', 'ip_dir', 'http_route')
                )->paginate(15)
        ]);
    }
}
