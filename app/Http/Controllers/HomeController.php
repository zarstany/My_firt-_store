<?php

namespace App\Http\Controllers;

use App\Repositories\EloquentProductRepository;

class HomeController extends Controller
{
    public function __invoke()
    {
        // if (Auth::guest()) {
        //     return redirect()->to('/login');
        //  }
        
        // $userId = Auth::id();
        $productRepository = new EloquentProductRepository();
        // $cartRepository = new EloquentCartRepository();
        $products = $productRepository->getAll();
        

        return view('home', [
            'products' => $products,
        ]);
    }
}
