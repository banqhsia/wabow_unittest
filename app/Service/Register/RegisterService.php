<?php

namespace App\Service\Register;

use App\User;
use App\Foundation\Request;

class RegisterService
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var User
     */
    private $user;

    /**
     * Construct
     *
     * @param Request $request
     * @param User $user
     */
    public function __construct(Request $request, User $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    /**
     * 註冊使用者
     *
     * @return bool
     */
    public function register()
    {
        $username = $this->request->getUsername();
        $usernameCount = strlen($username);

        if ($usernameCount < 5) {
            return "Username too short.";
        }

        var_dump($username);

        $gender = $this->request->getGender();

        if (1 !== $gender || 2 !== $gender) {
            return "Gender not allowed.";
        }

        $user = [
            'username' => $this->request->getUsername(),
            'gender' => $this->request->getGender(),
        ];

        $register = $this->user->createUser($user);

        if ($register) {
            return "註冊成功";
        }

        return "註冊失敗";
    }
}
