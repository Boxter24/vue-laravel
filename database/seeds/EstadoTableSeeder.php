<?php

use Illuminate\Database\Seeder;
use App\Estado;
use App\Pais;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::truncate(); // Evita duplicar datos

        $pais = new Pais();
        $pais->pais = "Venezuela";
        $pais->save();

        $estado = new Estado();

        $estado->name = "Carabobo";        
        $estado->pais_id = 1;
        $estado->save();

        
    }
}
