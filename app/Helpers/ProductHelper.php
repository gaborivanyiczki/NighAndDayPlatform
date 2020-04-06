<?php

namespace App\Helper;

class ProductHelper
{
    public static function getSortingAttributes($sort)
    {
        $sortArray = array();

        switch ($sort) {
            case 'priceAsc':
                $sortArray = ['SortColumn' => 'Price', 'SortBy' => 'asc'];
                break;
            case 'priceDesc':
                $sortArray = ['SortColumn' => 'Price', 'SortBy' => 'desc'];
                break;
            case 'newest':
                $sortArray = ['SortColumn' => 'created_at', 'SortBy' => 'desc'];
                break;
            case 'oldest':
                $sortArray = ['SortColumn' => 'created_at', 'SortBy' => 'asc'];
                break;
            default:
                $sortArray = ['SortColumn' => 'created_at', 'SortBy' => 'desc'];
                break;
        }

        return $sortArray;
    }
}
