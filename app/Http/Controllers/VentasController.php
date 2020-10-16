<?php

namespace App\Http\Controllers;

use App\Models\DetalleVentas;
use App\Models\Domicilios;
use App\Models\Ventas;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function store(){
        // return request('domicilio');
        $domicilio = Domicilios::create(request('domicilio'));
        if(isset($domicilio)){
           $venta = Ventas::create([
               'id_domicilio' => $domicilio->id,
               'articulos' => \Cart::getContent()->count(),
               'subtotal' => request('subtotal'),
               'iva' => request('iva'),
               'total' => request('total')
           ]);
           if(isset($venta)){
               $i = 0;
               foreach(request('id_producto') as $id){
                   DetalleVentas::create([
                       "id_venta" => $venta->id,
                       "id_producto" => $id,
                       "cantidad" => request('cantidad')[$i]
                   ]);
                   $i++;
               }
           }
           \Cart::clear();
            \Cache::flush();
           return redirect()->route('ventas.pdf')->with($venta->id);
        }
    }
    public function pdf($id){
        return $id;
    }
}
