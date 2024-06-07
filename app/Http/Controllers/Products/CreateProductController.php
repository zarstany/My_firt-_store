<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');
        $imgFile = $request->file('img');
        $imgPath = public_path() . '/Productos';
        $imageName = $imgFile->getClientOriginalName();
        
        $imgFile->move($imgPath, $imageName);
    }
}
