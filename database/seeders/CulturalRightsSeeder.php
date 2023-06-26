<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CulturalRightsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $names = [
            ['id'=> 1, 'name' => 'Identidad y patrimonios culturales'],
            ['id'=> 2, 'name' => 'Referencias a comunidades culturales'],
            ['id'=> 3, 'name' => 'Acceso y participación en la vida cultural'],
            ['id'=> 4, 'name' => 'Educación y formación'],
            ['id'=> 5, 'name' => 'Información y comunicación'],
            ['id'=> 6, 'name' => 'Cooperación cultural']
        ];

        foreach ($names as $name) {
            DB::table('cultural_rights')->insert($name);
        }
    }
}
