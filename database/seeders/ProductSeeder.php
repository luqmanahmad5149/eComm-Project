<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Acer monitor',
                'price' => '400.40',
                'category' => 'electronic',
                'description' => '2021 ips monitor',
                'gallery' => 'https://static-ecapac.acer.com/media/catalog/product/cache/a17a77e026ef2eddd3ecae104c32cc71/v/g/vg0_series-vg220q-vg240y-vg270-vg270s_gallery-01.png',
            ],
            [
                'name' => 'Iphone 12',
                'price' => '4000.90',
                'category' => 'mobile',
                'description' => 'used but new 10/10 condition',
                'gallery' => 'https://cdn.mos.cms.futurecdn.net/Gj4BpxWHmrcvZmjaW9nmwf.jpg',
            ],
            [
                'name' => 'Ikea sofa',
                'price' => '620.00',
                'category' => 'furniture',
                'description' => 'good quality ikea sofa',
                'gallery' => 'https://www.ikea.com/my/en/images/products/ektorp-2-seat-sofa__0818544_pe774475_s5.jpg?f=s',
            ],
            [
                'name' => 'Midea induction cooker',
                'price' => '417.50',
                'category' => 'electronic',
                'description' => 'power saving induction cook with multiple presets',
                'gallery' => 'https://mystorebathandkitchen.com/wp-content/uploads/2019/04/C21RT2120-1-1000x1000.jpg',
            ],
        ]);
    }
}
