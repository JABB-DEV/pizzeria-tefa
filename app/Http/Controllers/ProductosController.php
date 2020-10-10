<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductosController extends Controller
{
    public function index(){
        $productos = Productos::paginate(10);
        return view('productos.index', compact('productos'));
    }
} 