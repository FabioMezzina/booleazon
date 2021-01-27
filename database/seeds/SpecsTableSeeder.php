<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;
use App\Spec;

class SpecsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $products = Product::all();

        foreach ($products as $product) {
            
            $newSpec = new Spec();

            $newSpec->product_id = $product->id;
            $newSpec->category = $faker->text(50);
            $newSpec->genre = $faker->text(10);
            $newSpec->handlebar = $faker->text(15);
            $newSpec->saddle = $faker->text(15);
            $newSpec->wheels = $faker->text(15);
            $newSpec->tires = $faker->text(15);
            $newSpec->fenders = $faker->text(15);
            $newSpec->light = $faker->text(15);
            $newSpec->electrical = $faker->boolean();
            $newSpec->brakes = $faker->text(15);
            $newSpec->gear = $faker->text(15);

            $newSpec->save();

        }
    }
}
