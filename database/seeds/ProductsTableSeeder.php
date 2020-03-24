<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'Name' => 'Saltea Tehnologie 1 - 160x200',
                'Slug' => 'saltea-tehnologie-1-160x200',
                'Description' => 'Descriere saltea tehnologie 1 marime 160x200',
                'Price' => 1500.00,
                'DiscountPrice' => 1299.99,
                'Discount' => 30,
                'Quantity' => 10,
                'Status_ID' => 1,
                'Category_ID' => 2,
                'Active' => 1,
                'Favorite' => 1,
                'CreatedUser' => 'InitialSeed',

            ],
            [
                'Name' => 'Saltea Tehnologie 1 - 160x180',
                'Slug' => 'saltea-tehnologie-1-160x180',
                'Description' => 'Descriere saltea tehnologie 1 marime 160x180',
                'Price' => 1200.00,
                'Quantity' => 10,
                'Status_ID' => 1,
                'Category_ID' => 2,
                'Active' => 1,
                'Favorite' => 1,
                'CreatedUser' => 'InitialSeed',

            ],
            [
                'Name' => 'Saltea Tehnologie 1 - 180x200',
                'Slug' => 'saltea-tehnologie-1-180x200',
                'Description' => 'Descriere saltea tehnologie 1 marime 180x200',
                'Price' => 1400.00,
                'DiscountPrice' => 1199.99,
                'Discount' => 30,
                'Quantity' => 10,
                'Status_ID' => 1,
                'Category_ID' => 2,
                'Active' => 1,
                'Favorite' => 1,
                'CreatedUser' => 'InitialSeed',

            ],
            [
                'Name' => 'Perna Tehnologie 1',
                'Slug' => 'perna-tehnologie-1',
                'Description' => 'Descriere perna tehnologie 1 marime 60x20',
                'Price' => 500.00,
                'DiscountPrice' => 299.99,
                'Discount' => 30,
                'Quantity' => 10,
                'Status_ID' => 1,
                'Category_ID' => 8,
                'Active' => 1,
                'Favorite' => 1,
                'CreatedUser' => 'InitialSeed',

            ],
            [
                'Name' => 'Perna Tehnologie 2',
                'Slug' => 'perna-tehnologie-2',
                'Description' => 'Descriere perna tehnologie 2 marime 60x20',
                'Price' => 500.00,
                'DiscountPrice' => 299.99,
                'Discount' => 30,
                'Quantity' => 10,
                'Status_ID' => 1,
                'Category_ID' => 9,
                'Active' => 1,
                'Favorite' => 1,
                'CreatedUser' => 'InitialSeed',

            ],
        ];
        foreach($products as $product)
        {
            \App\Product::create($product);
        }
    }
}
