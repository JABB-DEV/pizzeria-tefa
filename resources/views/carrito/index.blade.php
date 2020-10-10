@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-around mt-2 p-2">
        <span class="h4">Revisa y modifica tus productos</span>
        <a href="http://" class="btn btn-primary">Agregar adicionales</a>
    </div>
    <div class="row">
       <div class="col-sm-12">
           @if (count(Cart::getContent()))
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                    @foreach (Cart::getContent() as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <form action="{{url('cart/'.$item->id.'')}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit" class="btn btn-link btn-sm text-danger">Eliminar del carrito</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-around mt-2 p-2">
                <a href="{{route('cart.clear')}}" class="btn btn-danger">Vaciar carrito</a>
            <a href="{{url('productos')}}" class="btn btn-primary">Seguir comprando</a>
            </div>
            @else
                <p>Carrito vacio</p>
           @endif

       </div>
       
    </div>
</div>
@endsection