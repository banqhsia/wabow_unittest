<?php

namespace Tests;

use App\User;
use App\Foundation\Request;
use PHPUnit\Framework\TestCase;
use App\Service\Register\RegisterService;

class RequestTest extends TestCase
{

    public function __construct()
    {
        $this->user = new User;
        $this->request = new Request;

        $this->target = new RegisterService($this->request, $this->user);
    }

    public function test_should_alert_when_username_short_than_4()
    {
        $expected = "Username too short.";
        $actual = $this->target->register();

        $this->assertEquals($expected, $actual);
    }

    public function test_should_alert_when_gender_is_not_1_or_2()
    {
        $expected = "Gender not allowed.";
        $actual = $this->target->register();

        $this->assertEquals($expected, $actual);
    }

}
