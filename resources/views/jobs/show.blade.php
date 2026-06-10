<x-layout>
    <div class="mb-6">
        <a href="{{ route('jobs.index') }}" class="text-sm font-medium text-[#002547] hover:underline">← Terug naar alle
            vacatures</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-slate-200">
                <h1 class="text-3xl font-extrabold text-slate-900 mb-2">{{ ucfirst($job->title) }}</h1>
                <p class="text-slate-500 mb-6 flex gap-4">
                    <span>{{ $job->location }}</span>
                    <span>• Status: {{ ucfirst($job->status) }}</span>
                </p>

                <h3 class="text-xl font-bold text-slate-800 mb-3">Functieomschrijving</h3>
                <p class="text-slate-600 leading-relaxed mb-6">
                    {{ $job->detail->description }}
                </p>

                <hr class="border-slate-200 my-6">

                <h3 class="text-xl font-bold text-slate-800 mb-3">Functie-eisen</h3>
                <div class="text-slate-600 leading-relaxed whitespace-pre-line">
                    {!! nl2br(e($job->detail->requirements)) !!}
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-xl shadow-sm border border-slate-200">
                <h3 class="text-xl font-bold text-slate-800 mb-3">Jouw Verantwoordelijkheden</h3>
                <div class="text-slate-600 leading-relaxed whitespace-pre-line">
                    {!! nl2br(e($job->detail->responsibilities)) !!}
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-[#002547] text-white p-6 rounded-xl shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-amber-400">Wat bieden wij jou?</h3>
                    <div class="text-sm text-slate-200 space-y-2 whitespace-pre-line leading-relaxed">
                        {!! nl2br(e($job->detail->benefits)) !!}
                    </div>
                </div>
                <button
                    class="mt-8 w-full bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold py-3 px-4 rounded-lg transition shadow text-center">
                    Direct Solliciteren
                </button>
            </div>
        </div>
    </div>
</x-layout>