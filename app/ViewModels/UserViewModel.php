<?php

namespace App\ViewModels;

use App\User;
use Spatie\ViewModels\ViewModel;

class UserViewModel extends ViewModel
{
    public $fullname;
    public $email;
    public $telephone;
    public $subscriptions;
    public $defaultAddresses;

    public function __construct($user, $userAddresses)
    {
        $this->fullname = $user->firstname." ".$user->lastname;
        $this->email = $user->email;
        $this->telephone = $user->telephone;
        $this->subscriptions = $user->newsletter;
        $this->defaultAddresses = $userAddresses;
    }

    public function user(): User
    {
        return $this->user ?? new User();
    }
}
