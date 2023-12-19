<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          "name" => ["required","string","max:64"],
          "description" => ["required","string","max:512"],
          "price" => ["required","numeric","min:0.01"],
          "has_battery" => ["required","boolean"],
          "battery_duration" => ["required_if:has_battery,true","numeric","min:0.01"],
          "colors" => ["required","array"],
          "colors.*" => ["required","string"],
          "dimensions" => ["required","array"],
          "dimensions.width" => ["required","numeric","min:0.01"],
          "dimensions.height" => ["required","numeric","min:0.01"],
          "dimensions.length" => ["required","numeric","min:0.01"],
          "accessories" => ["required","array"],
          "accessories.*.name" => ["required","string"],
          "accessories.*.price" => ["required","numeric","min:0.01"]
        ]);
        return \response('ok', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
