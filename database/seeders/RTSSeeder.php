<?php

namespace Database\Seeders;

use App\Models\Rt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RTSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 01',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61208220908202, -1.5855140808099435],
                        [103.61299671033242, -1.5851801692935084],
                        [103.61274481178322, -1.5848353098016048],
                        [103.61247648507049, -1.5849502629719439],
                        [103.61206030485954, -1.5843645491321752],
                        [103.61172626547943, -1.583696725674912],
                        [103.61127866518666, -1.5844904502522041],
                        [103.61208247382683, -1.5855140076364052]
                    ]
                ]
            ]),
            'color' => '#ff0000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 02',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61207133707688, -1.5855364821837412],
                        [103.61239025124524, -1.5860012630882494],
                        [103.6129982745195, -1.5859327377041552],
                        [103.61251543250773, -1.5853606996347764],
                        [103.61207154988517, -1.5855358284682808]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 03',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61251902814575, -1.5853512141198962],
                        [103.61300761824987, -1.5859399141793347],
                        [103.61369687928863, -1.5858178134403431],
                        [103.61299016860255, -1.5851942274088913],
                        [103.61251902814575, -1.5853468533779136]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 04',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61303521030874, -1.5851855059242865],
                        [103.61388151816766, -1.584583723419513],
                        [103.61458822885555, -1.5852073096348818],
                        [103.61362849829288, -1.5856695482465568],
                        [103.61303521030874, -1.5851855059242865]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 05',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61458466216112, -1.5852048299970534],
                        [103.6136248313461, -1.5856704519278964],
                        [103.61375186777786, -1.5859220758568142],
                        [103.61498459166904, -1.5855881450286518],
                        [103.61458475444948, -1.5852040327631016]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 06',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61467782696576, -1.5840462373754605],
                        [103.61449683557242, -1.5842214160338983],
                        [103.61364933618847, -1.5845631579633732],
                        [103.61337066689964, -1.584275979874377],
                        [103.61352580237917, -1.5842099289087628],
                        [103.61324713309034, -1.5839658274950494],
                        [103.61351143798282, -1.5836757775418846],
                        [103.61430147978155, -1.5837332131792294],
                        [103.61467753309739, -1.5840464147649982]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 07',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61389742404123, -1.5845414038411434],
                        [103.61498389850084, -1.5855847959792584],
                        [103.6154766922732, -1.5853249176892774],
                        [103.61443678100494, -1.5842815254201525],
                        [103.61388966350898, -1.5845336462772792]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 08',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61508148251681, -1.5848968086554862],
                        [103.61542294591754, -1.584466263864499],
                        [103.6158032119792, -1.584439112388722],
                        [103.61524445368582, -1.583868931304309],
                        [103.61453824528616, -1.584225779347932],
                        [103.61449944262694, -1.5842839610882464],
                        [103.61508219454942, -1.5848975204171154]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 09',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61580886477952, -1.5844363873510758],
                        [103.61541403536643, -1.5844682162584434],
                        [103.61507333579232, -1.5849042722406494],
                        [103.61550319039469, -1.585403985917452],
                        [103.61671633560849, -1.5850443193983637],
                        [103.61580886477986, -1.5844363873510758]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 10',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.6120543200974, -1.582276381866734],
                        [103.61199034175797, -1.5832688500546084],
                        [103.61328590314247, -1.583660567745838],
                        [103.61429356199778, -1.5837325158855435],
                        [103.61467743203877, -1.5840442911271566],
                        [103.61568509089574, -1.583620596556301],
                        [103.6149653345692, -1.5827332359489645],
                        [103.61205422234377, -1.5822761416161057]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 11',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [
                        [103.61672036376251, -1.5850558473005805],
                        [103.61797196734352, -1.584144431776636],
                        [103.61742490882352, -1.5834235846683526],
                        [103.61698560425674, -1.5832578726543574],
                        [103.61690271660257, -1.5830838750250251],
                        [103.61700218178657, -1.5825950244650073],
                        [103.61452384092183, -1.5810704728261982],
                        [103.613230793517, -1.580424195162422],
                        [103.61232731808445, -1.581393611582314],
                        [103.6120689048347, -1.5822777401655799],
                        [103.61496686656022, -1.5827329604609588],
                        [103.615712056718, -1.5836330548413997],
                        [103.6153291117754, -1.5838089353064788],
                        [103.61526989379536, -1.5838770956577548],
                        [103.61672011757202, -1.5850606474440951]
                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 12',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [

                        [103.61364703268742, -1.5845600036248726],
                        [103.61336173175539, -1.5842674361186937],
                        [103.61353389611116, -1.584210889453317],
                        [103.61324121670594, -1.5839625758163152],
                        [103.61351422018396, -1.5836773838795892],
                        [103.61329532550269, -1.5836700082257522],
                        [103.61199702882516, -1.5832697564651568],
                        [103.61172703161418, -1.5836695137155772],
                        [103.6121556343287, -1.5844994268597787],
                        [103.61248359269956, -1.5849578263949837],
                        [103.61364651474832, -1.584565340524307],
                        [103.61338786589397, -1.5842838762744833]


                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Rt::create([
            'kecamatan_id' => 5, // ID Kecamatan
            'kelurahan_id' => 42, // ID Kelurahan
            'nomor' => 'RT 13',
            'koordinat' => json_encode([
                "type" => "Polygon",
                "coordinates" => [
                    [

                        [103.61676497933001, -1.5831708310084736],
                        [103.61710938708336, -1.5828754781776553],
                        [103.61768039336278, -1.5820080645289494],
                        [103.61893994614456, -1.5798496530949109],
                        [103.61912667229757, -1.5794729489831383],
                        [103.61947975533462, -1.5784921600365038],
                        [103.62110936540114, -1.579150544066735],
                        [103.62078344338863, -1.5797851717734375],
                        [103.62033190866475, -1.5804910646328523],
                        [103.62012141736489, -1.5810204863500275],
                        [103.61947975840127, -1.5818994618502984],
                        [103.61912328213617, -1.582306708000246],
                        [103.61888902568819, -1.582744498661441],
                        [103.61877019995427, -1.5831924704048959],
                        [103.61800632023528, -1.584146106901187],
                        [103.61676524091877, -1.5831706147107667],
                        [103.61677161112686, -1.5831699444189553],
                        [103.61676658201435, -1.583170447137789]


                    ]
                ]
            ]),
            'color' => '#ff0000',

            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
