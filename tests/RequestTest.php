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
        $this->givenUsername('Ben');

        $this->registerShouldBe('Username too short.');
    }

    public function test_should_alert_when_gender_is_not_1_or_2()
    {
        $this->givenUsername('Benyihsia');
        $this->givenGender(6);

        $this->registerShouldBe('Gender not allowed.');
    }

    public function test_should_call_createUser_with_user_data()
    {
        $this->givenUsername('Benyihsia');
        $this->givenGender(1);

        $this->createUserShouldBeCalledWith(1, [
            'username' => 'Benyihsia',
            'gender' => 1,
        ]);

        $this->target->register();
    }

    private function createUserShouldBeCalledWith($times, $value)
    {
        $this->user->expects($this->exactly($times))
            ->method('createUser')
            ->with($value);
    }

    private function givenUsername($name)
    {
        $this->request->method('getUsername')->willReturn($name);
    }

    private function givenGender($gender)
    {
        $this->request->method('getGender')->willReturn($gender);
    }

    private function registerShouldBe($message)
    {
        $this->assertEquals($message, $this->target->register());
    }
}
