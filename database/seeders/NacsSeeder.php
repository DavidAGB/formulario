<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            ['id'=> 1, 'name' => 'ALCALÁ'],
            ['id'=> 2, 'name' => 'ANDALUCÍA'],
            ['id'=> 3, 'name' => 'ANSERMANUEVO'],
            ['id'=> 4, 'name' => 'ARGELIA'],
            ['id'=> 5, 'name' => 'BOLÍVAR'],
            ['id'=> 6, 'name' => 'BUENAVENTURA'],
            ['id'=> 7, 'name' => 'BUGA']
        ];
        foreach ($names as $name) {
            DB::table('nacs')->insert($name);
        }
    }
}
