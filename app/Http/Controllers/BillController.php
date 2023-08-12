<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\PATRON\DAO\Bill\BillsDAO;
use App\PATRON\DTO\Bill\BillsDTO;
use Illuminate\Http\Request;

class BillController extends Controller
{
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

    public function showUserBillDetail($id)
    {
        $billsDao = new BillsDAO();
        $bills = $billsDao->showUserBill($id);
        $billUser = [];
        foreach ($bills as $bill) {
            $billUser[] = new BillsDTO(
                $bill->id,
                $bill->amount,
                $bill->totalPrice,
                $bill->dateOrder,
                $bill->user_id,
                $bill->product_id
            );
        }
        return view('bill.showUserBill', compact('billUser', 'id'));
    }
}
