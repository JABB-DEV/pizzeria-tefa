<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css')}}">
    <style>
        .title{
            text-align: center;
            font-size: 2em;
        }
        .table td{
            padding: 1em;
        }
        .table thead{
            border: 1px solid green;
        }
        .ingredientes{
            text-transform: lowercase;
        }
        .mb-3 {
            margin-bottom: 1em;
        }
    </style>
</head>

<body>
    <p class="title">Reporte de venta</p>
    <p>&nbsp;</p>
    <p>Datos del domicilio</p>
    <div>Codigo postal: <span class="text-muted">{{$domicilio->cp}}</span></div>
    <div>Colonia: {{$domicilio->colonia}}</div>
    <div>Calle: {{$domicilio->calle}} {{($domicilio->numero_i != '') ? "#".$domicilio->numero_i : ''}} {{($domicilio->numero_e != '') ? "Ext. ".$domicilio->numero_e : ''}}</div>
    <div>Referencia: {{$domicilio->referencia}}</div>
    <div class="mb-3">Telefono: {{$domicilio->telefono}} {{($domicilio->ext != '') ? " Ext. ".$domicilio->ext : ''}}</div>
    <table class="table" width="100%">
            <thead>
                <tr>
                    <th scope="col">
                        Cant
                    </th>
                    <th scope="col">
                        Nombre
                    </th>
                    <th scope="col">
                        Precio
                    </th>
                    <th scope="col">
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{$producto->cantidad_venta}}</td>
                        <td>{{$producto->nombre}} <span class="ingredientes">{{($producto->ingredientes != '') ? 'con '.$producto->ingredientes : ''}} </span></td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->precio * $producto->cantidad_venta}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4">
                    <table align="right">
                        <tr>
                            <td>Subtotal: {{ $venta->subtotal }}</td>
                        </tr>
                        <tr>
                            <td>Iva: {{ $venta->iva }}</td>
                        </tr>
                        <tr>
                            <td>Total: <span>{{ $venta->total }}</td>
                        </tr>
                    </table></td>
                </tr>
            </tbody>
        </table>
</body>

</html>