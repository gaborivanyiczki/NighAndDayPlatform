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

    public function getWidgetBrands()
    {
        return $this->model->where([['WidgetShow', 1],['Active', 1]])
                                        ->select('Name','Slug','New','LogoPath as Path','LogoFile as Image')
                                        ->get()->toArray();
    }

    public function getBrandBySlug($slug)
    {
        return $this->model->where('Slug', $slug)
                            ->select('Name','Slug','New','LogoPath as Path','LogoFile as Image')
                            ->first();
    }
}
