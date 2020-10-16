<?php

namespace App\Http\Controllers;

use App\Models\Productos;

class AdicionalesController extends Controller
{
    public function index(){
        
        $hamburguesas = Productos::where([
            ['adicional','=', 1],
            ['refresco','=', 0]
            ])->get();

        $refrescos = Productos::where([
            ['adicional','=', 1],
            ['refresco','=', 1]
            ])->get();

        return view('adicionales.index', compact('hamburguesas'), compact('refrescos'));
    }
}
