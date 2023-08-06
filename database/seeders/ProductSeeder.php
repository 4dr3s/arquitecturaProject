<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Portatil ASUS M415D Ryzen 5',
            'description' => 'Procesador AMD Ryzen 5 3500U Processor 2.1 GHz (2M Cache, up to 3.7 GHz, 4 cores) Gráficos  Gráficos Radeon Vega 8 Memoria DDR4 de 4 GB en placa, SO-DIMM DDR4 de 4 GB, Pantalla 14 FHD (1920 x 1080) 16:9, Disco Solido SSD M.2 NVMe PCIe® 3.0 de 256 GB',
            'stock' => 100,
            'unitPrice' => 530.00,
            'productImage' => 'Portatil ASUS M415D Ryzen 5.jpg'
        ]);
        Product::create([
            'name' => 'Portatil Asus VIVOBOOK M1502 Ryzen7',
            'description' => 'Procesador AMD Ryzen 7 4800H Hasta 4.0 GHZ, Memoria RAM 8GB, Disco Solido 512GB SSD. Pantalla  (15,6 Pulgadas), FHD (1920 x 1080). Gráficos AMD RADEON, Windows 11',
            'stock' => 100,
            'unitPrice' => 770.00,
            'productImage' => 'Portatil Asus VIVOBOOK M1502 Ryzen7.jpg'
        ]);
        Product::create([
            'name' => 'Portatil ASUS X413EA-EB2076 Core i5',
            'description' => 'Procesador  intel Core i5-1135G7 hasta 4,2 GHZ, Memoria RAM 8GB (Expandible hasta 16GB), Disco Solido SSD 256 GB M.2 NVMe, Pantalla  (14,0 pulgadas), FHD (1920 x 1080), Gráficos Intel Iris Xe, Bateria3 celdas y 42Wh, Windows 10(Compatible con Windows 11)',
            'stock' => 100,
            'unitPrice' => 645.00,
            'productImage' => 'Portatil ASUS X413EA-EB2076 Core i5.jpg'
        ]);
        Product::create([
            'name' => 'Portatil Dell Inspiron 15 3501 Core i3',
            'description' => 'Procesador Intel  Core 111G4 Hasta 4,1 Ghz, Memoria Ram 4 Gb (expandible hasta 16 Gb), Disco HDD 1Tb, Pantalla 14″ HD, Batería 3 celdas y 42 Wh, Gráficos UHD Intel, Windows 10 Pro (Actualizable Win 11), Portátil Dell Inspiron 15 3501 Core i3',
            'stock' => 100,
            'unitPrice' => 520.00,
            'productImage' => 'Portatil Dell Inspiron 15 3501 Core i3.jpg'
        ]);
        Product::create([
            'name' => 'Portatil Dell Latitude 3420 Core i3',
            'description' => 'Procesador Intel Core i3 1115G4 (3.0 Ghz hasta 4-0 Ghz), Memoria Ram 4 Gb, 2666 Mhz (1-4) hasta 16 Gb, Disco Mecánico  1Tb 5200 RPM, Pantalla  14″ HD (1366 x 768), Batería 3 celdas y 41 Wh, Windows 10 Pro (Actualizable Win 11)',
            'stock' => 100,
            'unitPrice' => 535.00,
            'productImage' => 'Portatil Dell Latitude 3420 Core i3.jpg'
        ]);
        Product::create([
            'name' => 'Portatil Gamer Asus Rog Striks G15 Ryzen 7',
            'description' => 'Procesador AMD Ryzen 7-4800H, 2.9 Ghz hasta 4.2 Ghz,Memoria Ram 16 Gb DDR4 , 3200 Mhz (2-8) hasta 32 Gb, T. Grafica Nvidia RTX 3050 4 Gb GDDR6, Disco SSD Nvme 512 Gb Expandible, Pantalla 15,6″ FHD (1920-1080) 144 Hz, Teclado Iluminado y cámara web Externa, Windows 10 Pro (Actualizable  Win 11)',
            'stock' => 100,
            'unitPrice' => 550.00,
            'productImage' => 'Portatil Gamer Asus Rog Striks G15 Ryzen 7.jpg'
        ]);
        Product::create([
            'name' => 'Portatil HP 15-dw3505la-CORE i3',
            'description' => 'Sin Descripcion',
            'stock' => 100,
            'unitPrice' => 530.00,
            'productImage' => 'Portatil HP 15-dw3505la-CORE i3.jpg',
            'estado' => 0
        ]);
        Product::create([
            'name' => 'Portatil HP 15-ef2511la',
            'description' => 'AMD Ryzen 5 5500U hasta 4,0 GHz, Gráficos AMD Radeon, Disco SSD NVMe M.2 256NGB, Memoria RAM DDR4 8GB (Hasta 16 GB), Pantalla HD 15,6″(1366 - 768), Baterís 3 celdas y 41 Wh, Windows 11',
            'stock' => 100,
            'unitPrice' => 640.00,
            'productImage' => 'Portatil HP 15-ef2511la.jpg'
        ]);
        Product::create([
            'name' => 'Portatil HP 240 G8 64X71LT - CORE i3',
            'description' => 'PROCESADOR CORE i3-1115G4 HASTA 4.1 GHz (11VA GENERACIÓN), MEMORIA RAM 8 GB (HASTA 16 GB), DISCO SSD NVMe M.2 256 GB, GRÁFICOS INTEL UHD, PANTALLA HD 14″ (1366 x 768), BATERÍA 3 CELDAS Y 41 Wh, WINDOWS 10, PORTÁTIL HP 240 G8 64X71LT - CORE i3',
            'stock' => 100,
            'unitPrice' => 390.00,
            'productImage' => 'Portatil HP 240 G8 64X71LT - CORE i3.jpg'
        ]);
        Product::create([
            'name' => 'Portatil Lenovo IdeaPad5 14ARE05 - Ryzen 7',
            'description' => 'Sin Descripcion',
            'stock' => 100,
            'unitPrice' => 530.00,
            'productImage' => 'Portatil Lenovo IdeaPad5 14ARE05 - Ryzen 7.jpg',
            'estado' => 0
        ]);
    }
}
