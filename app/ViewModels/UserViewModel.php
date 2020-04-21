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

    public function __construct($user, $userAddresses = 0)
    {
        $this->fullname = $user->firstname." ".$user->lastname;
        $this->email = $user->email;
        $this->telephone = $user->telephone;
        $this->subscriptions = $user->newsletter;
        if($userAddresses != 0){
            $this->defaultAddresses = $userAddresses;
        }
    }

    public function user(): User
    {
        return $this->user ?? new User();
    }
}
