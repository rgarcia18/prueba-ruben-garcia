<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //current date
        $now = \Carbon\Carbon::now()->toDateTimeString();
        
        DB::table('products')->insert([
            [
                'name' => 'Cancha de baloncesto',
                'description' => 'Cancha de baloncesto pequeña que se acopla a la pared con balón, Incluye 4 piezas: 1 Tablero pequeño, 1 Aro, 1 Malla y 1 Balón pequeño', 
                'route_image' => 'img/products/product001.jpg', 
                'price' => 45000,
                'created_at'=>$now,
                'updated_at'=>$now,
            ],
            [
                'name' => 'Kit Mancuernas Pesas 20 Kilos 12 Discos',
                'description' => 'Es un organizador tipo maletín, para fácil desplazamiento y manipulación 2 barras para mancuernas en acero cromado con dos seguros roscados cada una',
                'route_image' => 'img/products/product002.jpg', 
                'price' => 198800,
                'created_at'=>$now,
                'updated_at'=>$now,                
            ],
            [
                'name' => 'Kit Rueda Abdominal',
                'description' => 'Equipo de entrenamiento 7 en 1: más estable con 4 ruedas de ejercicio abdominal con barras de flexión, cuerda de saltar, bandas de resistencia',
                'route_image' => 'img/products/product003.jpg', 
                'price' => 160000,
                'created_at'=>$now,
                'updated_at'=>$now,                
            ],            
            [
                'name' => 'Barra De Ejercicios',
                'description' => 'Máquina multifuncional Force Diseño Premium Precio de lanzamiento. Paquete incluye: 2 barras laterales 1 barra superior 1 barra inferior, 3 cojines, 2 Ganchos de sujeción 4 chazos 4 tornillos',
                'route_image' => 'img/products/product004.jpg', 
                'price' => 139000,
                'created_at'=>$now,
                'updated_at'=>$now,                
            ],
            [
                'name' => 'Mancuerna Pesa Rusa 6kg',
                'description' => 'Mancuerna pesa rusa 6kg. Nuevo diseño', 
                'route_image' => 'img/products/product005.jpg', 
                'price' => 61000,
                'created_at'=>$now,
                'updated_at'=>$now,                
            ],
            [
                'name' => 'Bicicleta Estática Spinning Gimnasio',
                'description' => 'Home Sale trae para ti, Bicicleta Spinning con Monitor Frecuencia Cardiaca 13 Kgs La bicicleta funciona con transmisión por correa y piñón fijo',
                'route_image' => 'img/products/product006.jpg', 
                'price' => 698900,
                'created_at'=>$now,
                'updated_at'=>$now,                
            ],
        ]);
    }
}
