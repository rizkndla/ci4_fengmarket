<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();

        return view('admin/products/index', [
            'products' => $model->findAll()
        ]);
    }

    public function create()
    {
        return view('admin/products/create');
    }

    public function store()
    {
        // ===============================
        // VALIDATION RULES
        // ===============================
        $rules = [
            'name' => [
                'rules'  => 'required|min_length[3]',
                'errors' => [
                    'required'   => 'Nama produk wajib diisi',
                    'min_length' => 'Nama produk minimal 3 karakter'
                ]
            ],
            'price' => [
                'rules'  => 'required|numeric',
                'errors' => [
                    'required' => 'Harga wajib diisi',
                    'numeric'  => 'Harga harus berupa angka'
                ]
            ],
            'stock' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'Stok wajib diisi',
                    'integer'  => 'Stok harus berupa angka'
                ]
            ],
            'description' => 'permit_empty',
            'image' => [
                'rules'  => 'uploaded[image]|is_image[image]|max_size[image,5120]',
                'errors' => [
                    'uploaded' => 'Gambar produk wajib diupload',
                    'is_image' => 'File harus berupa gambar',
                    'max_size' => 'Ukuran gambar maksimal 5MB'
                ]
            ]
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        // ===============================
        // UPLOAD IMAGE
        // ===============================
        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid() && ! $image->hasMoved()) {

            if (! is_dir(FCPATH . 'uploads/products')) {
                mkdir(FCPATH . 'uploads/products', 0777, true);
            }

            $imageName = $image->getRandomName();

            // simpan ke public/uploads/products
            $image->move(FCPATH . 'uploads/products', $imageName);
        }

        // ===============================
        // SAVE TO DATABASE
        // ===============================
        $model = new ProductModel();

        $model->insert([
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'image'       => $imageName,
            'status'      => 1
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Produk berhasil ditambahkan');
    }
}
