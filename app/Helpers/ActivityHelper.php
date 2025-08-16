<?php

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

if (! function_exists('logActivity')) {
    function logActivity(string $activity)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'activity' => $activity
        ]);
    }
}
