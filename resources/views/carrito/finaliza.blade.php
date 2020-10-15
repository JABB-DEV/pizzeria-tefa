@extends('layouts.main')
@section('content')
<p class="h4 mt-4 mb-2 text-center">Terminar el pedido</p>
<div class="row">
    <div class="col-md-4">
            <label for="cp" class="small">Codigo Postal: </label>
    <input type="text" name="cp" id="cp" class="form-control" readonly value="{{$domicilio['cp']}}">
    </div>
    <div class="col-md-4">
        <label for="colonia" class="small">Colonia: </label>
    <input type="text" name="colonia" id="colonia" class="form-control" readonly value="{{$domicilio['colonia']}}">
    </div>
    <div class="col-md-4">
        <label for="calle" class="small">Calle: </label>
        <input type="text" name="calle" id="calle" class="form-control" readonly value="{{$domicilio['calle']}}">
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-8">
            <label for="referencia" class="small">Referencias y/o entre calles:  </label>
            <input type="text" name="referencia" id="referencia" class="form-control" readonly value="{{$domicilio['referencia']}}">
    </div>
    <div class="col-md-2">
        <label for="numero_i" class="small">N&uacute;mero Interior: </label>
        <input type="text" name="numero_i" id="numero_i" class="form-control" readonly value="{{$domicilio['numero_i']}}">
    </div>
    <div class="col-md-2">
        <label for="numero_e" class="small">N&uacute;mero Exterior:</label>
        <input type="text" name="numero_e" id="numero_e" class="form-control" readonly value="{{$domicilio['numero_e']}}">
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-4">
            <label for="telefono" class="small">Tel&eacute;fono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" readonly value="{{$domicilio['telefono']}}">
    </div>
    <div class="col-md-2">
        <label for="ext" class="small">Estensi&oacute;n </label>
        <input type="text" name="ext" id="ext" class="form-control" readonly value="{{$domicilio['ext']}}">
    </div>
</div>
 @if (count(Cart::getContent()))
    <div class="card mt-3" style="border: 1px solid forestgreen;">
        <div class="card-body">
            @foreach (Cart::getContent() as $item)
            <p class="h5">{{$item->name}}</p>
            <small class="text-muted">Ingredientes: {{$item->attributes->ingredientes}}</small>
            <table class="table borderless">
               <thead>
                   <tr>
                        <td class="text-center" width="70%">Descripcion</td>
                        <td class="text-center" >Cantidad</td>
                        <td class="text-center">Precio</td>
                   </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td style="border: 1px solid forestgreen;"><small class="text-muted"> Pizza {{$item->attributes->size}}, {{$item->attributes->masa}} {{$item->name}} {{$item->attributes->ingredientes}} </small></td>
                        <td class="text-center"><small class="text-muted">{{ $item->quantity }}</small></td>
                        <td class="text-center"><small class="text-muted">{{$item->price}}</small></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            @endforeach
        </div>
    </div>
            <div class="d-flex flex-column align-items-end mt-2 p-2">
            <p class="mark">Subtotal: <span class="small text-muted">{{Cart::getSubtotal()}}</span></p>
                <p class="mark">IVA: <span class="small text-muted"> {{Cart::getSubtotal()*.16}}</span></p>
                <p class="mark">Total: <span class="small text-muted">{{Cart::getSubtotal()*1.16}}</span></p>
            </div>
            @else
                <p>Carrito vacio</p>
           @endif

       </div>
       
    </div>
@endsection