{{-- resources/views/jobs/index.blade.php --}}
<x-layout>
    <div class="min-h-screen bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 py-8">

            {{-- Header --}}
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Vacatures Nationale Politie</h1>
                <p class="text-gray-500 mt-1">{{ $jobs->total() }} vacatures gevonden</p>
            </div>

            <div class="flex gap-6">

                {{-- ===== FILTER SIDEBAR ===== --}}
                <aside class="w-72 flex-shrink-0">
                    <form method="GET" action="{{ route('jobs.index') }}" id="filter-form">

                        {{-- Search bar --}}
                        <div class="bg-[#dce8f0] rounded p-4 mb-4">
                            <div class="flex">
                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Zoek..."
                                    class="flex-1 px-3 py-2 text-sm border-0 rounded-l bg-white focus:outline-none focus:ring-2 focus:ring-blue-400"
                                >
                                <button type="submit" class="bg-white px-3 py-2 rounded-r border-l border-gray-200 hover:bg-gray-50">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Active filters --}}
                        @if(request()->hasAny(['search', 'field', 'province', 'education']))
                            <div class="bg-[#dce8f0] rounded p-4 mb-4 text-sm">
                                <p class="font-semibold text-gray-700 mb-2">Ingestelde filters:</p>
                                <div class="flex flex-wrap gap-1">
                                    @if(request('search'))
                                        <span class="text-blue-700">
                                            "{{ request('search') }}"
                                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="ml-1 font-bold">×</a>
                                        </span>
                                    @endif
                                    @foreach((array) request('province', []) as $provinceId)
                                        @php $p = $provincesList->find($provinceId) @endphp
                                        @if($p)
                                            <span class="text-blue-700">
                                                {{ $p->name }}
                                                <a href="{{ request()->fullUrlWithQuery(['province' => array_diff((array) request('province', []), [$provinceId])]) }}" class="ml-1 font-bold">×</a>
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                                <a href="{{ route('jobs.index') }}" class="text-blue-700 text-xs mt-2 inline-block hover:underline">
                                    Verwijder alle filters ×
                                </a>
                            </div>
                        @endif

                        {{-- Filter: Field of work --}}
                        <div class="bg-[#dce8f0] rounded p-4 mb-4">
                            <h3 class="font-bold text-gray-800 mb-3">Vakgebied</h3>
                            <div class="space-y-2 max-h-80 overflow-y-auto pr-1">
                                @foreach($fieldsList as $field)
                                    <label class="flex items-start gap-2 cursor-pointer group">
                                        <input
                                            type="checkbox"
                                            name="field[]"
                                            value="{{ $field->id }}"
                                            {{ in_array($field->id, (array) request('field', [])) ? 'checked' : '' }}
                                            onchange="document.getElementById('filter-form').submit()"
                                            class="mt-0.5 rounded border-gray-400 text-blue-600 focus:ring-blue-400"
                                        >
                                        <span class="text-sm text-blue-700 group-hover:underline leading-snug">
                                            {{ $field->name }}
                                            <span class="text-gray-600">({{ $field->jobs_count }})</span>
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Filter: Province --}}
                        <div class="bg-[#dce8f0] rounded p-4 mb-4">
                            <h3 class="font-bold text-gray-800 mb-3">Provincie</h3>
                            <div class="space-y-2 max-h-80 overflow-y-auto pr-1">
                                @foreach($provincesList as $province)
                                    <label class="flex items-start gap-2 cursor-pointer group">
                                        <input
                                            type="checkbox"
                                            name="province[]"
                                            value="{{ $province->id }}"
                                            {{ in_array($province->id, (array) request('province', [])) ? 'checked' : '' }}
                                            onchange="document.getElementById('filter-form').submit()"
                                            class="mt-0.5 rounded border-gray-400 text-blue-600 focus:ring-blue-400"
                                        >
                                        <span class="text-sm text-blue-700 group-hover:underline leading-snug">
                                            {{ $province->name }}
                                            <span class="text-gray-600">({{ $province->jobs_count }})</span>
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Filter: Education level --}}
                        <div class="bg-[#dce8f0] rounded p-4 mb-4">
                            <h3 class="font-bold text-gray-800 mb-3">Opleidingsniveau</h3>
                            <div class="space-y-2">
                                @foreach($educationList as $education)
                                    <label class="flex items-start gap-2 cursor-pointer group">
                                        <input
                                            type="checkbox"
                                            name="education[]"
                                            value="{{ $education->id }}"
                                            {{ in_array($education->id, (array) request('education', [])) ? 'checked' : '' }}
                                            onchange="document.getElementById('filter-form').submit()"
                                            class="mt-0.5 rounded border-gray-400 text-blue-600 focus:ring-blue-400"
                                        >
                                        <span class="text-sm text-blue-700 group-hover:underline leading-snug">
                                            {{ $education->name }}
                                            <span class="text-gray-600">({{ $education->jobs_count }})</span>
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                    </form>
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
                                    <div class="flex flex-wrap gap-3 mt-2 text-sm text-gray-600">
                                        {{-- Location --}}
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $job->location }}
                                        </span>
                                        {{-- Province --}}
                                        @if($job->province)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 21h18M3 10h18M3 7l9-4 9 4M4 10v11M20 10v11M8 14v3m4-3v3m4-3v3"/>
                                                </svg>
                                                {{ $job->province->name }}
                                            </span>
                                        @endif
                                        {{-- Education level --}}
                                        @if($job->educationLevel)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-4-4h8"/>
                                                </svg>
                                                {{ $job->educationLevel->name }}
                                            </span>
                                        @endif
                                        {{-- Salary --}}
                                        @if($job->salary > 0)
                                            <span class="flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                € {{ number_format($job->salary, 0, ',', '.') }} / maand
                                            </span>
                                        @else
                                            <span class="text-gray-400 italic text-xs">Vrijwilligerswerk</span>
                                        @endif
                                    </div>

                                    {{-- Field of work badges --}}
                                    @if($job->fieldsOfWork->isNotEmpty())
                                        <div class="flex flex-wrap gap-1 mt-3">
                                            @foreach($job->fieldsOfWork as $field)
                                                <span class="bg-blue-100 text-blue-700 text-xs px-2 py-0.5 rounded-full">
                                                    {{ $field->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                {{-- Status badge --}}
                                <span class="ml-4 flex-shrink-0 text-xs font-medium px-2.5 py-1 rounded-full
                                    {{ $job->status === 'open' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                    {{ ucfirst($job->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded shadow-sm p-10 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="font-medium">Geen vacatures gevonden</p>
                            <p class="text-sm mt-1">Pas je filters aan of
                                <a href="{{ route('jobs.index') }}" class="text-blue-600 hover:underline">verwijder alle filters</a>.
                            </p>
                        </div>
                    @endforelse

                    {{-- Pagination --}}
                    <div class="mt-6">
                        {{ $jobs->links() }}
                    </div>
                </main>

            </div>
        </div>
    </div>
</x-layout>