<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $source = ['friends', 'work', 'family', 'customers'];
        for ($i = 0; $i < 10; $i++) {
            DB::table('contact')->insert([
                'prenom' => "Prenom" . $i,
                'nom' => 'Nom' . $i,
                'email' => "PrenomNom" . $i .  '@gmail.com',
                'source' => $source[array_rand($source)]
            ]);
        }
    }
}
