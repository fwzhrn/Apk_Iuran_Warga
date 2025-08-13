<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function process(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string|in:bank_transfer,credit_card,cash',
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil diproses!');
    }

    public function showForm()
    {
        return view('admin.payment');
    }
}
