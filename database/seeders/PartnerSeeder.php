<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'Universiti Malaya (UM)', 'url' => 'https://www.um.edu.my'],
            ['name' => 'Chulalongkorn University', 'url' => 'https://www.chula.ac.th'],
            ['name' => 'Universiti Teknologi MARA (UiTM)', 'url' => 'https://www.uitm.edu.my'],
            ['name' => 'National University of Singapore (NUS)', 'url' => 'https://nus.edu.sg'],
            ['name' => 'Kyoto University', 'url' => 'https://www.kyoto-u.ac.jp'],
            ['name' => 'Monash University', 'url' => 'https://www.monash.edu'],
            ['name' => 'Prince of Songkla University', 'url' => 'https://www.psu.ac.th'],
            ['name' => 'University of Groningen', 'url' => 'https://www.rug.nl'],
            ['name' => 'Management and Science University (MSU)', 'url' => 'https://www.msu.edu.my'],
            ['name' => 'Heidelberg University', 'url' => 'https://www.uni-heidelberg.de'],
        ];

        // Konfigurasi Stream agar Mengabaikan SSL (Bypass Security)
        $streamOpts = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
            "http" => [
                "timeout" => 10,
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n"
            ]
        ];
        $context = stream_context_create($streamOpts);

        foreach ($partners as $data) {
            $partner = Partner::updateOrCreate(
                ['name' => $data['name']],
                ['website_url' => $data['url'], 'is_active' => true]
            );

            if ($partner->getMedia('partner_logo')->count() > 0) continue;

            $host = parse_url($data['url'], PHP_URL_HOST);
            $domain = str_replace('www.', '', $host);
            
            // URL Clearbit
            $logoUrl = "https://logo.clearbit.com/" . $domain . "?size=500";
            
            echo "Mencoba download logo: " . $domain . "... ";

            try {
                // 1. Download Manual dengan 'file_get_contents' yang sudah di-bypass SSL-nya
                $imageContent = @file_get_contents($logoUrl, false, $context);

                if ($imageContent) {
                    // 2. Simpan sementara ke folder temp
                    $tempPath = sys_get_temp_dir() . '/' . $domain . '.png';
                    file_put_contents($tempPath, $imageContent);

                    // 3. Masukkan file lokal tersebut ke Media Library
                    $partner->addMedia($tempPath)
                            ->toMediaCollection('partner_logo');
                    
                    echo "✅ Berhasil!\n";
                } else {
                    throw new \Exception("Konten kosong");
                }

            } catch (\Exception $e) {
                echo "⚠️ Gagal (" . $e->getMessage() . "). Pakai Inisial.\n";
                
                // Fallback: Inisial (Juga di-bypass SSL-nya)
                $initialUrl = "https://ui-avatars.com/api/?name=" . urlencode($data['name']) . "&background=random&color=fff&size=500";
                try {
                    $initialContent = @file_get_contents($initialUrl, false, $context);
                    if($initialContent) {
                        $tempPath = sys_get_temp_dir() . '/initial_' . md5($data['name']) . '.png';
                        file_put_contents($tempPath, $initialContent);
                        $partner->addMedia($tempPath)->toMediaCollection('partner_logo');
                    }
                } catch (\Exception $ex) {}
            }
        }
    }
}