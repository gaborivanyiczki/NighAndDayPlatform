<?php

namespace App\Repository\Eloquent;

use App\Repository\UserRepositoryInterface;
use App\User;
use Illuminate\Database\Eloquent\Model;


class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getActiveUsers()
    {
        return $this->model->where('Active', 1)
                            ->select('id', 'firstname', 'lastname')
                            ->get();
    }
}
