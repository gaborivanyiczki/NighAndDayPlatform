<?php

namespace App\ViewModels;

use App\User;
use Spatie\ViewModels\ViewModel;

class UserDetailsViewModel extends ViewModel
{
    public $firstname;
    public $lastname;
    public $telephone;

    public function __construct($user)
    {
        $this->firstname = $user->firstname;
        $this->lastname = $user->lastname;
        $this->telephone = $user->telephone;
    }

    public function user(): User
    {
        return $this->user ?? new User();
    }
}
