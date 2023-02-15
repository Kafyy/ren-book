<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        schema::disableForeignkeyConstraints();
        Category::truncate();
        schema::enableForeignkeyConstraints();

        $data=[
            'action', 'romance', 'fiksi', 'horror'
        ];

        foreach ($data as $value){
            Category::insert([
                'name' => $value
            ]);
        }
    }
}
