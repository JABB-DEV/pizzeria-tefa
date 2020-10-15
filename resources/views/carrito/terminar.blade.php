@extends('layouts.main')
@section('content')
    <p class="h5 text-center text-danger mt-2">¿A d&oacutende llevamos tu pizza?</p>
    <p class="h3 text-center mt-2">Completa tu informaci&oacute;n de envio</p>
<form action="{{route('comprar.guardar')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
                <label for="cp">Codigo Postal: </label>
                <input type="text" name="cp" id="cp" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="colonia">Colonia: </label>
            <input type="text" name="colonia" id="colonia" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label for="calle">Calle: </label>
            <input type="text" name="calle" id="calle" class="form-control" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-8">
                <label for="referencia">Referencias y/o entre calles:  </label>
                <input type="text" name="referencia" id="referencia" class="form-control">
        </div>
        <div class="col-md-2">
            <label for="numero_i">N&uacute;mero Interior: </label>
            <input type="text" name="numero_i" id="numero_i" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label for="numero_e">N&uacute;mero Exterior:</label>
            <input type="text" name="numero_e" id="numero_e" class="form-control">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
                <label for="telefono">Tel&eacute;fono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
        </div>
        <div class="col-md-2">
            <label for="ext">Estensi&oacute;n </label>
            <input type="text" name="ext" id="ext" class="form-control">
        </div>
    </div>
    <div class="terminar">
    <a class="terminar__button" href="{{url('cart')}}">Cancelar</a>
        <button type="submit" class="btn btn-primary btn-small">Continuar</button>
    </div>
</form>
@endsection