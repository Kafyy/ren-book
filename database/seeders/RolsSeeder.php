<?php

namespace Database\Seeders;

use App\Models\Rols;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        schema::disableForeignkeyConstraints();
        Rols::truncate();
        schema::enableForeignkeyConstraints();

        $data=[
            'admin', 'client'
        ];

        foreach ($data as $value){
            Rols::insert([
                'name' => $value
            ]);
        }
    }
}
