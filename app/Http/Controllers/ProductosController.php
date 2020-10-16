<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Session;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index(){
        $productos = Productos::where('adicional', '=', '0')->paginate(10);
        return view('productos.index', compact('productos'));
    }
    public function agregar(){
        return view('productos.add'); 
    }
    public function store(){
        $file = request('file');
        if($url = Productos::getFileName($file)){
            $productos = Productos::create([
                'nombre' => request('nombre'),
                'ingredientes' => request('ingredientes'),
                'precio' => request('precio'),
                'existencias' => request('existencias'),
                'url' => $url,
                'adicional' => (request()->has('adicional')) ? 1 : 0,
                'refresco' => (request()->has('refresco')) ? 1 : 0
                ])->save();
            if(isset($productos)){
                Session::flash('success', 'Registro almacenado de forma exitosa');
            }else{
                Session::flash('danger', 'El registro no se pudo almacenar');
            }
            }
            return redirect('productos');     
        // Session::flash('success', 'Registro almacenado de forma exitosa');
    }
} 