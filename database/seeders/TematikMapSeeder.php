<?php

namespace Database\Seeders;

use App\Models\TematikMap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TematikMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tematikMaps = [
            [
                'tema_tematik' => 'Kawasan Banjir',
                'koordinat' => json_encode([
                    'type' => 'Polygon',
                    'coordinates'
                    => [[
                        [
                            103.56850088132387,
                            -1.5738577007108034
                        ],
                        [
                            103.57041272410925,
                            -1.5764798407462024
                        ],
                        [
                            103.57450654521483,
                            -1.581269267766018
                        ],
                        [
                            103.57808579964166,
                            -1.5846597485256098
                        ],
                        [
                            103.5859479277699,
                            -1.5883219194997622
                        ],
                        [
                            103.58856554081711,
                            -1.5893749851125705
                        ],
                        [
                            103.59591777560286,
                            -1.587601093137863
                        ],
                        [
                            103.60004296576494,
                            -1.5863251719028852
                        ],
                        [
                            103.60216058386533,
                            -1.586214185190542
                        ],
                        [
                            103.60723126578159,
                            -1.586158689611736
                        ],
                        [
                            103.61403141572913,
                            -1.5857701790541654
                        ],
                        [
                            103.61721674055298,
                            -1.5844375912144386
                        ],
                        [
                            103.6185636077455,
                            -1.583159725775431
                        ],
                        [
                            103.6208420638527,
                            -1.579201314916176
                        ],
                        [
                            103.62320297157555,
                            -1.5738048345289428
                        ],
                        [
                            103.62506132417155,
                            -1.569790134076655
                        ],
                        [
                            103.62691578074964,
                            -1.5674446481984035
                        ],
                        [
                            103.63000652596344,
                            -1.5644251416347714
                        ],
                        [
                            103.63197843383915,
                            -1.56201759060977
                        ],
                        [
                            103.63704809451298,
                            -1.5574748832319756
                        ],
                        [
                            103.64165907564853,
                            -1.5552845296576976
                        ],
                        [
                            103.64395500484375,
                            -1.5548922754623504
                        ],
                        [
                            103.65067426027372,
                            -1.554836233133429
                        ],
                        [
                            103.65162815465857,
                            -1.5541636078472578
                        ],
                        [
                            103.64922776704685,
                            -1.5509656767390538
                        ],
                        [
                            103.64463258488308,
                            -1.5505726107318907
                        ],
                        [
                            103.63807464948655,
                            -1.550404131243468
                        ],
                        [
                            103.63146250086498,
                            -1.5515270714089837
                        ],
                        [
                            103.62865977827732,
                            -1.5511902527026535
                        ],
                        [
                            103.62867434524321,
                            -1.551187795518132
                        ],
                        [
                            103.63099880384158,
                            -1.5542043407036203
                        ],
                        [
                            103.63167094520583,
                            -1.55747378517745
                        ],
                        [
                            103.62907852339993,
                            -1.5610538378488457
                        ],
                        [
                            103.62671931163828,
                            -1.5634966067990348
                        ],
                        [
                            103.61854416700453,
                            -1.568699387849037
                        ],
                        [
                            103.61730849498474,
                            -1.5716595521763281
                        ],
                        [
                            103.6192478489657,
                            -1.5758858904303423
                        ],
                        [
                            103.61683029502262,
                            -1.5808711968774105
                        ],
                        [
                            103.61229657537916,
                            -1.5835842698590454
                        ],
                        [
                            103.60383192776868,
                            -1.5837649865189718
                        ],
                        [
                            103.6010258238594,
                            -1.5839005113211329
                        ],
                        [
                            103.5952778322577,
                            -1.5839908551450748
                        ],
                        [
                            103.58659254901698,
                            -1.5847585816338494
                        ],
                        [
                            103.59020924980251,
                            -1.5819657110503869
                        ],
                        [
                            103.59179489183055,
                            -1.5795746331348681
                        ],
                        [
                            103.59319868254988,
                            -1.5789424615660295
                        ],
                        [
                            103.59193461327231,
                            -1.5765470941586983
                        ],
                        [
                            103.59370190789832,
                            -1.576004274837814
                        ],
                        [
                            103.59302563399439,
                            -1.5740577391236314
                        ],
                        [
                            103.59035321850911,
                            -1.5721089595459006
                        ],
                        [
                            103.59289551888276,
                            -1.5703849114799056
                        ],
                        [
                            103.59565732032627,
                            -1.5728343492050811
                        ],
                        [
                            103.59782835590175,
                            -1.5745559035517118
                        ],
                        [
                            103.60068011160462,
                            -1.5753707651387145
                        ],
                        [
                            103.60135135120902,
                            -1.577406201513483
                        ],
                        [
                            103.60138177496736,
                            -1.5810187081223717
                        ],
                        [
                            103.59771256478325,
                            -1.5828671245179464
                        ],
                        [
                            103.60051614741036,
                            -1.5826418163200913
                        ],
                        [
                            103.60382680264786,
                            -1.5804773248169681
                        ],
                        [
                            103.60438747521818,
                            -1.5769088768305153
                        ],
                        [
                            103.60290090374457,
                            -1.5751897187360981
                        ],
                        [
                            103.60059896786026,
                            -1.572925001040133
                        ],
                        [
                            103.59571289195816,
                            -1.5686136656087228
                        ],
                        [
                            103.59290080563949,
                            -1.5670679893387245
                        ],
                        [
                            103.58826753978815,
                            -1.5704303036778526
                        ],
                        [
                            103.58500084896127,
                            -1.5705210844222819
                        ],
                        [
                            103.5824161645557,
                            -1.571473988314949
                        ],
                        [
                            103.57606548026382,
                            -1.5712925241809046
                        ],
                        [
                            103.5750648938074,
                            -1.5705664729679398
                        ],
                        [
                            103.56850074229965,
                            -1.5738578392926428
                        ]
                    ]]
                ]),
                'color' => '#FF5733', // Warna untuk Kawasan Kumuh
            ],
            [
                'tema_tematik' => 'Kawasan Hijau',
                'koordinat' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [
                        [[105.0, 2.0], [106.0, 3.0], [107.0, 2.0], [105.0, 2.0]]
                    ]
                ]),
                'color' => '#33FF57', // Warna untuk Kawasan Hijau
            ],
            [
                'tema_tematik' => 'Kawasan Industri',
                'koordinat' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [
                        [[108.0, 4.0], [109.0, 5.0], [110.0, 4.0], [108.0, 4.0]]
                    ]
                ]),
                'color' => '#3375FF', // Warna untuk Kawasan Industri
            ],
            [
                'tema_tematik' => 'Kawasan Pertanian',
                'koordinat' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [
                        [[111.0, 6.0], [112.0, 7.0], [113.0, 6.0], [111.0, 6.0]]
                    ]
                ]),
                'color' => '#FF33C4', // Warna untuk Kawasan Pertanian
            ],
            [
                'tema_tematik' => 'Kawasan Pariwisata',
                'koordinat' => json_encode([
                    'type' => 'Polygon',
                    'coordinates' => [
                        [[114.0, 8.0], [115.0, 9.0], [116.0, 8.0], [114.0, 8.0]]
                    ]
                ]),
                'color' => '#FFC133', // Warna untuk Kawasan Pariwisata
            ],
        ];

        foreach ($tematikMaps as $tematikMap) {
            TematikMap::create($tematikMap);
        }
    }
}
