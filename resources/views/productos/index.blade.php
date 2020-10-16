@extends('layouts.main')
@section('content')
<div class="row">
    @foreach ($productos as $producto)
    <div class="col-sm-4">
    <div class="card mt-1">
        <img class="card-img-top" src="{{ asset('storage/imagenes/'.$producto->url) }}" alt="Card image cap" width="340" height="300">
                <div class="card-body">
                    <p class="h2">{{$producto->nombre}}</p>
                    <p>Ingredientes: <i>{{$producto->ingredientes}}</i></p>
                <a href="{{ url('ordena/'.$producto->id) }}">ORDENA AQUI »</a>
                </div>
            </div>
    </div>    
    @endforeach
</div>
<div class="d-flex justify-content-center mt-2">
    {!! $productos->links() !!}
</div>
@endsection