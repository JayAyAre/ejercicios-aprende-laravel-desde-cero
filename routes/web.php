<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Ejercicio 2

Route::post('/ejercicio2/a', function (Request $request) {
    $product = ([
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
    ]);
    return Response::json($product);
});

Route::post('/ejercicio2/b', function (Request $request) {
    $product = ([
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
    ]);
    if ($request->get('price')<0) {
        return Response::json(['message' => 'Price can\'t be less than 0'], 422);
    } else {
        return Response::json($product);
    }
});;

Route::post('/ejercicio2/c', function (Request $request) {
    $product = ([
        'name' => $request->get('name'),
        'description' => $request->get('description'),
        'price' => $request->get('price'),
    ]);

    switch ($request->get('discount')) {
        case 'SAVE5':
            $product['discount'] = 5;
            break;
        case 'SAVE10':
            $product['discount'] = 10;
            break;
        case 'SAVE15':
            $product['discount'] = 15;
            break;
        default:
            $product['discount'] = 0;
            break;
    }

    if($product['discount'] == 0) {
        return Response::json($product);
    }else
        $product['price'] = $product['price'] - $product['price'] * $product['discount'] / 100;
        return Response::json($product);
});
