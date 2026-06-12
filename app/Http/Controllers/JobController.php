<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use App\Models\FieldOfWork;
use App\Models\Job;
use App\Models\Province;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        // Vang de geselecteerde filters op als arrays
        $search = $request->input('search');
        $fields = (array) $request->input('field');
        $provinces = (array) $request->input('province');
        $education = (array) $request->input('education');

        // ─────────────────────────────────────────────────────────────────
        // 1. DE HOOFDQUERY (Voor de vacatures zelf)
        // ─────────────────────────────────────────────────────────────────
        $query = Job::with(['detail', 'province', 'educationLevel', 'fieldsOfWork'])
            ->where('is_active', true);

        if ($request->filled('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%'.$search.'%')
                    ->orWhereHas('detail', function ($detailQuery) use ($search) {
                        $detailQuery->where('description', 'like', '%'.$search.'%');
                    });
            });
        }

        if (! empty($fields)) {
            $query->whereHas('fieldsOfWork', function ($q) use ($fields) {
                $q->whereIn('fields_of_work.id', $fields);
            });
        }

        if (! empty($provinces)) {
            $query->whereIn('province_id', $provinces);
        }

        if (! empty($education)) {
            $query->whereIn('education_level_id', $education);
        }

        $jobs = $query->paginate(15)->withQueryString();

        // ─────────────────────────────────────────────────────────────────
        // 2. DYNAMISCHE TELLERS VOOR DE ZIJBALK
        // ─────────────────────────────────────────────────────────────────

        // Aantallen voor Vakgebieden (rekening houdend met Provincie, Opleiding & Zoekterm)
        $fieldsList = FieldOfWork::withCount(['jobs' => function ($q) use ($search, $provinces, $education) {
            $q->where('is_active', true);
            if (! empty($search)) {
                $q->where('title', 'like', '%'.$search.'%');
            }
            if (! empty($provinces)) {
                $q->whereIn('province_id', $provinces);
            }
            if (! empty($education)) {
                $q->whereIn('education_level_id', $education);
            }
        }])->orderBy('name')->get();

        // Aantallen voor Provincies (rekening houdend met Vakgebied, Opleiding & Zoekterm)
        $provincesList = Province::withCount(['jobs' => function ($q) use ($search, $fields, $education) {
            $q->where('is_active', true);
            if (! empty($search)) {
                $q->where('title', 'like', '%'.$search.'%');
            }
            if (! empty($fields)) {
                $q->whereHas('fieldsOfWork', function ($fq) use ($fields) {
                    $fq->whereIn('fields_of_work.id', $fields);
                });
            }
            if (! empty($education)) {
                $q->whereIn('education_level_id', $education);
            }
        }])->orderBy('name')->get();

        // Aantallen voor Opleidingsniveaus (rekening houdend met Vakgebied, Provincie & Zoekterm)
        $educationList = EducationLevel::withCount(['jobs' => function ($q) use ($search, $fields, $provinces) {
            $q->where('is_active', true);
            if (! empty($search)) {
                $q->where('title', 'like', '%'.$search.'%');
            }
            if (! empty($fields)) {
                $q->whereHas('fieldsOfWork', function ($fq) use ($fields) {
                    $fq->whereIn('fields_of_work.id', $fields);
                });
            }
            if (! empty($provinces)) {
                $q->whereIn('province_id', $provinces);
            }
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
