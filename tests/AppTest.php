<?php

class AppTest extends TestCase 
{
    public function testHello()
    {
        $this->get('/hello');

        $this->assertEquals('world', $this->response->getContent());
    }
    
    public function testHelloJson()
    {
        $jsonResponse = $this->json('GET', '/helloJson');
        
        $jsonResponse->seeJson(['who' => 'world']);
    }
    
    public function test404()
    {
        $this->get('/is404');

        $this->assertEquals(404, $this->response->getStatusCode());
    }
}