<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Service\Login\LoginService;

class LoginServiceTest extends TestCase
{
    public function test_should_login_success()
    {
        $target = new LoginServiceForTest;

        $expected = 'Login success';
        $actual = $target->login('abc@example.com', 'Happy');

        $this->assertEquals($expected, $actual);
    }
}


class FakeUser extends \App\User
{
    public function isExists($email)
    {
        return true;
    }

    public function getPassword()
    {
        return 'Happy';
    }
}

class LoginServiceForTest extends LoginService
{
    protected function getUser()
    {
        return new FakeUser;
    }
}

