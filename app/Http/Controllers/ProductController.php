<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Spec;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        // dd($products);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //dd($data);

        $request->validate($this->ruleValidation());

        $data['slug'] = Str::slug($data['name'], '-');

        if (!empty($data['image'])) {
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }

        $newProduct = new Product();
        $newProduct->fill($data);
        $saved = $newProduct->save();

        $data['light'] = ($data['light'] == 'true') ? 1 : 0;
        $data['fenders'] = ($data['fenders'] == 'true') ? 1 : 0;
        $data['electrical'] = ($data['electrical'] == 'true') ? 1 : 0;
        $newSpec = new Spec();
        $newSpec->product_id = $newProduct->id;
        $newSpec->fill($data);

        // dd($newSpec);

        $specSave = $newSpec->save();

        if($saved && $specSave) {
            return redirect()->route('products.index');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('products.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('products.edit', compact('product'));

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
        $request->validate($this->ruleValidation());

        $product = Product::find($id);

        $data['slug'] = Str::slug($data['name'], '-');

        if(!empty($data['image'])) {
            if(!empty($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }
        $update = $product->update($data);
        
        $data['product_id'] = $product->id;
        $data['light'] = ($data['light'] == 'true') ? 1 : 0;
        $data['fenders'] = ($data['fenders'] == 'true') ? 1 : 0;
        $data['electrical'] = ($data['electrical'] == 'true') ? 1 : 0;

        //dd($data);

        $editSpec = Spec::where('product_id', $product->id)->first();
        $editedSpec = $editSpec->update($data);


        if($update && $editedSpec) {
            return redirect()->route('products.show', $product->slug);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $title = $product->name;
        $image = $product->image;

        //$product->reviews()->detach();
        $deleted = $product->delete();

        if ($deleted) {
            if(!empty($image)) {
                Storage::disk('public')->delete($image);
            }
            return redirect()->route('products.index')->with('title', $title);
        } else {
            return redirect()->route('home');
        }

    }

    private function ruleValidation() {
        return [
            'name' => 'required | max:40',
            'description' => 'required',
            'image' => 'image',
            'price' => 'required | max:9999 | min:0 | numeric',
            'brand' => 'required | max:20'
        ];
    }
}
