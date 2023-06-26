<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cultural_rights;
use App\Models\Expertises;
use App\Models\Nacs;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(12)->create();
        $this->call(CulturalRightsSeeder::class);
        $this->call(ExpertisesSeeder::class);
        $this->call(NacsSeeder::class);
    }
}
