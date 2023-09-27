<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $data = [
            [
                'description' => 'Categories 1',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'description' => 'Categories 2',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'description' => 'Categories 3',
                'active' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Categories::insert($data);

        // Testing Dummy Categories
        Categories::factory(5)->create();
    }
}
