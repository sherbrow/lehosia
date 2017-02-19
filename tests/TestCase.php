<?php

abstract class TestCase extends Laravel\Lumen\Testing\TestCase
{
    
    public function setUp() {
        parent::setUp();
        
        $this->baseUrl = $this->baseUrl . env('BASE_URL', '');
    }
    
    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication()
    {
        return require __DIR__.'/../app.php';
    }
    
}
