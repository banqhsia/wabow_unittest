<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Service\Login\LoginService;

class LoginServiceTest extends TestCase
{
    public function test_should_login_success()
    {
        $target = new LoginService;

        $expected = 'Login success';
        $actual = $target->login('abc@example.com', md5('abc123'));

        $this->assertEquals($expected, $actual);
    }
}
