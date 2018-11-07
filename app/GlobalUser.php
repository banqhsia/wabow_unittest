<?php

namespace App;

class GlobalUser implements UserInterface
{
    public function isExists($email)
    {
        return true;
    }

    public function getPassword()
    {
        return md5('11111' . uniqid());
    }
}
