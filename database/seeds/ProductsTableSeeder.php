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
        for($i = 0; $i < 30; $i++) {
            $product = new Product();

            $product->name = $faker->unique()->randomElement(['Aeroad', 'Endurace', 'Inflite', 'Speedmax', 'Ultimate', 'Dude', 'Endurace', 'Exceed', 'Grail', 'Grand Canyon', 'Lux', 'Neuron', 'Sender', 'Spectral', 'Stitched', 'Stoic', 'Strive', 'Torque', 'Commuter:ON', 'Endurace:ON', 'Grail:ON', 'Grand Canyon:ON', 'Neuron:ON', 'Pathlite:ON', 'Precede:ON', 'Roadlite:ON', 'Spectral:ON', 'Commuter', 'Pathlite', 'Roadlite', 'Allant+', 'Boone', 'Checkpoint', 'Crockett', 'District', 'Domane', 'Dual Sport', 'Emonda', 'Farley', 'Fuel EX', 'Full Stache', 'FX', 'L Series', 'Loft', 'Loft Go!', 'Madone', 'Marlin', 'Powerfly', 'Powerfly Equipped', 'Precaliber', 'Procaliber', 'Rail', 'Remedy', 'Roscoe']);
            $product->description = $faker->randomElement(['Strada', 'Gravel', 'MTB', 'E-Bike', 'City']);
            $product->brand = $faker->randomElement(['Trek', 'Canyon', 'Bianchi', 'Wilier', 'City']);
            $product->price = $faker->randomFloat(2, 0, 999);
            //$product->image = $faker->imageUrl(640, 480, $faker->numberBetween($min = 10, $max = 200));
            $product->slug = Str::slug($product->name, '-');
            
            $product->save();
        }
    }
}
