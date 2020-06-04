<?php

namespace App\ViewModels;

use App\ConfiguratorElement;
use Spatie\ViewModels\ViewModel;

class ConfiguratorViewModel extends ViewModel
{
    public $sponge;
    public $cover;

    public function __construct($data)
    {
        $this->setData($data);
    }

    public function setData($data)
    {
        foreach ($data as $key => $value)
        {
            $id = intval($value);
            switch ($key) {
                case 'configurator_sponge':
                    $this->sponge = ConfiguratorElement::where('id', $id)->select('Name')->first()->Name;
                    break;
                case 'configurator_cover':
                    $this->cover = ConfiguratorElement::where('id', $id)->select('Name')->first()->Name;
                    break;
            }
        }
    }
}
