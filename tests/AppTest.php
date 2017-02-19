<?php

use Symfony\Component\DomCrawler\Crawler;

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
    
    public function testIndex()
    {
        $this->get('/');
        
        $crawler = new Crawler($this->response->getContent());
        
        foreach ($crawler->filterXPath('//a') as $link) {
            $this->assertEquals($this->baseUrl.'/'.$link->nodeValue, $link->getAttribute('href'));
        }
    }
}