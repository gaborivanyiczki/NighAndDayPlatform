<?php

namespace App\Repository\Eloquent;

use App\FaqQuestions;
use App\Repository\FaqRepositoryInterface;
use Illuminate\Database\Eloquent\Model;


class FaqRepository extends BaseRepository implements FaqRepositoryInterface
{
    protected $model;

    public function __construct(FaqQuestions $question)
    {
        $this->model = $question;
    }

    public function getFaqQuestions()
    {
        return $this->model->where('active', 1)
                            ->select('question', 'description')
                            ->get();
    }

}
