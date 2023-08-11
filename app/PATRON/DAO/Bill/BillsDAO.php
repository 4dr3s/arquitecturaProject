<?php

namespace App\PATRON\DAO\Bill;

use App\Models\Bill;
use App\PATRON\DAO\Connection\connection;
use App\PATRON\DTO\Bill\BillsDTO;

class BillsDAO extends connection
{
    public function createBill(BillsDTO $billsDTO)
    {
        $connection = new connection();
        $mongoDBConnection = $connection->mongodbConnection();
        return $bill = Bill::on($mongoDBConnection)->create([
            'amount' => $billsDTO->getAmount(),
            'totalPrice' => $billsDTO->getTotalPrice(),
            'dateOrder' => $billsDTO->getDateOrder(),
            'user_id' => $billsDTO->getUser_id(),
            'product_id' => $billsDTO->getProduct_id()
        ]);
    }
}