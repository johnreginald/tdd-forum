<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function __construct()
    {
        parent::__construct();
        // i don't need to follow EP-08 Solution by Adam Wathan
        // Laravel 5 have build-in Exception Handling
        $this->withExceptionHandling();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');

        $this->actingAs($user);

        return $this;
    }
}
