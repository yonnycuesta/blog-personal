<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AwardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $array = range(1, 10);

        // Arreglo de 10 iconos de logos diferentes
        $icons = [
            'fas fa-award',
            'fas fa-user',
            'fas fa-edit',
            'fas fa-eye',
            'fas fa-user-check',
            'fas fa-user-plus',
            'fas fa-user-minus',
            'fas fa-user-friends',
            'fas fa-user-tie',
            'fas fa-user-cog',
        ];

        foreach ($array as $key => $value) {
            DB::table('awards')->insert([
                'title' => $faker->name,
                'icon' => $icons[$key],
                'quantity' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
