<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Product;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $newReview = new Review();
        $data = $request->all();
        $data['product_id'] = $id;
        
        // validation
        $request->validate($this->ruleValidation());

        $created = $newReview->save($data);

        if($created) {
            $product = Product::where('id', $newReview->product_id)->first();
            return redirect()->route('products.show', $product->slug);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);
        
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $review = Review::find($id);
        $data['product_id'] = $review->product_id;
        $data['rating'] = (int)$data['rating'];
        // dd($data['rating']);
        // validation
        $request->validate($this->ruleValidation());

        $updated = $review->update($data);
        
        if($updated) {
            $product = Product::where('id', $review->product_id)->first();
            return redirect()->route('products.show', $product->slug);
        } else {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $author = $review->author;
        $product_id = $review->product_id;
        $deleted = $review->delete();

        if($deleted) {
            $product = Product::where('id', $product_id)->first();
            return redirect()->route('products.show', $product->slug)->with('author', $author);
        }
        
    }

    private function ruleValidation() {
        return [
            'author' => 'required | max:20',
            'rating' => 'required | numeric',
            'body' => 'required'
        ];
    }
}
