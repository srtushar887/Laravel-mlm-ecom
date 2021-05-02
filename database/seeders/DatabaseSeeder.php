<?php

namespace Database\Seeders;

use App\Models\blog;
use App\Models\brand;
use App\Models\category;
use App\Models\color;
use App\Models\product;
use App\Models\size;
use App\Models\sub_category;
use App\Models\sub_sub_category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $faker = Faker::create();
        foreach (range(1,300) as $index) {
//            category::create([
//                'cat_slug' => Str::slug('category'.$index,'-'),
//                'category_name' => 'Category'.$index
//            ]);


//             sub_category::create([
//                'category_id' => rand(49,58),
//                'cat_slug' => Str::slug('sub-category'.$index,'-'),
//                'category_name' => 'Sub-category'.$index
//            ]);

//            sub_sub_category::create([
//                'category_id' => rand(49,58),
//                'sub_category_id' => rand(41,60),
//                'cat_slug' => Str::slug('sub-sub-category'.$index,'-'),
//                'category_name' => 'Sub-sub-category'.$index
//            ]);


//            brand::create([
//                'brand_name' => 'Brand Name'.' '.$index
//            ]);
////
////
//            size::create([
//                'size_name' => 'Size Name'.' '.$index
//            ]);
//
//
//            color::create([
//                'color_name' => 'Color Name'.' '.$index
//            ]);


            product::create([
                'product_name' => "Product Name".' '.$index,
                'product_slug' => Str::slug('Product Name'.$index,'-'),
                'product_purchase_price' => rand(111,999),
                'product_sell_price' => rand(111,999),
                'product_old_price' => rand(111,999),
                'product_category_id' => rand(49,58),
                'product_sub_category_id' => rand(41,60),
                'product_sub_sub_category_id' => rand(71,95),
                'product_main_image' => "https://elcopcbonline.com/photos/product/4/176/4.jpg",
                'product_long_description' => $faker->paragraph,
                'product_sort_description' => $faker->paragraph,
                'product_qty' => rand(1,10),
                'product_status' => 1,
            ]);


//            User::create([
//                'name' => $faker->name,
//                'email' => $faker->email,
//                'phone_number' => $faker->phoneNumber,
//                'password' => Hash::make('12345678'),
//                'is_account_veify' => rand(0,2),
//                'account_type' => rand(0,2),
//            ]);


//            blog::create([
//                'title' => $faker->paragraph,
//                'desc' => $faker->paragraph,
//                'blog_image' => "https://www.ultrait.me//images/content/72075ea8-6.jpg",
//            ]);

        }

        }
}
