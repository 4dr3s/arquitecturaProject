<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" => "Hola mundo"
        ]);
    }

    public function store(Request $request)
    {
        $bill = new Bill();
        $bill->amount = $request->amount;
        $bill->totalPrice = $request->totalPrice;
        $bill->dateOrder = now();
        $bill->save();

        return response()->json([
            'data' => $bill,
        ],200);
    }
}
