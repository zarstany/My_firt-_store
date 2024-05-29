<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;

class CreateProductViewController extends Controller
{
    public function __invoke()
    {
        return view('create-products');
    }
}
