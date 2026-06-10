<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        // Start de query voor actieve vacatures
        $query = Job::with('detail')->where('is_active', true);

        // Optioneel: Zoeken op titel of locatie
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Haal de vacatures op en pagineer per 12 stuks
        $jobs = $query->latest()->paginate(12);

        return view('welcome', compact('jobs'));
    }

    public function show(Job $job)
    {
        // Laad de details in als dat nog niet gebeurd is
        $job->load('detail');
        
        return view('jobs.show', compact('job'));
    }
}