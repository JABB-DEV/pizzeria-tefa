@extends('layouts.main')
@section('content')
<div class="row">
    {{-- Inicia seccion de hamburgesas --}}
    <div class="col-md-6">
        <p class="h3">Hamburguesas</p>
        <div class="row">
            @forelse($hamburguesas as $hamburguesa)
            {{-- Cada item de hamburguesas --}}
                <div class="col-sm-6">
                    <img src="{{asset($hamburguesa->url)}}" alt="..." class="rounded mx-auto d-block" width="150" height="100">
                    <p class="h6 text-center">{{$hamburguesa->nombre." $".$hamburguesa->precio}}</p>
                    <div class="d-flex justify-content-center mt-2">
                        <p class="contador"><i class="fas fa-plus" onclick="plus('')" style="cursor: pointer;"></i> 
                        <span>0</span>
                            <i class="fas fa-minus" onclick="minus('')" style="cursor: pointer;"></i></p>
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
    
    {{-- Inicia seccion de refrescos --}}
        <div class="col-md-6">
            <p class="h3">Refrescos</p>
            <div class="row">
                @forelse($refrescos as $refresco)
                {{-- Cada item de hamburguesas --}}
                    <div class="col-sm-6">
                        <img src="{{asset($refresco->url)}}" alt="..." class="rounded mx-auto d-block" width="150" height="100">
                        <p class="h6 text-center">{{$refresco->nombre." $".$refresco->precio}}</p>
                        <div class="d-flex justify-content-center mt-2">
                            <p class="contador"><i class="fas fa-plus" onclick="plus('')" style="cursor: pointer;"></i> 
                            <span>0</span>
                                <i class="fas fa-minus" onclick="minus('')" style="cursor: pointer;"></i></p>
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
@endsection