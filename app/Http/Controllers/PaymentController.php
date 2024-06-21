<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        // Buat entri baru di tabel payments
        $payment = Payment::create($validatedData);

        // Kembalikan respons JSON dengan data pembayaran yang baru dibuat
        return response()->json([
            'message' => 'Pembayaran berhasil diproses',
            'data' => $payment,
        ], 201);
    }
}
