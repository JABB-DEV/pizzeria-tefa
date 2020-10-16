@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-around mt-2 p-2">
        <span class="h4">Revisa y modifica tus productos</span>
        <a href="{{route('adicionales.index')}}" class="btn btn-primary">Agregar adicionales</a>
    </div>
    @if (count(Cart::getContent()))
    <div class="card" style="border: 1px solid forestgreen;">
        @csrf
        <div class="card-body">
            @foreach (Cart::getContent() as $item)
            <p class="h5">{{$item->name}}</p>
            @if(!$item->attributes->has('adicional')) <small class="text-muted">Ingredientes: {{ ($item->attributes->ingredientes) ? $item->attributes->ingredientes : "Sin ingredientes"}}</small>@endif
            <table class="table borderless">
               <thead>
                   <tr>
                        <td class="text-center" width="70%">Descripcion</td>
                        <td class="text-center" >Cantidad</td>
                        <td class="text-center">Precio</td>
                        <td>&nbsp;</td>
                   </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td style="border: 1px solid forestgreen;">
                            <small class='text-muted'>
                                    {{  (!$item->attributes->has('adicional')) ? "Pizza ".$item->attributes->size.", ".$item->attributes->masa." ".$item->name." ".$item->attributes->ingredientes : "".$item->name }}
                            </small>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center mt-2">
                                <p class="contador"><i class="fas fa-plus" onclick="plus('counter_{{$loop->iteration}}')" style="cursor: pointer;"></i> 
                                <span id="counter_{{$loop->iteration}}" class="">{{ $item->quantity }}</span>
                                    <i class="fas fa-minus" onclick="minus('counter_{{$loop->iteration}}')" style="cursor: pointer;"></i></p>
                            </div>
                        </td>
                        <td class="text-center"><small class="text-muted">{{$item->price}}</small></td>
                        <td><form action="{{url('cart/'.$item->id.'')}}" method="POST" class="form-inline">
                            @csrf
                            @method('DELETE')
                            <small class="text-muted">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" class="btn" title="Eliminar producto del carrito"><i class="fa fa-minus"></i></button>
                            <a href="javascript:mandar('{{url('/carrito/'.$item->id)}}', 'counter_{{$loop->iteration}}')" class="btn" title="Editar producto del carrito"><i class="fa fa-edit"></i></a>
                            </small>
                        </form>
                    </td>
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
            <div class="d-flex justify-content-around mt-2 p-2">
                <a href="{{route('cart.clear')}}" class="btn btn-danger">Vaciar carrito</a>
                <a href="{{url('productos')}}" class="btn btn-primary">Seguir comprando</a>
                @if (count(Cart::getContent()))
                    <a href="{{route('seguir.comprando')}}" class="btn btn-secondary">Terminar de comprar</a>
                @endif
            </div>
            @else
                <p>Carrito vacio</p>
           @endif

       </div>
       
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
    const plus = span => {
        let counter = document.getElementById(span)
        let con = parseInt(counter.innerHTML)
        if( con >= 1){
            con++
            counter.innerHTML = con
        }
    }
    const minus = span => {
        let counter = document.getElementById(span)
        let con = parseInt(counter.innerHTML)
        if( con > 1){
            con--
            counter.innerHTML = con
        }
    }
    const mandar = (url, counter) =>{
        let data = `_token=${document.querySelector("input[name='_token']").value}&cantidad=${document.getElementById(counter).innerHTML}`
        fetch(url, {
            method: 'POST',
            headers: {
               'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: data,
        })
        .then( response => {
            location.reload()
        })
    }
    </script>
@endsection