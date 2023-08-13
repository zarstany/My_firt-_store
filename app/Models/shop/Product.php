<?php
namespace App\Models\shop;

use Illuminate\Database\Eloquent\Model;

class product extends Model {
 //creamos un modelo con el fillable creando un array de nuestras caracteristicas
    protected $fillable =[
        'name',
        'image',
        'price'
    ];
    
}