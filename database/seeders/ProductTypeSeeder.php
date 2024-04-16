<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            (object) [
                'type_name' => '薯條'
            ],
            (object) [
                'type_name' => '雞塊'
            ],
            (object) [
                'type_name' => '珍珠奶茶'
            ],
            (object) [
                'type_name' => '泡麵'
            ],
            (object) [
                'type_name' => '飯糰'
            ],
            (object) [
                'type_name' => '水果'
            ],
            (object) [
                'type_name' => '薯餅'
            ],
            (object) [
                'type_name' => '汽水'
            ],
        ];
        foreach ($data as $key=>$value) {
            ProductType::create([
                'classification' => $value->type_name,
            ]);
        };
    }
}
