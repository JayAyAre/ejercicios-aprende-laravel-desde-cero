<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use http\Client\Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorize('viewAny', Product::class);
    $products = auth()->user()->products()->get();
    return response()->json(['products' => $products]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('create', Product::class);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreProductRequest $request)
  {
    $this->authorize('create', Product::class);
    $product = auth()->user()->products()->create($request->validated());

   /* $product = [
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'created_at' => $request->created_at,
        'updated_at' => $request->updated_at
    ];*/
    $message = 'Product created successfully';

    return response()->json([
        'message' => $message,
        'product' => $product
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    $this->authorize('view', $product);
    return response()->json([
        'product' => $product
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\Response
   */
  public function update(StoreProductRequest $request, Product $product)
  {
    $this->authorize('update', $product);
    $productUpdated = $product;
    $product->update($request->validated());
    $message = 'Product updated successfully';

    return response()->json([
        'message' => $message,
        'product' => $productUpdated
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Product $product
   * @return \Illuminate\Http\Response
   */
  public function destroy(Product $product)
  {
    $this->authorize('delete', $product);
    $productDeleted = $product;
    $product->delete();
    $message = 'Product deleted successfully';

    return response()->json([
        'message' => $message,
        'product' => $productDeleted
    ]);
  }
}
