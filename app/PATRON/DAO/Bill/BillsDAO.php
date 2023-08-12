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

    public function showUserBill($idClient)
    {
        $connection = new connection();
        $mongoDBConnection = $connection->mongodbConnection();
        $bills = Bill::on($mongoDBConnection)->where('{user_id : ' . $idClient.'}')->get();
        // $bills = DB::connection($mongoDBConnection)->collection('bills')->where('{user_id:{$eq:'.$idClient.'}}')->get();
        return $bills;
    }

    public function showBills()
    {
        $connection = new connection();
        $mongoDBConnection = $connection->mongodbConnection();
        return $bills = Bill::on($mongoDBConnection)->get();
    }
}