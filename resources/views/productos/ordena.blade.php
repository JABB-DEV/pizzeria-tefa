@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card mt-1">
        <input type="hidden" id = "id" value="{{$producto->id}}">
        @csrf
                <div class="card-body">
                    <p class="h2" id="nombre">{{$producto->nombre}}</p>
                    <p>Ingredientes: <i id="ingredientes">{{$producto->ingredientes}}</i></p>
                    <div class="form-group">
                        <select id="masa" class="form-control">
                            <option value="">Selecciona la masa</option>
                            <option value="1">Masa original</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="size" class="form-control">
                            <option value="">Selecciona el tamaño</option>
                            <option value="mediana">Mediana</option>
                            <option value="grande">Grande</option>
                            <option value="mediana">Gigante</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-center mt-2">
                    <p class="contador"><i class="fas fa-plus" onclick="plus()" style="cursor: pointer;"></i> 
                        <span id="counter" class="">1</span>
                        <i class="fas fa-minus" onclick="minus()" style="cursor: pointer;"></i></p>
                </div>
                <button class="btn btn-primary" onclick="mandar('{{url('add') }} ')"> agregar al carrito</button>
            </div>
    </div>    
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
    const plus = () => {
        let counter = document.getElementById('counter')
        let con = parseInt(counter.innerHTML)
        if( con >= 1){
            con++
            counter.innerHTML = con
        }
    }
    const minus = () => {
        let counter = document.getElementById('counter')
        let con = parseInt(counter.innerHTML)
        if( con > 1){
            con--
            counter.innerHTML = con
        }
    }
    const mandar = url =>{
        let masa = document.getElementById('masa').value
        let size = document.getElementById('size').value
        if(masa !="" && size !='' ){
        let data = `_token=${document.querySelector("input[name='_token']").value}&id=${document.getElementById('id').value}&cantidad=${document.getElementById('counter').innerHTML}&size=${size}&masa=${size}`
        fetch(url, {
            method: 'POST',
            headers: {
               'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: data,
            redirect: "follow",
        })
        .then(function(response) {
            location.reload();
        })
        }else{
            alert('Seleccione todas las opciones')
        }
    }
    </script>
@endsection