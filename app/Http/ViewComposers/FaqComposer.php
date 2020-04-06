<?php

namespace App\Http\ViewComposers;

use App\Repository\Eloquent\FaqRepository;

class FaqComposer
{
    protected $question;

    public function __construct(FaqRepository $question)
    {
        $this->question = $question;
    }

    public function compose($view)
    {
        $view->with('data', json_encode($this->question->getFaqQuestions()));
    }
}
