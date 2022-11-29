<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Adds a simple setup that runs on every test caes.
     * 
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
        
        $this->withoutExceptionHandling();
    }
}
