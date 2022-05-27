<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;

class DashboardController extends Controller
{

    public function index()
    {
        $checkout = Checkout::with('camp')->get();
        return view('admin.dashboard', [
            'checkout' => $checkout
        ]);
    }
}
