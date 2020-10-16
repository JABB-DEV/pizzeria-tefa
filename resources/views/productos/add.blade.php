@extends('layouts.main')
@section('content')
<div class="row mb-4">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">Nuevo Producto</div>
            <div class="card-body">
            <form action="{{url('productos')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="nombre" class="small">Nombre: </label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ingredientes" class="small">Ingredientes: </label>
                        <input type="text" name="ingredientes" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="precio" class="small">Precio: </label>
                        <input type="text" name="precio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="existencias" class="small">Existencias: </label>
                        <input type="text" name="existencias" class="form-control" required>
                    </div>
                    <div class="d-flex flex-row justify-content-around mt-2 p-2">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="adicional" name="adicional">
                            <label class="form-check-label small" for="adicional">¿Es adicional?</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="refresco" name="refresco">
                            <label class="form-check-label small" for="refresco">¿Es refresco?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="file" alt="Imagen" class="form-control" accept="image/png, .jpeg, .jpg, image/gif">
                    </div>
                    <input type="submit" value="Guardar" class="btn btn-success btn-block mt-1">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection