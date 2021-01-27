<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++) {
            $product = new Product();

            $product->name = $faker->text(40);
            $product->description = $faker->paragraphs(2, true);
            $product->brand = $faker->text(20);
            $product->slug = Str::slug($product->name, '-');
            $product->price = $faker->randomFloat(2, 0, 999);;
            $product->image = $faker->imageUrl(640, 480, $faker->numberBetween($min = 10, $max = 200));
            
            $product->save();
        }
    }
}
