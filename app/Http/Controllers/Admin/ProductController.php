<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Store\StoreProductRequest;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

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
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name');
        $discounts = Discount::where('is_active', 1)->get();
        return view('admin.product.create', compact('categories', 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
      
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'sku' => $request->sku,
            'category_id' => $request->category_id ,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_id' => $request->discount_id,
        ]);

        $fileAdders = $product->addMultipleMediaFromRequest(['product_images'])
            ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('product_images');
            });

        // if($request->file('product_images')) {
        //     foreach ($request->file('product_images') as $product_image) {
        //         $product->addMediaFromRequest('product_images')
        //             ->usingName($product_image->getClientOriginalName())
        //             ->toMediaCollection('product_images');
        //     }
        // }
       
        toast('Product Created Successfully','success');

        return redirect()->route('admin.products.index');          
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
    public function edit(Product $product)
    {
        $categories = Category::all()->sortBy('name');
        $discounts = Discount::where('is_active', 1)->get();
        return view('admin.product.edit', compact('product', 'categories', 'discounts'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}
