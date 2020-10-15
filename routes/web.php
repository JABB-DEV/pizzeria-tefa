<?php

use Illuminate\Support\Facades\Route;
use App\Models\Productos;

Route::get('/', function () {
    return redirect()->route('productos.index');
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
});

Route::get('cart/clear', "CarritoController@clear")->name('cart.clear');

Route::resource('cart', "CarritoController");

Route::get('/comprar', function(){
    if(Cache::has('domicilio')){
        $domicilio = \Cache::get('domicilio');
        return view("carrito.finaliza", compact('domicilio'));
     }else{
         return view('carrito.terminar');
     }
})->name('seguir.comprando');

Route::post('/comprar', function(){
    $form = request()->except('_token');
    \Cache::put('domicilio', $form, 600);
    $domicilio = \Cache::get('domicilio');
    return view("carrito.finaliza", compact('domicilio'));
})->name('comprar.guardar');

Route::post('carrito/{id}', function($id){
    Cart::update($id, array(
        'quantity' => array(
            'relative' => false,
            'value' => request('cantidad')
        )
      ));
});

Route::resource('adicionales', 'AdicionalesController');