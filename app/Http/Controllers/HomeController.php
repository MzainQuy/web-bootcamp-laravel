<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        // $checkout = Checkout::with('camp')->where('user_id', Auth::id())->get();

        // or use this for query user
        $checkout = Checkout::with('camp')->whereUserId(Auth::id())->get();
        return view('user.dashboard', [
            'checkout' => $checkout
        ]);
    }
}
