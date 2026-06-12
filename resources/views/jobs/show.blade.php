<x-layout>
    {{-- Container gecentreerd en breedte beperkt voor betere leesbaarheid --}}
    <div class="max-w-4xl mx-auto px-4 py-6">

        {{-- Terug-knop --}}
        <div class="mb-8">
            <a href="{{ route('jobs.index') }}"
                class="text-sm font-medium text-[#002547] hover:underline flex items-center gap-1">
                ← Terug naar alle vacatures
            </a>
        </div>

        {{-- HOOFDCONTAINER: Gecentreerd, grotere tekst en nette scheidingslijnen --}}
        <div
            class="bg-white rounded-xl shadow-sm border border-slate-200 divide-y divide-slate-200 text-lg text-slate-600 leading-relaxed">

            {{-- HEADER & WAT GA JE DOEN --}}
            <div class="p-6 md:p-10 space-y-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
                        {{ ucfirst($job->title) }}
                    </h1>
                    <p class="text-slate-500 flex gap-4 text-base font-medium">
                        <span>📍 {{ $job->location }}</span>
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-slate-800 mb-3">
                        Wat ga je doen
                    </h2>
                    <div class="whitespace-pre-line">
                        {{ $job->detail->description }}
                    </div>
                </div>
            </div>

            {{-- WAAR GA JE WERKEN --}}
            @if($job->detail?->workplace)
                <div class="p-6 md:p-10">
                    <h2 class="text-2xl font-bold text-slate-800 mb-3">
                        Waar ga je werken
                    </h2>
                    <div class="whitespace-pre-line">
                        {{ $job->detail->workplace }}
                    </div>
                </div>
            @endif

            {{-- WIE BEN JIJ --}}
            @if($job->detail?->requirements)
                <div class="p-6 md:p-10">
                    <h2 class="text-2xl font-bold text-slate-800 mb-3">
                        Wie ben jij
                    </h2>
                    <ul class="space-y-4">
                        @foreach(explode("\n", str_replace("\r", "", $job->detail->requirements)) as $line)
                            @if(trim($line) !== '')
                                <li class="flex items-start gap-3">
                                    <span class="text-green-600 font-bold mt-0.5">✓</span>
                                    <span>{{ ltrim(trim($line), '- ') }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- VERANTWOORDELIJKHEDEN --}}
            @if($job->detail?->responsibilities)
                <div class="p-6 md:p-10">
                    <h2 class="text-2xl font-bold text-slate-800 mb-3">
                        Jouw verantwoordelijkheden
                    </h2>
                    <ul class="space-y-4">
                        @foreach(explode("\n", str_replace("\r", "", $job->detail->responsibilities)) as $line)
                            @if(trim($line) !== '')
                                <li class="flex items-start gap-3">
                                    <span class="text-blue-600 font-bold mt-0.5">•</span>
                                    <span>{{ ltrim(trim($line), '- ') }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- BENEFITS --}}
            @if($job->detail?->benefits)
                <div class="p-6 md:p-10">
                    <h2 class="text-2xl font-bold text-slate-800 mb-3">
                        Wat bieden wij jou?
                    </h2>
                    <ul class="space-y-4">
                        @foreach(explode("\n", str_replace("\r", "", $job->detail->benefits)) as $line)
                            @if(trim($line) !== '')
                                <li class="flex items-start gap-3">
                                    <span class="text-blue-600 font-bold mt-0.5">•</span>
                                    <span>{{ ltrim(trim($line), '- ') }}</span>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- INTERESSE --}}
            <div
                class="p-6 md:p-10 bg-slate-50 rounded-b-xl flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="max-w-xl">
                    <h2 class="text-2xl font-bold text-slate-800 mb-2">
                        Interesse?
                    </h2>
                    <p class="text-base text-slate-600">
                        Ben jij enthousiast over deze functie? Solliciteer direct en maak het verschil in jouw carrière.
                    </p>
                </div>
                <div class="flex-shrink-0">
                    <button
                        class="w-full md:w-auto bg-[#002547] hover:bg-[#003366] text-white font-bold py-3 px-8 rounded-lg transition shadow-sm text-base">
                        Direct Solliciteren
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-layout>