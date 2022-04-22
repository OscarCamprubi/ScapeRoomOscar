<?php

namespace Database\Seeders;

use App\Models\Sala;
use Database\Factories\SalaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::factory(10)->create();
    }
}
