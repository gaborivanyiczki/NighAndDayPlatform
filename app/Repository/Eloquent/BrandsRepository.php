<?php

namespace App\Repository\Eloquent;

use App\Brand;
use App\Repository\BrandsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class BrandsRepository extends BaseRepository implements BrandsRepositoryInterface
{
    protected $model;

    public function __construct(Brand $brand)
    {
        $this->model = $brand;
    }

    public function getNavigationBrands()
    {
        return json_encode($this->model->select('Name','Slug','New')
                            ->get());
    }
}
