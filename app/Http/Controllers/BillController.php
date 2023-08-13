<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\PATRON\DAO\Bill\BillsDAO;
use App\PATRON\DTO\Bill\BillsDTO;
use Illuminate\Http\Request;

class BillController extends Controller
{
    // Funcion para mostrar detalle de compras realizadas por clientes
    public function showUserBillDetail($id)
    {
        // Objeto DAO
        $billsDao = new BillsDAO();
        // Acceder al metodo respectivo para mostrar los datos
        $bills = $billsDao->showUserBill($id);
        $billUser = [];
        // Recorrer la lista resultante del metodo anterior
        foreach ($bills as $bill) {
            // Guardar cada elemento como un objeto DTO
            $billUser[] = new BillsDTO(
                $bill->id,
                $bill->amount,
                $bill->totalPrice,
                $bill->dateOrder,
                $bill->user_id,
                $bill->product_id
            );
        }
        // Devolver los datos obtenidos a la vista
        return view('bill.showUserBill', compact('billUser', 'id'));
    }
}
