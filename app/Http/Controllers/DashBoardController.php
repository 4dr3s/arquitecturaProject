<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\PATRON\DAO\Bill\BillsDAO;
use App\PATRON\DAO\User\UserDao;

class DashBoardController extends Controller
{
    // Funcion para crear el dashboard
    public function handleChart()
    {
        // Objeto DAO
        $billsDao = new BillsDAO();
        // Acceder a la funcion para mostrar las compras realizadas
        $bills = $billsDao->showBills();
        $users = [];
        // Recorrer los valores de las compras
        foreach ($bills as $bill) {
            // Objeto DAO
            $userDAO = new UserDao();
            // Acceder a la funcion para buscar un usuario segun las compras
            $user = $userDAO->searchUserId($bill['user_id']);
            // Array para guardar los usuarios y su identificador
            $users[] = [
                'id' => $user->id,
                'name' => $user->name
            ];
        }
        // Algoritmo para eliminar del array elementos repetitivos y que todos sean unicos
        $users = array_reduce($users, function ($value, $id) {
            $existingIndex = array_search($id['id'], array_column($value, 'id'));
            if ($existingIndex === false) {
                $value[] = $id;
            }
            return $value;
        }, []);

        $data = [];
        // Recorrer las facturas
        foreach ($bills as $order) {
            // Guardar los valores que nos hacen importantes para la grafica
            $userId = $order->user_id;
            $totalSales = $order->totalPrice;
            // Asignacion de los valores de compra a cada usuario para ser representados
            if (!isset($data[$userId])) {
                $data[$userId] = 0;
            }
            $data[$userId] += $totalSales;
        }
        // Retornor a la vista con los datos obtenidos
        return view('dashboard.dashboard', compact('data', 'users'));
    }
}
