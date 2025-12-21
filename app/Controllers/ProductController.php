<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    // LIST PRODUK
    public function index()
    {
        $model = new ProductModel();

        return view('user/products/index', [
            'products' => $model->where('status', 1)->findAll()
        ]);
    }

    // DETAIL PRODUK
    public function detail($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (! $product) {
            return redirect()->to('/products');
        }

        return view('user/products/detail', [
            'product' => $product
        ]);
    }
}
