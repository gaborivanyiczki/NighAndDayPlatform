<?php

namespace App\Repository\Eloquent;

use App\GlobalSettings;
use App\Repository\SettingsRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class SettingsRepository extends BaseRepository implements SettingsRepositoryInterface
{
    protected $model;

    public function __construct(GlobalSettings $settings)
    {
        $this->model = $settings;
    }

    public function getLayoutSettings()
    {
        return $this->model->where('filter','home')->get();
    }

}
