<?php

namespace Tests;

use App\User;
use App\Foundation\Request;
use PHPUnit\Framework\TestCase;
use App\Service\Register\RegisterService;

class RequestTest extends TestCase
{
    public function setUp()
    {
        $this->user = $this->createMock(User::class);
        $this->request = $this->createMock(Request::class);

        $this->target = new RegisterService($this->request, $this->user);
    }

    public function test_should_alert_when_username_short_than_4()
    {
        $this->request->method('getUsername')->willReturn('Ben');

        $expected = "Username too short.";
        $actual = $this->target->register();

        $this->assertEquals($expected, $actual);
    }

    public function test_should_alert_when_gender_is_not_1_or_2()
    {

        $this->request->method('getUsername')->willReturn('Benyihsia');
        $this->request->method('getGender')->willReturn(6);

        $expected = "Gender not allowed.";
        $actual = $this->target->register();

        $this->assertEquals($expected, $actual);
    }

    public function test_should_call_createUser_with_user_data()
    {
        $this->request->method('getUsername')->willReturn('Benyihsia');
        $this->request->method('getGender')->willReturn(1);

        $this->user->expects($this->once())->method('createUser')->with([
            'username' => 'Benyihsia',
            'gender' => 1,
        ]);

        $this->target->register();
    }
}
