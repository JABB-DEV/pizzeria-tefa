@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-around mt-2 p-2">
        <span class="h4">Revisa y modifica tus productos</span>
        <a href="http://" class="btn btn-primary">Agregar adicionales</a>
    </div>
    @if (count(Cart::getContent()))
    <div class="card" style="border: 1px solid forestgreen;">
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
                        <td>&nbsp;</td>
                   </tr>
                </thead> 
                <tbody>
                    <tr>
                        <td style="border: 1px solid forestgreen;"><small class="text-muted"> Pizza {{$item->attributes->size}}, {{$item->attributes->masa}} {{$item->name}} {{$item->attributes->ingredientes}} </small></td>
                        <td class="text-center"><small class="text-muted">{{ $item->quantity }}</small></td>
                        <td class="text-center"><small class="text-muted">{{$item->price}}</small></td>
                        <td><form action="{{url('cart/'.$item->id.'')}}" method="POST" class="form-inline">
                            @csrf
                            @method('DELETE')
                            <small class="text-muted">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" class="btn" title="Eliminar producto del carrito"><i class="fa fa-minus"></i></button>
                            <a href="" class="btn"><i class="fa fa-edit"></i></a>
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
<script>
    $('[name=tags]').tagify();
</script>
@endsection