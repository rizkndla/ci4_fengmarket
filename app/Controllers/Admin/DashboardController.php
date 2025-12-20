<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $data = [
            // DATA REAL (SUDAH ADA)
            'total_products' => $productModel->countAll(),

            // DATA DUMMY (NANTI DISAMBUNG)
            'active_orders'   => 0,
            'total_customers' => 0,
            'monthly_revenue' => 0,

            // Aktivitas dummy (biar UI hidup)
            'recent_activities' => []
        ];

        return view('admin/dashboard', $data);
    }
}
