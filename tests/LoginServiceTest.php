<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Service\Login\LoginService;
use App\User;
use App\GlobalUser;
use App\UserInterface;

class LoginServiceTest extends TestCase
{
    public function test_should_login_success()
    {

        $user = $this->createMock(UserInterface::class);

        $user->method('isExists')->willReturn(true);
        $user->method('getPassword')->willReturn('abc123');

        $target = new LoginService($user);

        $expected = 'Login success';
        $actual = $target->login('abc@example.com', 'abc123');

        $this->assertEquals($expected, $actual);
    }
}
