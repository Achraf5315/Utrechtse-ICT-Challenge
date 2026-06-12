<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\FieldOfWork;
use App\Models\Province;
use App\Models\EducationLevel;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with(['detail', 'province', 'educationLevel', 'fieldsOfWork'])
            ->where('is_active', true);

        // Filter: search term
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Filter: fields of work (multiple allowed)
        if ($request->filled('field')) {
            $fields = (array) $request->field;
            $query->whereHas('fieldsOfWork', function ($q) use ($fields) {
                $q->whereIn('fields_of_work.id', $fields);
            });
        }

        // Filter: province (multiple allowed)
        if ($request->filled('province')) {
            $provinces = (array) $request->province;
            $query->whereIn('province_id', $provinces);
        }

        // Filter: education level (multiple allowed)
        if ($request->filled('education')) {
            $educationLevels = (array) $request->education;
            $query->whereIn('education_level_id', $educationLevels);
        }

        $jobs = $query->paginate(15)->withQueryString();

        // Fetch all filter options with available job counts
        $fieldsList = FieldOfWork::withCount(['jobs' => function ($q) {
            $q->where('is_active', true);
        }])->orderBy('name')->get();

        $provincesList = Province::withCount(['jobs' => function ($q) {
            $q->where('is_active', true);
        }])->orderBy('name')->get();

        $educationList = EducationLevel::withCount(['jobs' => function ($q) {
            $q->where('is_active', true);
        }])->orderBy('name')->get();

        return view('jobs.index', compact(
            'jobs',
            'fieldsList',
            'provincesList',
            'educationList'
        ));
    }

    public function show(Job $job)
    {
        $job->load(['detail', 'province', 'educationLevel', 'fieldsOfWork']);
        return view('jobs.show', compact('job'));
    }
}