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
}
