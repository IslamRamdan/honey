<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function index()
    {
        $logs = Activity::with('causer')->latest()->get();
        return view('admin.activity_logs.index', compact('logs'));
    }

    public function show(Activity $activityLog)
    {
        // $activityLog corresponds to the route parameter
        $activityLog->load('causer', 'subject');
        return view('admin.activity_logs.show', compact('activityLog'));
    }
}
