<?php

namespace App\Http\Controllers;
use Session;
class CarritoController extends Controller
{
   public function index(){
    return view('carrito.index');
   }
   public function clear(){
    \Cart::clear();
    \Cache::flush();
    Session::flash('danger', "El carrito se vació de forma exitosa");
    return redirect('productos');
   }
   public function destroy(){
    \Cart::remove(['id' => request('id')]);
    Session::flash('danger', 'Se eliminó el producto del carrito de forma exitosa');
    if(count(\Cart::getContent())){
        return view('carrito.index');
    }else{
        return redirect('productos');
    }
   }
}
