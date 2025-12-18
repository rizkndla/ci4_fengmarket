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

    if ($image && $image->isValid() && !$image->hasMoved()) {

        $uploadPath = FCPATH . 'uploads/products';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $imageName = $image->getRandomName();
        $image->move($uploadPath, $imageName);
    }

    $model->insert([
        'name'        => $this->request->getPost('name'),
        'price'       => $this->request->getPost('price'),
        'stock'       => $this->request->getPost('stock'),
        'description' => $this->request->getPost('description'),
        'image'       => $imageName,
        'status'      => 1,
    ]);

    return redirect()->to('/admin/products');
}

}