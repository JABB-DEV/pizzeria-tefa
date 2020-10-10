<img src="{{ asset('images/logo-pizzas-tefa.jpg') }}" alt="Logo de la pizzeria" class="logo-img">
    <nav class="navbar">
    <a href="{{url('productos')}}" class="navbar__item"> <img src="{{asset('images/pizza.png')}}" width="25"> Pizza</a>
    <a href="" class="navbar__item"> <img src="{{asset('images/adicionales.png')}}" width="25"> Adicionales</a>
        <a href="#" class="navbar__item"><img src="{{asset('images/arma.png')}}" width="25"> Arma tu pizza</a>
        <a href="#" class="navbar__item"><img src="{{asset('images/ordena.png')}}" width="25"> Ordena</a>
        @if (count(Cart::getContent()))
            <a href="{{url('cart')}}" class="navbar__item"><i class="fas fa-shopping-cart"></i> {{count(Cart::getContent())}} </a>
            @else
            <span class="navbar__item"><i class="fas fa-shopping-cart"></i> {{count(Cart::getContent())}}</span>
    
        @endif
    </nav>