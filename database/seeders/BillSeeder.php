<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;
use App\Connection\MongoDBConnectionFactory as ConnectionMongoDBConnectionFactory;

class BillSeeder extends Seeder
{
    public function run()
    {
        // Establecer la coneccion
        // Creacion del objeto factory
        $mongoDBFactory = new ConnectionMongoDBConnectionFactory();
        // Acceder al nombre de la coneccion
        $mongoDBConnection = $mongoDBFactory->createConnection()->getConnectionName();
        Bill::on($mongoDBConnection)->create([
            "amount" => ["Portatil ASUS M415D Ryzen 5" => 1],
            "totalPrice" => 1530,
            "dateOrder" => "2023-08-12T23:15:49",
            "user_id" => 1,
            "product_id" => ["name" => "Portatil ASUS M415D Ryzen 5"]
        ]);
        Bill::on($mongoDBConnection)->create([
            "amount" => ["Portatil HP 15-ef2511la" => 1, "Portatil Lenovo IdeaPad5 14ARE05 - Ryzen 7" => 1],
            "totalPrice" => 1170,
            "dateOrder" => "2023-08-12T13:25:06",
            "user_id" => 2,
            "product_id" => ["name" => "Portatil HP 15-ef2511la", "name" => "Portatil Lenovo IdeaPad5 14ARE05 - Ryzen 7"]
        ]);
        Bill::on($mongoDBConnection)->create([
            "amount" => ["Portatil ASUS M415D Ryzen 5" => 1],
            "totalPrice" => 3060,
            "dateOrder" => "2023-08-12T23:15:49",
            "user_id" => 3,
            "product_id" => ["name" => "Portatil ASUS M415D Ryzen 5"]
        ]);
    }
}
