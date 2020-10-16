<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilios extends Model
{
    use HasFactory;
    protected $fillable = ["cp", "colonia",	"calle", "referencia", "numero_i", "numero_e", "telefono",	"ext"];
}
