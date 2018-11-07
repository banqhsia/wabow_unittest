<?php

namespace App\Foundation;

class Request
{
    public function getUsername()
    {
        return bin2hex(openssl_random_pseudo_bytes(rand(1, 5)));
    }

    public function getGender()
    {
        return rand(1, 8);
    }
}
