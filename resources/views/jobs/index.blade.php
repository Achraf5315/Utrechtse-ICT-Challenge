{{-- resources/views/jobs/index.blade.php --}}
<x-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Vacatures Nationale Politie</h1>
                <p class="text-gray-500 mt-1">{{ $jobs->total() }} vacatures gevonden</p>
            </div>

            {{-- GEMEENSCHAPPELIJK FILTER FORMULIER --}}
            <form method="GET" action="{{ route('jobs.index') }}" id="filter-form">

                {{-- Actieve filters (Tags) --}}
                @if(request()->hasAny(['search', 'field', 'province', 'education']))
                    <div class="mb-6 flex flex-wrap items-center gap-2 text-xs px-2">
                        <span class="text-slate-500 font-medium">Actieve filters:</span>

                        @if(request('search'))
                            <span
                                class="bg-slate-100 text-slate-700 px-2.5 py-1 rounded-full border border-slate-200 flex items-center gap-1.5">
                                "{{ request('search') }}"
                                <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                    class="font-bold text-slate-400 hover:text-slate-600">×</a>
                            </span>
                        @endif

                        @foreach((array) request('field', []) as $id)
                            @php $item = $fieldsList->find($id) @endphp
                            @if($item)
                                <span
                                    class="bg-blue-50 text-[#002547] px-2.5 py-1 rounded-full border border-blue-100 flex items-center gap-1.5">
                                    {{ $item->name }}
                                    <a href="{{ request()->fullUrlWithQuery(['field' => array_diff((array) request('field', []), [$id])]) }}"
                                        class="font-bold text-blue-400 hover:text-blue-600">×</a>
                                </span>
                            @endif
                        @endforeach

                        @foreach((array) request('province', []) as $id)
                            @php $item = $provincesList->find($id) @endphp
                            @if($item)
                                <span
                                    class="bg-blue-50 text-[#002547] px-2.5 py-1 rounded-full border border-blue-100 flex items-center gap-1.5">
                                    {{ $item->name }}
                                    <a href="{{ request()->fullUrlWithQuery(['province' => array_diff((array) request('province', []), [$id])]) }}"
                                        class="font-bold text-blue-400 hover:text-blue-600">×</a>
                                </span>
                            @endif
                        @endforeach

                        @foreach((array) request('education', []) as $id)
                            @php $item = $educationList->find($id) @endphp
                            @if($item)
                                <span
                                    class="bg-blue-50 text-[#002547] px-2.5 py-1 rounded-full border border-blue-100 flex items-center gap-1.5">
                                    {{ $item->name }}
                                    <a href="{{ request()->fullUrlWithQuery(['education' => array_diff((array) request('education', []), [$id])]) }}"
                                        class="font-bold text-blue-400 hover:text-blue-600">×</a>
                                </span>
                            @endif
                        @endforeach

                        <a href="{{ route('jobs.index') }}" class="text-[#002547] hover:underline font-semibold ml-1">
                            Wis alles
                        </a>
                    </div>
                @endif

                {{-- ===== HOOFD CONTENT GEBIED ===== --}}
                <div class="flex flex-col md:flex-row gap-6">

                    {{-- ===== GECORRIGEERDE SIDEBAR ===== --}}
                    <aside class="w-full md:w-72 flex-shrink-0 space-y-5">

                        {{-- Filter: Trefwoord (Nu netjes gestijld binnen de sidebar) --}}
                        <div class="flex flex-col">
                            <label
                                class="text-xs font-bold text-[#002547] uppercase tracking-wider mb-1.5 pl-1">Trefwoord</label>
                            <div
                                class="bg-white rounded-lg shadow-sm border border-slate-200 p-2 flex items-center justify-between gap-2 focus-within:ring-2 focus-within:ring-blue-500">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Zoek een vacature..."
                                    class="w-full text-slate-700 placeholder-slate-400 bg-transparent border-0 p-1 text-sm focus:ring-0 focus:outline-none">
                                <button type="submit"
                                    class="bg-[#002547] hover:bg-[#003366] text-white p-2 rounded-md transition shadow-sm flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Filter: Vakgebied (Let op: 'field' in plaats van 'field[]') --}}
                        <div class="flex flex-col">
                            <label
                                class="text-xs font-bold text-[#002547] uppercase tracking-wider mb-1.5 pl-1">Vakgebied</label>
                            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-2.5">
                                <select name="field" onchange="document.getElementById('filter-form').submit()"
                                    class="w-full text-slate-700 bg-transparent border-0 p-0 text-sm focus:ring-0 focus:outline-none cursor-pointer">
                                    <option value="">Welk vakgebied?</option>
                                    @foreach($fieldsList as $field)
                                        <option value="{{ $field->id }}" {{ in_array($field->id, (array) request('field', [])) ? 'selected' : '' }} {{ $field->jobs_count == 0 && !in_array($field->id, (array) request('field', [])) ? 'disabled class=text-slate-300' : '' }}>
                                            {{ $field->name }} ({{ $field->jobs_count }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Filter: Locatie (Let op: 'province' in plaats van 'province[]') --}}
                        <div class="flex flex-col">
                            <label
                                class="text-xs font-bold text-[#002547] uppercase tracking-wider mb-1.5 pl-1">Locatie</label>
                            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-2.5">
                                <select name="province" onchange="document.getElementById('filter-form').submit()"
                                    class="w-full text-slate-700 bg-transparent border-0 p-0 text-sm focus:ring-0 focus:outline-none cursor-pointer">
                                    <option value="">Waar wil je zoeken?</option>
                                    @foreach($provincesList as $province)
                                        <option value="{{ $province->id }}" {{ in_array($province->id, (array) request('province', [])) ? 'selected' : '' }} {{ $province->jobs_count == 0 && !in_array($province->id, (array) request('province', [])) ? 'disabled class=text-slate-300' : '' }}>
                                            📍 {{ $province->name }} ({{ $province->jobs_count }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Filter: Opleidingsniveau (Let op: 'education' in plaats van 'education[]') --}}
                        <div class="flex flex-col">
                            <label
                                class="text-xs font-bold text-[#002547] uppercase tracking-wider mb-1.5 pl-1">Opleiding</label>
                            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-2.5">
                                <select name="education" onchange="document.getElementById('filter-form').submit()"
                                    class="w-full text-slate-700 bg-transparent border-0 p-0 text-sm focus:ring-0 focus:outline-none cursor-pointer">
                                    <option value="">Welk niveau?</option>
                                    @foreach($educationList as $education)
                                        <option value="{{ $education->id }}" {{ in_array($education->id, (array) request('education', [])) ? 'selected' : '' }} {{ $education->jobs_count == 0 && !in_array($education->id, (array) request('education', [])) ? 'disabled class=text-slate-300' : '' }}>
                                            🎓 {{ $education->name }} ({{ $education->jobs_count }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Extra knop voor mobiel --}}
                        <button type="submit"
                            class="w-full md:hidden bg-[#002547] text-white py-2 rounded-lg font-bold text-sm">
                            Filters toepassen
                        </button>
                    </aside>

                    {{-- ===== JOB LISTINGS ===== --}}
                    <main class="flex-1">
                        @forelse($jobs as $job)
                            <div class="bg-white rounded shadow-sm mb-3 p-5 hover:shadow-md transition-shadow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <a href="{{ route('jobs.show', $job) }}"
                                            class="text-blue-700 font-semibold text-lg hover:underline">
                                            {{ $job->title }}
                                        </a>
                                        <p class="text-gray-600 mt-1 text-sm">{{ $job->short_description }}</p>

                                        <div class="flex flex-wrap gap-3 mt-3 text-sm text-gray-500">
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                {{ $job->location }}
                                            </span>
                                            @if($job->province)
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11M8 14v3m4-3v3m4-3v3" />
                                                    </svg>
                                                    {{ $job->province->name }}
                                                </span>
                                            @endif
                                            @if($job->educationLevel)
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-4-4h8" />
                                                    </svg>
                                                    {{ $job->educationLevel->name }}
                                                </span>
                                            @endif
                                            @if($job->salary > 0)
                                                <span class="flex items-center gap-1">
                                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    € {{ number_format($job->salary, 0, ',', '.') }} / maand
                                                </span>
                                            @else
                                                <span class="text-gray-400 italic text-xs">Vrijwilligerswerk</span>
                                            @endif
                                        </div>

                                        @if($job->fieldsOfWork->isNotEmpty())
                                            <div class="flex flex-wrap gap-1 mt-3">
                                                @foreach($job->fieldsOfWork as $field)
                                                    <span
                                                        class="bg-blue-50 text-blue-700 text-xs px-2.5 py-1 rounded-full border border-blue-100 font-medium">
                                                        {{ $field->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <span
                                        class="ml-4 flex-shrink-0 text-xs font-medium px-2.5 py-1 rounded-full {{ $job->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                        {{ ucfirst($job->status) }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="bg-white rounded shadow-sm p-10 text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="font-medium">Geen vacatures gevonden</p>
                                <p class="text-sm mt-1">Pas je filters aan of <a href="{{ route('jobs.index') }}"
                                        class="text-blue-600 hover:underline">verwijder alle filters</a>.</p>
                            </div>
                        @endforelse

                        {{-- Pagination --}}
                        <div class="mt-6">
                            {{ $jobs->links() }}
                        </div>
                    </main>

                </div>
            </form>
        </div>
    </div>
</x-layout>