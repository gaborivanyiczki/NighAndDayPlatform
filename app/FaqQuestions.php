<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqQuestions extends Model
{
    protected $table = 'faq_questions';

    protected $fillable=['question',
    'description',
    'active'];
}
