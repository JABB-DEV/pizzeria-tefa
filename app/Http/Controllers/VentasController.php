<?php

namespace App\Http\Controllers;

use App\Models\DetalleVentas;
use App\Models\Domicilios;
use App\Models\Ventas;
use Barryvdh\DomPDF\Facade as PDF;

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
           return redirect()->route('ventas.pdf', $venta->id);
        }
    }
    public function pdf($id){
        $venta = Ventas::findOrFail($id);
        $domicilio = Domicilios::findOrFail($venta->id_domicilio);
        $productos = DetalleVentas::select('detalle_ventas.cantidad as cantidad_venta', 'productos.*')
        ->join('productos', 'detalle_ventas.id_producto', '=', 'productos.id')
        ->where('id_venta', '=', $id)
        ->get();
        $pdf =  PDF::loadView('ventas.pdf',  compact(['domicilio', 'productos', 'venta']));
        return $pdf->stream();
    }
}
