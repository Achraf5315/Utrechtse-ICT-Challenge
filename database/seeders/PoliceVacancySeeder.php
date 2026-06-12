<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PoliceVacancySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // ── Seed education levels ──────────────────────────────────────────
        $educationLevels = [
            'VMBO-KB / MBO 2',
            'MBO 3',
            'MBO 4',
            'HBO Bachelor',
            'WO',
        ];

        foreach ($educationLevels as $name) {
            DB::table('education_levels')->insertOrIgnore([
                'name'       => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // ── Seed provinces ─────────────────────────────────────────────────
        $provinces = [
            'Drenthe', 'Flevoland', 'Friesland', 'Gelderland', 'Groningen',
            'Limburg', 'Nederland', 'Noord-Brabant', 'Noord-Holland',
            'Overijssel', 'Utrecht', 'Zeeland', 'Zuid-Holland',
        ];

        foreach ($provinces as $name) {
            DB::table('provinces')->insertOrIgnore([
                'name'       => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // ── Seed fields of work ────────────────────────────────────────────
        $fieldsOfWork = [
            'Administratie en secretarieel',
            'Agent',
            'Analyse & Onderzoek',
            'Bedrijfsvoering',
            'Beveiliging',
            'Digitale Opsporing',
            'Facility',
            'HRM',
            'ICT',
            'Intelligence',
            'Juridisch',
            'Meldkamer',
            'Opsporing',
            'Techniek',
            'Vrijwilligerswerk',
        ];

        foreach ($fieldsOfWork as $name) {
            DB::table('fields_of_work')->insertOrIgnore([
                'name'       => $name,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Helper: get id from table by name
        $getId = fn(string $table, string $name): ?int =>
            DB::table($table)->where('name', $name)->value('id');

        // ── Job listings ───────────────────────────────────────────────────
        // Each entry has: title, location, salary, province, education, fields[]
        $jobs = [
            [
                'title'     => 'hbo-bachelor Politiekunde tot politieagent (3 jaar)',
                'location'  => 'Eenheid Midden-Nederland',
                'salary'    => 3200.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Agent'],
            ],
            [
                'title'     => 'hbo-bachelor rechercheur (3 jaar)',
                'location'  => 'Eenheid Midden-Nederland',
                'salary'    => 3400.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Opsporing'],
            ],
            [
                'title'     => 'domeinarchitect Platformen',
                'location'  => 'Odijk',
                'salary'    => 5500.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'senior backend developer',
                'location'  => 'Utrecht',
                'salary'    => 5800.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'cloud platform engineer',
                'location'  => 'Nieuwegein',
                'salary'    => 5600.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'arrestantenbeveiliger - Team Arrestantentaken',
                'location'  => 'Houten',
                'salary'    => 2400.00,
                'province'  => 'Utrecht',
                'education' => 'VMBO-KB / MBO 2',
                'fields'    => ['Beveiliging'],
            ],
            [
                'title'     => 'senior projectleider – Team Bijzondere Bedrijfsvoering',
                'location'  => 'Omgeving Driebergen',
                'salary'    => 6200.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Bedrijfsvoering'],
            ],
            [
                'title'     => 'senior developer',
                'location'  => 'Utrecht',
                'salary'    => 5900.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'senior tester - Internationale Politie Samenwerking',
                'location'  => 'Utrecht',
                'salary'    => 5700.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'CI/CD developer',
                'location'  => 'Utrecht',
                'salary'    => 5400.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'coördinator people & competencies',
                'location'  => 'Utrecht',
                'salary'    => 5200.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['HRM', 'ICT'],
            ],
            [
                'title'     => 'solution architect - politie.nl',
                'location'  => 'Utrecht',
                'salary'    => 6000.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'medior data-analist',
                'location'  => 'Amsterdam / Utrecht',
                'salary'    => 5100.00,
                'province'  => 'Noord-Holland',
                'education' => 'HBO Bachelor',
                'fields'    => ['Analyse & Onderzoek', 'ICT', 'Digitale Opsporing'],
            ],
            [
                'title'     => 'senior contractmanager',
                'location'  => 'Zeist',
                'salary'    => 6100.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Facility', 'ICT', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'operationeel expert intelligence - CTER-cluster',
                'location'  => 'In nabije omgeving van Utrecht',
                'salary'    => 3600.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 4',
                'fields'    => ['Intelligence'],
            ],
            [
                'title'     => 'DevOps engineer',
                'location'  => 'Utrecht',
                'salary'    => 5500.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'senior informatieanalist',
                'location'  => 'Utrecht',
                'salary'    => 5700.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'Linux DevOps engineer',
                'location'  => 'Utrecht',
                'salary'    => 5600.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'senior netwerkbeheerder - Cluster Connectiviteit',
                'location'  => 'Driebergen-Rijsenburg',
                'salary'    => 3800.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 4',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'DevOps engineer operations - Digitaal Politie Contact',
                'location'  => 'Utrecht',
                'salary'    => 5500.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'DevOps engineer operations - politie.nl',
                'location'  => 'Utrecht',
                'salary'    => 5500.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'scrum master - Digitaal Politie Contact',
                'location'  => 'Utrecht',
                'salary'    => 5800.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'Kwaliteitsmedewerker Gebruikersondersteuning IV',
                'location'  => 'Odijk',
                'salary'    => 4800.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Administratie en secretarieel', 'ICT'],
            ],
            [
                'title'     => 'IV-expert',
                'location'  => 'Driebergen',
                'salary'    => 5300.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'dienstencoördinator C2000RA en VICT',
                'location'  => 'Odijk',
                'salary'    => 5200.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'administratief ondersteuner - Keuringsdienst',
                'location'  => 'Driebergen',
                'salary'    => 2600.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 3',
                'fields'    => ['Administratie en secretarieel'],
            ],
            [
                'title'     => 'medewerker bedrijfsadministratie',
                'location'  => 'Utrecht',
                'salary'    => 2700.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 3',
                'fields'    => ['Facility', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'senior medewerker bedrijfsadministratie',
                'location'  => 'Utrecht',
                'salary'    => 3500.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 4',
                'fields'    => ['Facility', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'software engineer - DIGIT',
                'location'  => 'Driebergen-Rijsenburg',
                'salary'    => 5400.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'offensive security specialist - DIGIT',
                'location'  => 'Driebergen-Rijsenburg',
                'salary'    => 5900.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT', 'Digitale Opsporing'],
            ],
            [
                'title'     => 'junior vastgoed specialist',
                'location'  => 'Zeist',
                'salary'    => 3200.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 4',
                'fields'    => ['Facility', 'ICT', 'Techniek'],
            ],
            [
                'title'     => 'productmanager 112-meldkamer',
                'location'  => 'Zeist',
                'salary'    => 5700.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT', 'Meldkamer'],
            ],
            [
                'title'     => 'recherchemedewerker - Midden-Nederland',
                'location'  => 'Utrecht',
                'salary'    => 2900.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 3',
                'fields'    => ['Opsporing'],
            ],
            [
                'title'     => 'DevOps & integration engineer',
                'location'  => 'Utrecht',
                'salary'    => 5500.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'senior fullstack developer',
                'location'  => 'Utrecht',
                'salary'    => 6000.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'senior product manager cloud & platformregie',
                'location'  => 'Zeist',
                'salary'    => 6300.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'Woo-jurist',
                'location'  => "'s-Hertogenbosch",
                'salary'    => 5000.00,
                'province'  => 'Noord-Brabant',
                'education' => 'HBO Bachelor',
                'fields'    => ['Juridisch', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'digitaal rechercheur oorlogsmisdrijven',
                'location'  => 'Woerden',
                'salary'    => 5200.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Digitale Opsporing', 'Opsporing'],
            ],
            [
                'title'     => 'coördinator Leren & Ontwikkelen',
                'location'  => 'Driebergen-Rijsenburg',
                'salary'    => 5100.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Bedrijfsvoering'],
            ],
            [
                'title'     => 'personeelscoördinator - Digitaal Politie Contact',
                'location'  => 'Utrecht',
                'salary'    => 4900.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['HRM', 'ICT'],
            ],
            [
                'title'     => 'nationaal coördinator – Nationale Intelligence Voorziening',
                'location'  => 'Driebergen',
                'salary'    => 6500.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Intelligence'],
            ],
            [
                'title'     => 'senior data scientist / responsible AI policy expert',
                'location'  => 'Nieuwegein',
                'salary'    => 6400.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'Innovatiemakelaar - Eenheid Midden-Nederland',
                'location'  => 'Utrecht',
                'salary'    => 5300.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Bedrijfsvoering'],
            ],
            [
                'title'     => 'regievoerend contractmanager',
                'location'  => 'Zeist',
                'salary'    => 5800.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['Facility', 'ICT'],
            ],
            [
                'title'     => 'specialist informatiebeveiliging',
                'location'  => 'Zeist',
                'salary'    => 5900.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT', 'Bedrijfsvoering'],
            ],
            [
                'title'     => 'senior domeinarchitect Technologie',
                'location'  => 'Odijk',
                'salary'    => 7200.00,
                'province'  => 'Utrecht',
                'education' => 'WO',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'domeinarchitect Technologie',
                'location'  => 'Odijk',
                'salary'    => 6000.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'domeinarchitect ketenpartners',
                'location'  => 'Odijk',
                'salary'    => 6000.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'infrastructure engineer meldkamer',
                'location'  => 'Zeist',
                'salary'    => 5400.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'politievrijwilliger telecomtechnologieën',
                'location'  => 'Almere of Utrecht',
                'salary'    => 0.00,
                'province'  => 'Flevoland',
                'education' => 'HBO Bachelor',
                'fields'    => ['Techniek', 'Vrijwilligerswerk'],
            ],
            [
                'title'     => 'bedrijfsarts',
                'location'  => 'Landelijk',
                'salary'    => 8500.00,
                'province'  => 'Nederland',
                'education' => 'WO',
                'fields'    => ['HRM'],
            ],
            [
                'title'     => 'solution architect Endpoints',
                'location'  => 'Odijk',
                'salary'    => 6100.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'developer infrastructure backup-voorziening',
                'location'  => 'Driebergen-Rijsenburg',
                'salary'    => 5400.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'infrastructure engineer backup-voorzieningen',
                'location'  => 'Driebergen-Rijsenburg',
                'salary'    => 5300.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'delivery manager backup-voorziening',
                'location'  => 'Driebergen-Rijsenburg',
                'salary'    => 6000.00,
                'province'  => 'Utrecht',
                'education' => 'HBO Bachelor',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'functioneel beheerder',
                'location'  => 'Rotterdam / Utrecht',
                'salary'    => 3700.00,
                'province'  => 'Zuid-Holland',
                'education' => 'MBO 4',
                'fields'    => ['ICT'],
            ],
            [
                'title'     => 'politieopleiding tot agent',
                'location'  => 'Eenheid Midden-Nederland',
                'salary'    => 2800.00,
                'province'  => 'Utrecht',
                'education' => 'MBO 4',
                'fields'    => ['Agent'],
            ],
        ];

        // ── Insert jobs ────────────────────────────────────────────────────
        foreach ($jobs as $job) {
            $provinceId        = $getId('provinces', $job['province']);
            $educationLevelId  = $getId('education_levels', $job['education']);

            $detailId = DB::table('job_details')->insertGetId([
                'description'      => "Wij zoeken een enthousiaste {$job['title']} voor de Nationale Politie. "
                    . "In deze functie werk je binnen het vakgebied " . implode(', ', $job['fields']) . " en draag je bij aan een veilige samenleving. "
                    . "Het vereiste opleidingsniveau is {$job['education']}.",

                'requirements'     => "- Afgerond {$job['education']} diploma\n"
                    . "- Minimaal 2 jaar relevante werkervaring binnen " . implode(', ', $job['fields']) . "\n"
                    . "- Goede communicatieve vaardigheden in het Nederlands\n"
                    . "- Beschikbaar voor een VOG-screening\n"
                    . "- Woonachtig in of bereid te verhuizen naar de regio {$job['location']}",

                'responsibilities' => "- Uitvoeren van werkzaamheden binnen het team " . implode(', ', $job['fields']) . "\n"
                    . "- Samenwerken met collega's in de regio {$job['location']}\n"
                    . "- Rapporteren aan de leidinggevende over voortgang en bevindingen\n"
                    . "- Bijdragen aan de continue verbetering van werkprocessen\n"
                    . "- Deelnemen aan teamoverleggen en werkgroepen",

                'benefits'         => "- Salaris tussen € " . number_format($job['salary'] * 0.9, 2, '.', '') . " en € " . number_format($job['salary'] * 1.1, 2, '.', '') . " bruto per maand (schaal afhankelijk van ervaring)\n"
                    . "- Pensioenopbouw via ABP\n"
                    . "- 8% vakantietoeslag + eindejaarsuitkering\n"
                    . "- Goede secundaire arbeidsvoorwaarden conform CAO Politie\n"
                    . "- Opleidingsmogelijkheden en loopbaanontwikkeling binnen de Nationale Politie",

                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $jobId = DB::table('jobs')->insertGetId([
                'job_detail_id'      => $detailId,
                'title'              => $job['title'],
                'location'           => $job['location'],
                'salary'             => $job['salary'],
                'status'             => 'open',
                'is_active'          => true,
                'province_id'        => $provinceId,
                'education_level_id' => $educationLevelId,
                'created_at'         => $now,
                'updated_at'         => $now,
            ]);

            // Link fields of work via pivot table
            foreach ($job['fields'] as $fieldName) {
                $fieldId = $getId('fields_of_work', $fieldName);
                if ($fieldId) {
                    DB::table('job_field_of_work')->insert([
                        'job_id'          => $jobId,
                        'field_of_work_id' => $fieldId,
                    ]);
                }
            }
        }
    }
}