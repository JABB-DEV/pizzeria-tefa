<?php

namespace App\Http\Controllers;

class CarritoController extends Controller
{
   public function index(){
    return view('carrito.index');
   }
   public function clear(){
    \Cart::clear();
    return redirect('productos');
   }
   public function destroy(){
    \Cart::remove(['id' => request('id')]);
    if(count(\Cart::getContent())){
        return view('carrito.index');
    }else{
        return redirect('productos');
    }
   }
}
