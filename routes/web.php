<?php

use Illuminate\Support\Facades\Route;
use App\Models\Productos;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestValueResolver;

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
        'id' => md5(rand(1, 1000)), 
        'name' => $producto->nombre,
        'price' => $producto->precio,
        'quantity' => request('cantidad'),
        'attributes' => array(
            "id_producto" => $producto->id,
            "ingredientes" => $producto->ingredientes,
            "masa" => request('masa'),
            "size" => request('size')
        )
    );
    \Cart::add($productoCart);
    return redirect('productos');
});
// Route::get('cart', "CarritoController@index");
// Route::post('delete', "CarritoController@delete");
Route::get('cart/clear', "CarritoController@clear")->name('cart.clear');
Route::resource('cart', "CarritoController");
Route::get('/comprar', function(){
    return view('carrito.terminar');
})->name('seguir.comprando');
Route::post('/comprar', function(){
    return request();
})->name('comprar.guardar');