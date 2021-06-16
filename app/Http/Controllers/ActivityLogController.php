<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class ActivityLogController extends Controller
{
    public function index()
    {
        return Inertia::render('Audit/Index',[
            'filters' => FacadesRequest::all('user', 'ip'),
            'activities_log' => DB::connection('audit')->table('activity_logs')
                //->filter(FacadesRequest::only('user', 'ip'))
                ->paginate(15)
                ->withQueryString()
        ]);
    }
}
