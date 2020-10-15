<?php

namespace App\Http\Controllers;

use App\Models\Adicionales;

class AdicionalesController extends Controller
{
    public function index(){
        $hamburguesas = Adicionales::where('refresco','=', 0)->get();
        $refrescos = Adicionales::where('refresco','=', 1)->get();
        return view('adicionales.index', compact('hamburguesas'), compact('refrescos'));
    }
}
