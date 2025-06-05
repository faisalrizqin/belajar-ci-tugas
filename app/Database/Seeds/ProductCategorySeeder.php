<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Laptop',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_kategori' => 'Aksesoris',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_kategori' => 'Komponen PC',
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'nama_kategori' => 'Elektronik',
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ];

        foreach ($data as $item) {
            $this->db->table('product_category')->insert($item);
        }
    }
}
