<x-layout>
    <div class="mb-10 text-center max-w-2xl mx-auto">
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-3">Vind jouw uitdaging bij de politie</h1>
        <p class="text-lg text-slate-600">Draag bij aan een veiligere samenleving. Bekijk onze actuele IV, ICT en
            operationele vacatures.</p>

        <form action="{{ route('jobs.index') }}" method="GET" class="mt-6 flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Zoek op functie of locatie..."
                class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#002547] shadow-sm">
            <button type="submit"
                class="bg-[#002547] hover:bg-[#003366] text-white px-6 py-3 rounded-lg font-semibold transition shadow">Zoeken</button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($jobs as $job)
            <div
                class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <div class="flex justify-between items-start gap-2 mb-3">
                        <span
                            class="text-xs font-semibold bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full uppercase tracking-wider">
                            {{ $job->status }}
                        </span>
                        @if($job->salary > 0)
                            <span class="text-sm font-medium text-emerald-600">€{{ number_format($job->salary, 0, ',', '.') }}
                                p/m</span>
                        @else
                            <span class="text-sm font-medium text-slate-500">Vrijwillig</span>
                        @endif
                    </div>
                    <h2 class="text-xl font-bold text-slate-800 mb-2 hover:text-[#002547]">
                        <a href="{{ route('jobs.show', $job->id) }}">{{ ucfirst($job->title) }}</a>
                    </h2>
                    <p class="text-sm text-slate-500 flex items-center gap-1 mb-4">
                        📍 {{ $job->location }}
                    </p>
                </div>

                <a href="{{ route('jobs.show', $job->id) }}"
                    class="mt-4 block text-center bg-slate-100 hover:bg-[#002547] hover:text-white text-[#002547] font-medium py-2 px-4 rounded-lg transition text-sm">
                    Bekijk Vacature
                </a>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-white rounded-xl border border-slate-200">
                <p class="text-slate-500 text-lg">Geen vacatures gevonden.</p>
                <a href="{{ route('jobs.index') }}" class="text-[#002547] underline mt-2 inline-block">Bekijk alle
                    vacatures</a>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $jobs->appends(request()->input())->links() }}
    </div>
</x-layout>