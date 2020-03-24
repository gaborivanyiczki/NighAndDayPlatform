<?php

use Illuminate\Database\Seeder;

class ProductStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'Name' => 'Stoc suficient',
                'Active' => 1,
                'MinStockNumber' => 10,
                'CreatedUser' => 'InitialSeed',

            ],
            [
                'Name' => 'Stoc limitat',
                'Active' => 1,
                'MinStockNumber' => 5,
                'CreatedUser' => 'InitialSeed',

            ],
            [
                'Name' => 'Stoc epuizat',
                'Active' => 1,
                'MinStockNumber' => 0,
                'CreatedUser' => 'InitialSeed',

            ],
        ];
        foreach($statuses as $status)
        {
            \App\ProductStatus::create($status);
        }
    }
}
