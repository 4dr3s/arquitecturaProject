<?php

namespace App\PATRON\DAO\Bill;

use App\Models\Bill;
use App\PATRON\DAO\Connection\connection;
use App\PATRON\DTO\Bill\BillsDTO;

class BillsDAO extends connection
{
    // Funcion para obtener los datos respectivos para crear la factura
    public function createBill(BillsDTO $billsDTO)
    {
        // Establecer la coneccion
        $connection = new connection();
        $mongoDBConnection = $connection->mongodbConnection();
        // Crear factura especificando la coneccion
        Bill::on($mongoDBConnection)->create([
            'amount' => $billsDTO->getAmount(),
            'totalPrice' => $billsDTO->getTotalPrice(),
            'dateOrder' => $billsDTO->getDateOrder(),
            'user_id' => $billsDTO->getUser_id(),
            'product_id' => $billsDTO->getProduct_id()
        ]);
    }
    // Funcion para buscar facturas por cliente
    public function showUserBill($idClient)
    {
        // Establecer la coneccion
        $connection = new connection();
        $mongoDBConnection = $connection->mongodbConnection();
        // Mostrar la factura segun el idCliente
        $bills = Bill::on($mongoDBConnection)->where('{user_id : ' . $idClient.'}')->get();
        // $bills = DB::connection($mongoDBConnection)->collection('bills')->where('{user_id:{$eq:'.$idClient.'}}')->get();
        return $bills;
    }
    // Mostrar todas las facturas para el dashboard
    public function showBills()
    {
        // Establecer la coneccion
        $connection = new connection();
        $mongoDBConnection = $connection->mongodbConnection();
        // Retornar en la variable $bills la consulta de todas las facturas
        return $bills = Bill::on($mongoDBConnection)->get();
    }
}