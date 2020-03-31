<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\SettingsRepository;

class ContactComposer
{
    protected $settings;

    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings;
    }

    public function compose($view)
    {
        $view->with('data', $this->settings->getContactSettings());
    }
}
