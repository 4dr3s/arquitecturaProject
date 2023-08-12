<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\PATRON\DAO\Bill\BillsDAO;

class DashBoardController extends Controller
{
    public function handleChart()
    {
        $billsDao = new BillsDAO();
        $bills = $billsDao->showBills();
        $users = [];
        foreach ($bills as $bill) {
            $user = User::findOrFail($bill['user_id']);
            $users[] = [
                'id' => $user->id,
                'name' => $user->name
            ];
        }
        $users = array_reduce($users, function ($value, $id) {
            $existingIndex = array_search($id['id'], array_column($value, 'id'));
            if ($existingIndex === false) {
                $value[] = $id;
            }
            return $value;
        }, []);

        $data = [];
        foreach ($bills as $order) {
            $userId = $order->user_id;
            $totalSales = $order->totalPrice;

            if (!isset($data[$userId])) {
                $data[$userId] = 0;
            }
            $data[$userId] += $totalSales;
        }

        return view('dashboard.dashboard', compact('data', 'users'));
    }
}
