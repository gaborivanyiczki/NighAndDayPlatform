<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface FaqRepositoryInterface
{
    public function getFaqQuestions();
}
