<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Celulares'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Computadoras de Escritorio'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Laptops'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Smarthphones'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Tablets'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Mouses'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Keyboards'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Audifonos'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Almacenamiento'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Ventiladores'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Routers'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        Categorie::create([
            'name' => 'Switch'
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 1,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 2,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 3,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 4,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 5,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 6,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 7,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 8,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 9,
            'registered_at' => now()
        ]);
        // Creacion de un nuevo registro en la tabla correspondiente
        DB::table('categories_products')->insert([
            'categories_id' => 3,
            'products_id' => 10,
            'registered_at' => now()
        ]);
    }
}
