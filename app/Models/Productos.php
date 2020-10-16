<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','ingredientes','precio','existencias','url','adicional','refresco'];
    public static function getFileName($file, $actual = ''){
        if($actual == ''){
            Storage::disk('public')->delete('imagenes/'.$actual);
            $imageName = Str::random(20) . ".jpg";
            $imagen = Image::make($file)->encode("jpg", 75);
            // $imagen->resize(200, 200, function($constraint){
            //     $constraint->upsize();
            // });
            Storage::disk('public')->put("imagenes/$imageName", $imagen->stream());
            return $imageName;
        }else{
        $imageName = Str::random(20) . ".jpg";
        $imagen = Image::make($file)->encode("jpg", 75);
        $imagen->resize(200, 200, function($constraint){
            $constraint->upsize();
        });
        Storage::disk('public')->put("imagenes/$imageName", $imagen->stream());
        return $imageName;
        }
    }
}
