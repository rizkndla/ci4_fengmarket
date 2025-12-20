<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class OrderController extends BaseController
{
    public function index()
    {
        // Data dummy - ganti dengan data dari database
        $orders = [
            [
                'id' => 'ORD-001',
                'customer' => 'John Doe',
                'email' => 'john@example.com',
                'product' => 'RF 7 DAY UNIVERSAL',
                'quantity' => 2,
                'total' => 500000,
                'status' => 'pending',
                'date' => '2024-03-15 10:30:00'
            ],
            [
                'id' => 'ORD-002',
                'customer' => 'Jane Smith',
                'email' => 'jane@example.com',
                'product' => 'RF BASIC EDITION',
                'quantity' => 1,
                'total' => 250000,
                'status' => 'processing',
                'date' => '2024-03-14 14:20:00'
            ],
            [
                'id' => 'ORD-003',
                'customer' => 'Bob Wilson',
                'email' => 'bob@example.com',
                'product' => 'RF 7 DAY UNIVERSAL',
                'quantity' => 3,
                'total' => 750000,
                'status' => 'completed',
                'date' => '2024-03-13 09:15:00'
            ],
        ];
        
        return view('admin/orders/index', ['orders' => $orders]);
    }
    
    public function edit($id)
    {
        // Data dummy - ganti dengan data dari database
        $order = [
            'id' => 'ORD-00' . $id,
            'customer' => 'John Doe',
            'email' => 'john@example.com',
            'product' => 'RF 7 DAY UNIVERSAL',
            'quantity' => 2,
            'total' => 500000,
            'status' => 'pending',
            'date' => '2024-03-15 10:30:00'
        ];
        
        $data = [
            'order' => $order,
            'statusOptions' => [
                'pending' => 'Pending',
                'processing' => 'Processing',
                'completed' => 'Completed',
                'cancelled' => 'Cancelled'
            ]
        ];
        
        return view('admin/orders/edit', $data);
    }
    
    public function update($id)
    {
        // Ambil data dari form
        $status = $this->request->getPost('status');
        
        // Simpan ke database (ganti dengan kode database Anda)
        // $orderModel = new \App\Models\OrderModel();
        // $orderModel->update($id, ['status' => $status]);
        
        // Redirect dengan pesan sukses
        return redirect()->to('/admin/orders')->with('success', 'Status order berhasil diperbarui!');
    }
    
    public function view($id)
    {
        // Data dummy untuk halaman view
        $order = [
            'id' => 'ORD-00' . $id,
            'customer' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '08123456789',
            'address' => 'Jl. Contoh No. 123, Jakarta',
            'product' => 'RF 7 DAY UNIVERSAL',
            'quantity' => 2,
            'price' => 250000,
            'total' => 500000,
            'status' => 'pending',
            'date' => '2024-03-15 10:30:00',
            'payment_method' => 'Transfer Bank',
            'notes' => 'Mohon dikirim secepatnya'
        ];
        
        return view('admin/orders/view', ['order' => $order]);
    }
    
    public function print($id)
    {
        // Data untuk invoice
        $order = [
            'id' => 'ORD-00' . $id,
            'customer' => 'John Doe',
            'email' => 'john@example.com',
            'product' => 'RF 7 DAY UNIVERSAL',
            'quantity' => 2,
            'price' => 250000,
            'total' => 500000,
            'date' => '2024-03-15 10:30:00',
            'invoice_number' => 'INV-' . date('Ymd') . '-' . $id
        ];
        
        return view('admin/orders/print', ['order' => $order]);
    }
    
    public function export()
    {
        // Logic untuk export Excel
        return redirect()->to('/admin/orders')->with('info', 'Fitur export sedang dalam pengembangan');
    }
}