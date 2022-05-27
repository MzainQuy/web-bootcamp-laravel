<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Checkout\Paid;

class CheckoutController extends Controller
{
    public function update(Request $request, Checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();

        Mail::to($checkout->User->email)->send(new Paid($checkout));

        $request->session()->flash('success', "checkout with Id {$checkout->id} has been Updated");
        return redirect()->back();
    }
}
