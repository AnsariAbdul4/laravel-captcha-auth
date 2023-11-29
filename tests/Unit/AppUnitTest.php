<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class AppUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_home()
    {
        // Home page test case
        $response = $this->get('/');
        $response->assertOk();
        $response->assertViewIs('home.index');
    }

    public function test_registration(){
        // Registration page test case
        $response = $this->get('/register');
        $response->assertOk();
        $response->assertViewIs('auth.register');
    }
}
