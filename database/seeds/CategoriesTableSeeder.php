<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'Name' => 'Saltele',
                'Slug' => 'saltele',
                'Active' => 1,
                'CreatedUser' => 'Gabor',
                    'children' => [
                        [
                            'Name' => 'Saltele Tehnologie 1',
                            'Slug' => 'saltea-tehnologie-1',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Saltele Tehnologie 2',
                            'Slug' => 'saltea-tehnologie-2',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Saltele Tehnologie 3',
                            'Slug' => 'saltea-tehnologie-3',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Saltele Tehnologie 4',
                            'Slug' => 'saltea-tehnologie-4',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Saltele Tehnologie 5',
                            'Slug' => 'saltea-tehnologie-5',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                    ],
                ],
                [
                    'Name' => 'Perne',
                    'Slug' => 'perne',
                    'Active' => 1,
                    'CreatedUser' => 'Gabor',
                        'children' => [
                        [
                            'Name' => 'Perne Tehnologie 1',
                            'Slug' => 'perne-tehnologie-1',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Perne Tehnologie 2',
                            'Slug' => 'perne-tehnologie-2',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Perne Tehnologie 3',
                            'Slug' => 'perne-tehnologie-3',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                    ],
                ],
                [
                    'Name' => 'Pilote',
                    'Slug' => 'pilote',
                    'Active' => 1,
                    'CreatedUser' => 'Gabor',
                        'children' => [
                        [
                            'Name' => 'Pilote Tehnologie 1',
                            'Slug' => 'pilote-tehnologie-1',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Pilote Tehnologie 2',
                            'Slug' => 'pilote-tehnologie-2',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Pilote Tehnologie 3',
                            'Slug' => 'pilote-tehnologie-3',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                    ],
                ],
                [
                    'Name' => 'Alte tipuri de produse 1',
                    'Slug' => 'alte-tipuri-de-produse-1',
                    'Active' => 1,
                    'CreatedUser' => 'Gabor',
                        'children' => [
                        [
                            'Name' => 'Produs Tehnologie 1',
                            'Slug' => 'produs-tehnologie-1',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Produs Tehnologie 2',
                            'Slug' => 'produs-tehnologie-2',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Produs Tehnologie 3',
                            'Slug' => 'produs-tehnologie-3',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                    ],
                ],
                [
                    'Name' => 'Alte tipuri de produse 2',
                    'Slug' => 'alte-tipuri-de-produse-2',
                    'Active' => 1,
                    'CreatedUser' => 'Gabor',
                        'children' => [
                        [
                            'Name' => 'Produs Tehnologie 1',
                            'Slug' => 'produs-tehnologie-1',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Produs Tehnologie 2',
                            'Slug' => 'produs-tehnologie-2',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                        [
                            'Name' => 'Produs Tehnologie 3',
                            'Slug' => 'produs-tehnologie-3',
                            'Active' => 1,
                            'CreatedUser' => 'Gabor',
                        ],
                    ],
                ],
        ];
        foreach($categories as $category)
        {
            \App\Category::create($category);
        }
    }
}
