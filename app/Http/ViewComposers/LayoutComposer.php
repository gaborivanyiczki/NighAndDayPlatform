<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\SettingsRepository;
use App\Repository\SettingsRepositoryInterface;

class LayoutComposer
{
    protected $settings;

    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings;
    }

    public function compose($view)
    {
        $view->with('data', $this->settings->getLayoutSettings());
    }
}
