<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        $data = [
            [
                'title' => 'Livro 1',
                'price' => 2000,
                'description' => 'Livro 1 Description',
                'image' => null,
                'code' => 111,
                'reference' => 'ref-110',
                'stock_balance' => 600,
                'user_id' => 1,
                'categories_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Livro 2',
                'price' => 5000,
                'description' => 'Livro 2 Description',
                'image' => null,
                'code' => 111,
                'reference' => 'ref-110',
                'stock_balance' => 300,
                'user_id' => 1,
                'categories_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Livro 3',
                'price' => 77000,
                'description' => 'Livro 3 Description',
                'image' => null,
                'code' => 111,
                'reference' => 'ref-110',
                'stock_balance' => 200,
                'user_id' => 1,
                'categories_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        Product::insert($data);

        // Testing Dummy Products
        Product::factory(100)->create();
    }
}
