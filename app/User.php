<?php

namespace App;

class User
{
    public function isExists($email)
    {
        return false;
    }

    public function getPassword()
    {
        return md5(uniqid());
    }

    /**
     * 註冊使用者
     *
     * @param array $fields
     * @return bool
     */
    public function createUser($fields)
    {
        // create user implementations
    }
}
