<img src="{{ asset('images/logo-pizzas-tefa.jpg') }}" alt="Logo de la pizzeria" class="logo-img">
    <nav class="navbar">
    <a href="{{url('productos')}}" class="navbar__item mt-1"> <img src="{{asset('images/pizza.png')}}" width="25"> Pizza</a>
    <a href="{{url('adicionales')}}" class="navbar__item mt-1"> <img src="{{asset('images/adicionales.png')}}" width="25"> Adicionales</a>
    {{-- <a href="{{url('add/producto')}}" class="btn btn-link">Agregar Producto</a> --}}
        <a href="{{url('add/producto')}}" class="navbar__item mt-1"> <i class="fa fa-plus-square"></i> Agregar Producto</a>
        {{-- <a href="#" class="navbar__item"><img src="{{asset('images/ordena.png')}}" width="25"> Ordena</a> --}}
        @if (count(Cart::getContent()))
            <a href="{{url('cart')}}" class="navbar__item mt-1"><i class="fas fa-shopping-cart"></i> {{count(Cart::getContent())}} Ordenar </a>
            @else
            <span class="navbar__item"><i class="fas fa-shopping-cart"></i> {{count(Cart::getContent())}}</span>
    
        @endif
    </nav>