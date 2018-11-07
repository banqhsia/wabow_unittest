<?php

namespace App\Service\Login;

use App\User;

class LoginService
{
    public function login($email, $password)
    {
        $user = $this->getUser();
        // $user = new User;

        if ($user->isExists($email) && $user->getPassword($email) === $password) {
            return "Login success";
        }

        return "Not exists";
    }

    protected function getUser()
    {
        return new User;
    }

}
