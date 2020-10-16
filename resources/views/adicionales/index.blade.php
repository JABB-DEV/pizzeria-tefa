@extends('layouts.main')
@section('styles')
    <style>
        .ir-arriba {
			display: none;
			padding: 1em;
			background: #477842;
			color: #fff;
			font-size: 1em;
			cursor: pointer;
			position: fixed;
			bottom: 1em;
			right: 1.5em;
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			-o-transform: rotate(-90deg);
			transform: rotate(-90deg);
		}
    </style>
@endsection
@section('content')
<form action="{{url('adi')}}" method="POST">
    @csrf
    <div class="d-flex justify-content-end mt-2">
        @if (sizeof($hamburguesas) > 0 || sizeof($refrescos) > 0)
            <input type="submit" value="Agregar" class="btn btn-outline-success">
        @endif
    </div>
    <div class="row">
        {{-- Inicia seccion de hamburgesas --}}
        <div class="col-md-6">
            <p class="h3">Hamburguesas</p>
            <div class="row">
                @forelse($hamburguesas as $hamburguesa)
                {{-- Cada item de hamburguesas --}}
                    <div class="col-sm-6">
                        <input type="hidden" name="id[]" value="{{$hamburguesa->id}}">
                        <img src="{{ asset('storage/imagenes/'.$hamburguesa->url) }}" alt="..." class="rounded mx-auto d-block" width="150" height="100">
                        <p class="h6 text-center">{{$hamburguesa->nombre." $".$hamburguesa->precio}}</p>
                        <p class="h6 text-center">{{$hamburguesa->ingredientes}}</p>
                        <div class="d-flex justify-content-center mt-2">
                            <p class="contador">
                            <i class="fas fa-plus" onclick="operaciones('counter_{{$hamburguesa->id}}', 'span_counter_{{$hamburguesa->id}}', 1)" style="cursor: pointer;"></i> 
                                <span id="span_counter_{{$hamburguesa->id}}">0</span>
                                <input type="hidden" name="counter[]" id="counter_{{$hamburguesa->id}}" value="0">
                            <i class="fas fa-minus" onclick="operaciones('counter_{{$hamburguesa->id}}', 'span_counter_{{$hamburguesa->id}}', 0)" style="cursor: pointer;"></i></p>
                        </div>
                    </div>
                    {{-- Termina item de hamburguesas --}}
                    @empty
                    <div class="col-sm-6">
                        <p class="text-danger">No hay hamburguesas</p>
                    </div>
                    @endforelse
            </div>
        </div>
        {{-- Termina seccion de hamburguesas --}}
        
        {{-- Inicia seccion de refrescos --}}
            <div class="col-md-6">
                <p class="h3">Refrescos</p>
                <div class="row">
                    @forelse($refrescos as $refresco)
                    {{-- Cada item de hamburguesas --}}
                        <div class="col-sm-6">
                        <input type="hidden" name="id[]" value="{{$refresco->id}}">
                            <img src="{{ asset('storage/imagenes/'.$refresco->url) }}" alt="..." class="rounded mx-auto d-block" width="100" height="100">
                            <p class="h6 text-center">{{$refresco->nombre." $".$refresco->precio}}</p>
                            <div class="d-flex justify-content-center mt-2">
                                <p class="contador">
                                <i class="fas fa-plus" onclick="operaciones('counter_{{$refresco->id}}', 'span_counter_{{$refresco->id}}', 1)" style="cursor: pointer;"></i> 
                                    <span id="span_counter_{{$refresco->id}}">0</span>
                                    <input type="hidden" name="counter[]" id="counter_{{$refresco->id}}" value="0">
                                <i class="fas fa-minus" onclick="operaciones('counter_{{$refresco->id}}', 'span_counter_{{$refresco->id}}', 0)" style="cursor: pointer;"></i></p>
                            </div>
                        </div>
                        {{-- Termina item de hamburguesas --}}
                        @empty
                        <div class="col-sm-6">
                            <p class="text-danger">No hay refrescos</p>
                        </div>
                        @endforelse
                </div>
            </div>
            {{-- Termina seccion de hamburguesas --}}
    </div>
</form>

<span class="ir-arriba">&raquo;</span>
@endsection
@section('scripts')
    <script>
        $('.ir-arriba').click(() => {
			$('body, html').animate({
				scrollTop: '0px'
			}, 300)
		})

		$(window).scroll(() => {
			if ($(this).scrollTop() > 0) {
				$('.ir-arriba').slideDown(300)
			} else {
				$('.ir-arriba').slideUp(300)
			}
		})

        const operaciones = (input, span, operacion) =>{
            let input_c = document.getElementById(input)
            let span_c = document.getElementById(span)
            switch (operacion){
                case 0:
                    if(input_c.value != 0 && input_c.value != ''){
                        span_c.innerHTML = parseInt(input_c.value) - 1;
                    input_c.value = parseInt(input_c.value) - 1;
                    }
                break;
                case 1:
                    span_c.innerHTML = parseInt(input_c.value) + 1;
                    input_c.value = parseInt(input_c.value)+ 1;
                break;
            }
            // console.log(input_c.value)
        }
    </script>
@endsection