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
            $newSpec->category = $faker->randomElement(['Strada', 'Gravel', 'MTB', 'E-Bike', 'City']);
            $newSpec->genre = $faker->randomElement(['male', 'female']);
            $newSpec->handlebar = $faker->randomElement(['FSA', 'Deda', 'private']);
            $newSpec->saddle = $faker->randomElement(['Selle Italia', 'fizik', 'San Marco']);
            $newSpec->wheels = $faker->randomElement(['Mavic', 'Vison', 'Fullcrum']);
            $newSpec->tires = $faker->randomElement(['Pirelli', 'Michelin', 'Continental']);
            $newSpec->fenders = $faker->boolean();
            $newSpec->light = $faker->boolean();
            $newSpec->electrical = $faker->boolean();
            $newSpec->brakes = $faker->randomElement(['Shimano', 'Sram', 'Campagnolo']);
            $newSpec->gear = $faker->randomElement(['Shimano', 'Sram', 'Campagnolo']);

            $newSpec->save();

        }
    }
}
