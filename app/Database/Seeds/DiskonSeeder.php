<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $tanggalAwal = new \DateTime(); // tanggal hari ini
        $createdAtNow = date('Y-m-d H:i:s'); // waktu saat seeder dijalankan

        $data = [];

        // Nominal seperti contoh sebelumnya
        $nominals = [100000, 200000, 100000, 100000, 300000, 100000, 200000, 200000, 300000, 100000];

        for ($i = 0; $i < 10; $i++) {
            $tanggal = clone $tanggalAwal;
            $tanggal->modify("+$i day");

            $data[] = [
                'tanggal' => $tanggal->format('Y-m-d'),
                'nominal' => $nominals[$i],
                'created_at' => $createdAtNow,
                'updated_at' => null
            ];
        }

        $this->db->table('diskon')->insertBatch($data);
    }
}
