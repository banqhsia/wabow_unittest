<?php

namespace App\Service\Login;

use App\User;
use App\UserInterface;

class LoginService
{

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function login($email, $password)
    {
        if ($this->user->isExists($email) && $this->user->getPassword($email) === $password) {
            return "Login success";
        }

        return "Not exists";
    }
}
