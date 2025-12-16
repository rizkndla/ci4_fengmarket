<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();

        return view('admin/products/index', $data);
    }

    public function create()
    {
        return view('admin/products/create');
    }

    public function store()
    {
        $model = new ProductModel();

        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/products', $imageName);
        }

        $model->insert([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName,
            'status' => 1,
        ]);

        return redirect()->to('/admin/products');
    }
}