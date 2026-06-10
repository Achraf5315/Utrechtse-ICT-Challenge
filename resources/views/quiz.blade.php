@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto py-10">

    <h1 class="text-4xl font-extrabold mb-8 text-center text-blue-400 tracking-wide">
        Politie Beroepentest
    </h1>

    <div id="quiz" class="bg-slate-900 p-6 rounded-xl shadow-lg border border-slate-700"></div>

    <div id="result" class="mt-10 text-2xl font-bold text-center text-blue-300"></div>

</div>

<script>
/**
 * Vakgebieden die jullie DB al impliciet bevat
 */
const categories = {
    ICT: 0,
    Opsporing: 0,
    Agent: 0,
    HRM: 0,
    Meldkamer: 0,
    Administratie: 0,
    Intelligence: 0,
    Facility: 0,
    Techniek: 0
};

/**
 * Quizvragen
 */
const questions = [
    {
        q: "Wat lijkt je het leukst?",
        a: [
            ["Werken met computers en systemen", "ICT"],
            ["Criminaliteit onderzoeken", "Opsporing"],
            ["Op straat werken", "Agent"],
            ["Organiseren en regelen", "HRM"]
        ]
    },
    {
        q: "Waar krijg je energie van?",
        a: [
            ["Cybersecurity en data", "ICT"],
            ["Bewijs en recherchewerk", "Opsporing"],
            ["Mensen helpen in nood", "Agent"],
            ["Administratie en planning", "Administratie"]
        ]
    },
    {
        q: "Wat past het best bij jou?",
        a: [
            ["Technische systemen bouwen", "Techniek"],
            ["Misdrijven oplossen", "Opsporing"],
            ["Surveillance op straat", "Agent"],
            ["Informatie analyseren", "Intelligence"]
        ]
    },
    {
        q: "Welke taak spreekt je aan?",
        a: [
            ["Netwerken beveiligen", "ICT"],
            ["Verdachten opsporen", "Opsporing"],
            ["Patrouilleren", "Agent"],
            ["Meldingen verwerken", "Meldkamer"]
        ]
    }
];

let current = 0;

function renderQuestion() {
    const container = document.getElementById("quiz");

    if (current >= questions.length) {
        showResult();
        return;
    }

    const q = questions[current];

    container.innerHTML = `
        <div class="mb-6">
            <p class="text-sm text-slate-400 mb-2">Vraag ${current + 1} van ${questions.length}</p>
            <h2 class="text-2xl font-semibold mb-4 text-white">${q.q}</h2>
        </div>

        <div class="space-y-4">
            ${q.a.map(answer => `
                <button class="w-full p-4 bg-slate-800 rounded-lg border border-slate-700 hover:bg-slate-700 hover:border-blue-500 transition duration-200 text-left text-slate-200"
                    onclick="selectAnswer('${answer[1]}')">
                    ${answer[0]}
                </button>
            `).join('')}
        </div>
    `;
}

function selectAnswer(category) {
    categories[category]++;
    current++;
    renderQuestion();
}

function showResult() {
    const winner = Object.keys(categories).reduce((a, b) =>
        categories[a] > categories[b] ? a : b
    );

    document.getElementById("quiz").innerHTML = `
        <div class="p-6 bg-slate-900 rounded-xl border border-slate-700 shadow-lg">
            <h2 class="text-3xl font-bold text-blue-400 mb-4 text-center">Jouw resultaat</h2>
            <p class="text-xl text-center text-slate-200">
                Jij past het best bij:
                <span class="text-blue-400 font-extrabold">${winner}</span>
            </p>

            <div class="mt-6 text-center">
                <a href="/vacatures" class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-500 rounded-lg text-white font-semibold transition">
                    Bekijk passende vacatures
                </a>
            </div>
        </div>
    `;
}

renderQuestion();
</script>

@endsection
