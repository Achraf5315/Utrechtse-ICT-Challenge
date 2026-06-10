<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PolitieVacatureSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $vacatures = [
            [
                'title'    => 'hbo-bachelor Politiekunde tot politieagent (3 jaar)',
                'location' => 'Eenheid Midden-Nederland',
                'salary'   => 3200.00,
                'field'    => 'Agent',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'hbo-bachelor rechercheur (3 jaar)',
                'location' => 'Eenheid Midden-Nederland',
                'salary'   => 3400.00,
                'field'    => 'Opsporing',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'domeinarchitect Platformen',
                'location' => 'Odijk',
                'salary'   => 5500.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior backend developer',
                'location' => 'Utrecht',
                'salary'   => 5800.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'cloud platform engineer',
                'location' => 'Nieuwegein',
                'salary'   => 5600.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'arrestantenbeveiliger - Team Arrestantentaken',
                'location' => 'Houten',
                'salary'   => 2400.00,
                'field'    => 'Beveiliging',
                'level'    => 'VMBO-KB / MBO 2',
            ],
            [
                'title'    => 'senior projectleider – Team Bijzondere Bedrijfsvoering',
                'location' => 'Omgeving Driebergen',
                'salary'   => 6200.00,
                'field'    => 'Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior developer',
                'location' => 'Utrecht',
                'salary'   => 5900.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior tester - Internationale Politie Samenwerking',
                'location' => 'Utrecht',
                'salary'   => 5700.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'CI/CD developer',
                'location' => 'Utrecht',
                'salary'   => 5400.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'coördinator people & competencies',
                'location' => 'Utrecht',
                'salary'   => 5200.00,
                'field'    => 'HRM / ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'solution architect - politie.nl',
                'location' => 'Utrecht',
                'salary'   => 6000.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'medior data-analist',
                'location' => 'Amsterdam / Utrecht',
                'salary'   => 5100.00,
                'field'    => 'Analyse & Onderzoek / ICT / Digitale Opsporing',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior contractmanager',
                'location' => 'Zeist',
                'salary'   => 6100.00,
                'field'    => 'Facility / ICT / Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'operationeel expert intelligence - CTER-cluster',
                'location' => 'In nabije omgeving van Utrecht',
                'salary'   => 3600.00,
                'field'    => 'Intelligence',
                'level'    => 'MBO 4',
            ],
            [
                'title'    => 'DevOps engineer',
                'location' => 'Utrecht',
                'salary'   => 5500.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior informatieanalist',
                'location' => 'Utrecht',
                'salary'   => 5700.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'Linux DevOps engineer',
                'location' => 'Utrecht',
                'salary'   => 5600.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior netwerkbeheerder - Cluster Connectiviteit',
                'location' => 'Driebergen-Rijsenburg',
                'salary'   => 3800.00,
                'field'    => 'ICT',
                'level'    => 'MBO 4',
            ],
            [
                'title'    => 'DevOps engineer operations - Digitaal Politie Contact',
                'location' => 'Utrecht',
                'salary'   => 5500.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'DevOps engineer operations - politie.nl',
                'location' => 'Utrecht',
                'salary'   => 5500.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'scrum master - Digitaal Politie Contact',
                'location' => 'Utrecht',
                'salary'   => 5800.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'Kwaliteitsmedewerker Gebruikersondersteuning IV',
                'location' => 'Odijk',
                'salary'   => 4800.00,
                'field'    => 'Administratie / ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'IV-expert',
                'location' => 'Driebergen',
                'salary'   => 5300.00,
                'field'    => 'ICT / Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'dienstencoördinator C2000RA en VICT',
                'location' => 'Odijk',
                'salary'   => 5200.00,
                'field'    => 'ICT / Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'administratief ondersteuner - Keuringsdienst',
                'location' => 'Driebergen',
                'salary'   => 2600.00,
                'field'    => 'Administratie en secretarieel',
                'level'    => 'MBO 3',
            ],
            [
                'title'    => 'medewerker bedrijfsadministratie',
                'location' => 'Utrecht',
                'salary'   => 2700.00,
                'field'    => 'Facility / Bedrijfsvoering',
                'level'    => 'MBO 3',
            ],
            [
                'title'    => 'senior medewerker bedrijfsadministratie',
                'location' => 'Utrecht',
                'salary'   => 3500.00,
                'field'    => 'Facility / Bedrijfsvoering',
                'level'    => 'MBO 4',
            ],
            [
                'title'    => 'software engineer - DIGIT',
                'location' => 'Driebergen-Rijsenburg',
                'salary'   => 5400.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'offensive security specialist - DIGIT',
                'location' => 'Driebergen-Rijsenburg',
                'salary'   => 5900.00,
                'field'    => 'ICT / Digitale Opsporing',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'junior vastgoed specialist',
                'location' => 'Zeist',
                'salary'   => 3200.00,
                'field'    => 'Facility / ICT / Techniek',
                'level'    => 'MBO 4',
            ],
            [
                'title'    => 'productmanager 112-meldkamer',
                'location' => 'Zeist',
                'salary'   => 5700.00,
                'field'    => 'ICT / Meldkamer',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'recherchemedewerker - Midden-Nederland',
                'location' => 'Utrecht',
                'salary'   => 2900.00,
                'field'    => 'Opsporing',
                'level'    => 'MBO 3',
            ],
            [
                'title'    => 'DevOps & integration engineer',
                'location' => 'Utrecht',
                'salary'   => 5500.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior fullstack developer',
                'location' => 'Utrecht',
                'salary'   => 6000.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior product manager cloud & platformregie',
                'location' => 'Zeist',
                'salary'   => 6300.00,
                'field'    => 'ICT / Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'Woo-jurist',
                'location' => "'s-Hertogenbosch",
                'salary'   => 5000.00,
                'field'    => 'Juridisch / Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'digitaal rechercheur oorlogsmisdrijven',
                'location' => 'Woerden',
                'salary'   => 5200.00,
                'field'    => 'Digitale Opsporing / Opsporing',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'coördinator Leren & Ontwikkelen',
                'location' => 'Driebergen-Rijsenburg',
                'salary'   => 5100.00,
                'field'    => 'Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'personeelscoördinator - Digitaal Politie Contact',
                'location' => 'Utrecht',
                'salary'   => 4900.00,
                'field'    => 'HRM / ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'nationaal coördinator – Nationale Intelligence Voorziening',
                'location' => 'Driebergen',
                'salary'   => 6500.00,
                'field'    => 'Intelligence',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior data scientist / responsible AI policy expert',
                'location' => 'Nieuwegein',
                'salary'   => 6400.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'Innovatiemakelaar - Eenheid Midden-Nederland',
                'location' => 'Utrecht',
                'salary'   => 5300.00,
                'field'    => 'Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'regievoerend contractmanager',
                'location' => 'Zeist',
                'salary'   => 5800.00,
                'field'    => 'Facility / ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'specialist informatiebeveiliging',
                'location' => 'Zeist',
                'salary'   => 5900.00,
                'field'    => 'ICT / Bedrijfsvoering',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'senior domeinarchitect Technologie',
                'location' => 'Odijk',
                'salary'   => 7200.00,
                'field'    => 'ICT',
                'level'    => 'WO',
            ],
            [
                'title'    => 'domeinarchitect Technologie',
                'location' => 'Odijk',
                'salary'   => 6000.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'domeinarchitect ketenpartners',
                'location' => 'Odijk',
                'salary'   => 6000.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'infrastructure engineer meldkamer',
                'location' => 'Zeist',
                'salary'   => 5400.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'politievrijwilliger telecomtechnologieën',
                'location' => 'Almere of Utrecht',
                'salary'   => 0.00,
                'field'    => 'Techniek / Vrijwilligerswerk',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'bedrijfsarts',
                'location' => 'Landelijk',
                'salary'   => 8500.00,
                'field'    => 'HRM',
                'level'    => 'WO',
            ],
            [
                'title'    => 'solution architect Endpoints',
                'location' => 'Odijk',
                'salary'   => 6100.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'developer infrastructure backup-voorziening',
                'location' => 'Driebergen-Rijsenburg',
                'salary'   => 5400.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'infrastructure engineer backup-voorzieningen',
                'location' => 'Driebergen-Rijsenburg',
                'salary'   => 5300.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'delivery manager backup-voorziening',
                'location' => 'Driebergen-Rijsenburg',
                'salary'   => 6000.00,
                'field'    => 'ICT',
                'level'    => 'HBO Bachelor',
            ],
            [
                'title'    => 'functioneel beheerder',
                'location' => 'Rotterdam / Utrecht',
                'salary'   => 3700.00,
                'field'    => 'ICT',
                'level'    => 'MBO 4',
            ],
            [
                'title'    => 'politieopleiding tot agent',
                'location' => 'Eenheid Midden-Nederland',
                'salary'   => 2800.00,
                'field'    => 'Agent',
                'level'    => 'MBO 4',
            ],
        ];

        foreach ($vacatures as $v) {
            $detailId = DB::table('job_details')->insertGetId([
                'description'      => "Wij zoeken een enthousiaste {$v['title']} voor de Nationale Politie. "
                    . "In deze functie werk je binnen het vakgebied {$v['field']} en draag je bij aan een veilige samenleving. "
                    . "Het vereiste opleidingsniveau is {$v['level']}.",

                'requirements'     => "- Afgerond {$v['level']} diploma\n"
                    . "- Minimaal 2 jaar relevante werkervaring binnen {$v['field']}\n"
                    . "- Goede communicatieve vaardigheden in het Nederlands\n"
                    . "- Beschikbaar voor een VOG-screening\n"
                    . "- Woonachtig in of bereid te verhuizen naar de regio {$v['location']}",

                'responsibilities' => "- Uitvoeren van werkzaamheden binnen het team {$v['field']}\n"
                    . "- Samenwerken met collega's in de regio {$v['location']}\n"
                    . "- Rapporteren aan de leidinggevende over voortgang en bevindingen\n"
                    . "- Bijdragen aan de continue verbetering van werkprocessen\n"
                    . "- Deelnemen aan teamoverleggen en werkgroepen",

                'benefits'         => "- Salaris tussen € " . number_format($v['salary'] * 0.9, 2, '.', '') . " en € " . number_format($v['salary'] * 1.1, 2, '.', '') . " bruto per maand (schaal afhankelijk van ervaring)\n"
                    . "- Pensioenopbouw via ABP\n"
                    . "- 8% vakantietoeslag + eindejaarsuitkering\n"
                    . "- Goede secundaire arbeidsvoorwaarden conform CAO Politie\n"
                    . "- Opleidingsmogelijkheden en loopbaanontwikkeling binnen de Nationale Politie",

                'created_at' => $now,
                'updated_at' => $now,
            ]);

            DB::table('jobs')->insert([
                'job_detail_id' => $detailId,
                'title'         => $v['title'],
                'location'      => $v['location'],
                'salary'        => $v['salary'],
                'status'        => 'open',
                'is_active'     => true,
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);
        }
    }
}