@extends('layouts.app')

@section('content')

<h1 class="text-4xl font-bold mb-8">
    Politie Vacatures
</h1>

<div class="grid md:grid-cols-3 gap-6">

@foreach($jobs as $job)

<div class="bg-slate-800 rounded-xl p-6">

    <h2 class="text-xl font-bold mb-2">
        {{ $job->title }}
    </h2>

    <p>{{ $job->location }}</p>

    <p class="mb-4">
        € {{ number_format($job->salary,0,',','.') }}
    </p>

    <a
        href="/vacature/{{ $job->id }}"
        class="bg-blue-600 px-4 py-2 rounded"
    >
        Bekijk vacature
    </a>

</div>

@endforeach

</div>

@endsectiong