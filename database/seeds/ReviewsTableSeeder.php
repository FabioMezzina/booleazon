<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Product;
use App\Review;

class ReviewsTableSeeder extends Seeder
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
            
            for ($i=0; $i < 4; $i++) { 
                
                $newReview = new Review();

                $newReview->product_id = $product->id;
                $newReview->rating = $faker->randomFloat(0, 1, 5);
                $newReview->author = $faker->text(20);
                $newReview->body = $faker->paragraphs(1, true);

                $newReview->save();
            }
        }
    }
}
