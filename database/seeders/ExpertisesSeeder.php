<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpertisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $names = [
            ['id'=> 1, 'name' => 'Artes plásticas'],
            ['id'=> 2, 'name' => 'Teatro'],
            ['id'=> 3, 'name' => 'Música'],
            ['id'=> 4, 'name' => 'Danza'],
            ['id'=> 5, 'name' => 'Cocina tradicional'],
            ['id'=> 6, 'name' => 'Juegos tradicionales'],
            ['id'=> 7, 'name' => 'Promoción de lectura']
        ]; 
        foreach ($names as $name) {
            DB::table('expertises')->insert($name);
        }
    }
}
