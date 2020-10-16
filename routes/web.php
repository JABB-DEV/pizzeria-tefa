<?php

use App\Models\Adicionales;
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

Route::get('pdf/{id}', 'VentasController@pdf');

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
    session()->flash('success', 'El producto se agrego al carrito de forma exitosa');
});

Route::get('cart/clear', "CarritoController@clear")->name('cart.clear');

Route::resource('cart', "CarritoController");
Route::resource('adicionales', 'AdicionalesController');

Route::get('add/producto', "ProductosController@agregar");

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
    session()->flash('success', "Se agregaró la guardó la direccion de forma exitosa");
    return view("carrito.finaliza", compact('domicilio'));
})->name('comprar.guardar');

Route::post('carrito/{id}', function($id){
    Cart::update($id, array(
        'quantity' => array(
            'relative' => false,
            'value' => request('cantidad')
        )
      ));
      session()->flash('success', 'El producto se actualizó al carrito de forma exitosa');
});


Route::post('adi', function(){
    $loop = 0;
    foreach(request('id') as $id){
        if(request('counter')[$loop] != 0){
            $adicional = Productos::FindOrFail($id);
            $adicionalCart = array( 
                'id' => md5(rand(1, 1000)), 
                'name' => $adicional->nombre,
                'price' => $adicional->precio,
                'quantity' => request('counter')[$loop],
                'attributes' => array(
                    "id_producto" => $adicional->id,
                    "adicional" => 1
                )
            );
            \Cart::add($adicionalCart);
        }else{
            session()->flash('danger', 'No se agregó ningun adicional');
            return redirect('adicionales');
        }
        $loop++;
    }
        ($loop == 1) ? session()->flash('success', "Se agregaró un producto adicional al carrito") : session()->flash('success', "Se agregaron ".$loop." productos adicionales al carrito");
        return redirect('adicionales');
});

Route::resource('ventas', "VentasController");