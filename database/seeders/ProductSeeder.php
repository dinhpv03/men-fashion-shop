<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Database\Factories\TagFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Product::query()->truncate();
        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        ProductColor::query()->truncate();
        ProductSize::query()->truncate();
        DB::table('product_tag')->truncate();
        Tag::query()->truncate();

        Tag::factory(15)->create();

        foreach ([ 'S', 'M', 'L', 'XL', 'XXL'] as $item) {
            ProductSize::query()->create([
                'name' => $item
            ]);
        }

        foreach ([ '#FFFFFF', '#000000', '#0000FF', '#000080'] as $item) {
            ProductColor::query()->create([
                'name' => $item
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            $name = fake()->text('100');
            Product::query()->create([
                'name' => $name,
                'catalogue_id' => rand(1,5),
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(8) . $i,
                'img_thumbnail' => 'https://canifa.com/img/1000/1500/resize/6/t/6to23w001-se215-2.webp',
                'price_regular' => 399000,
                'price_sale' => 299000

            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/500/750/resize/6/t/6ts23s004-sb138-1-thumb.webp'
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://canifa.com/img/500/750/resize/6/t/6ts23s004-sb138-1-thumb.webp'
                ],

            ]);
        }

        for ($i = 1; $i < 1000; $i++) {
            DB::table('product_tag')->insert([
               [
                   'product_id' => $i,
                   'tag_id' => rand(1, 8)
               ],
                [
                    'product_id' => $i,
                    'tag_id' => rand(9, 15)
                ]
            ]);
        }

        for ($productId = 1; $productId < 1000; $productId++) {
            $data = [];
            for ($sizeId = 1; $sizeId < 6; $sizeId++) {
                for ($colorId = 1; $colorId < 5; $colorId++) {
                    $data[] = [
                        'product_id' => $productId,
                        'product_size_id' => $sizeId,
                        'product_color_id' => $colorId,
                        'quantity' => 100,
                        'image' => 'https://canifa.com/img/500/750/resize/6/t/6ts23s004-sb138-1-thumb.webp'
                    ];
                }
            }

            ProductVariant::query()->insert($data);
        }
    }
}
