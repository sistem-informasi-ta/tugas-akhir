<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Data dummy untuk ditampilkan
        $orders = [
            ['id' => 1, 'item' => 'Produk A', 'status' => 'Dikirim'],
            ['id' => 2, 'item' => 'Produk B', 'status' => 'Diproses'],
        ];

        return view('admin.orders', compact('orders'));
    }
}
