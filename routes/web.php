<?php

use Illuminate\Support\Facades\Route;
use App\Models\Productos;

Route::get('/', function () {
    return view('home');
});

Route::resource('/productos', "ProductosController");
Route::get('/ordena/{id}', function($id){
    $producto = Productos::FindOrFail($id);
    return view('productos.ordena', compact('producto'));
});
Route::post('add', function(){
    $producto = Productos::find(request('id'));
    $productoCart = array( 
        'id' => $producto->id, 
        'name' => $producto->nombre,
        'price' => $producto->precio,
        'quantity' => request('cantidad'),
        'attributes' => array()
    );
    \Cart::add($productoCart);
    return redirect('productos');
});
// Route::get('cart', "CarritoController@index");
// Route::post('delete', "CarritoController@delete");
Route::get('cart/clear', "CarritoController@clear")->name('cart.clear');
Route::resource('cart', "CarritoController");