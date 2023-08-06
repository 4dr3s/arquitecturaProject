<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'name' => 'Celulares'
        ]);
        Categorie::create([
            'name' => 'Computadoras de Escritorio'
        ]);
        Categorie::create([
            'name' => 'Laptops'
        ]);
        Categorie::create([
            'name' => 'Smarthphones'
        ]);
        Categorie::create([
            'name' => 'Tablets'
        ]);
        Categorie::create([
            'name' => 'Mouses'
        ]);
        Categorie::create([
            'name' => 'Keyboards'
        ]);
        Categorie::create([
            'name' => 'Audifonos'
        ]);
        Categorie::create([
            'name' => 'Almacenamiento'
        ]);
        Categorie::create([
            'name' => 'Ventiladores'
        ]);
        Categorie::create([
            'name' => 'Routers'
        ]);
        Categorie::create([
            'name' => 'Switch'
        ]);
    }
}
