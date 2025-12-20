<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    // ===============================
    // LIST PRODUCT
    // ===============================
    public function index()
    {
        $model = new ProductModel();

        return view('admin/products/index', [
            'products' => $model->findAll()
        ]);
    }

    // ===============================
    // CREATE FORM
    // ===============================
    public function create()
    {
        return view('admin/products/create');
    }

    // ===============================
    // STORE PRODUCT
    // ===============================
    public function store()
    {
        $rules = [
            'name'        => 'required|min_length[3]',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'description' => 'permit_empty',
            'image'       => 'uploaded[image]|is_image[image]|max_size[image,5120]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        // UPLOAD IMAGE
        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid() && ! $image->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/products';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = $image->getRandomName();
            $image->move($uploadPath, $imageName);
        }

        // SAVE DATABASE
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

    // ===============================
    // EDIT FORM
    // ===============================
    public function edit($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (! $product) {
            return redirect()->to('/admin/products');
        }

        return view('admin/products/edit', [
            'product' => $product
        ]);
    }

    // ===============================
    // UPDATE PRODUCT
    // ===============================
    public function update($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (! $product) {
            return redirect()->to('/admin/products');
        }

        $image = $this->request->getFile('image');
        $imageName = $product['image']; // default pakai gambar lama

        if ($image && $image->isValid() && ! $image->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/products';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $imageName = $image->getRandomName();
            $image->move($uploadPath, $imageName);

            // hapus gambar lama
            if (!empty($product['image']) && file_exists($uploadPath . '/' . $product['image'])) {
                unlink($uploadPath . '/' . $product['image']);
            }
        }

        $model->update($id, [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'description' => $this->request->getPost('description'),
            'image'       => $imageName
        ]);

        return redirect()->to('/admin/products')
            ->with('success', 'Produk berhasil diperbarui');
    }

    // ===============================
    // DETAIL PRODUCT
    // ===============================
    public function view($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (! $product) {
            return redirect()->to('/admin/products');
        }

        return view('admin/products/view', [
            'product' => $product
        ]);
    }

    // ===============================
    // DELETE PRODUCT
    // ===============================
    public function delete($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if ($product) {
            if (!empty($product['image'])) {
                $imagePath = FCPATH . 'uploads/products/' . $product['image'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $model->delete($id);
        }

        return redirect()->to('/admin/products')
            ->with('success', 'Produk berhasil dihapus');
    }
}