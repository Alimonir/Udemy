<?php 

use PHPUnit\Framework\TestCase;
class AppTest extends TestCase{
    //given that we have getUrl fun
    public function testGetUrlParsesCorrectly() {
        $_GET['url'] = 'home/index/123';
        $app = new App();
        $reflection = new ReflectionClass($app);
        $method = $reflection->getMethod('getUrl');
        $method->setAccessible(true);
    
        $result = $method->invoke($app);
    
        $this->assertEquals(['home', 'index', '123'], $result);
    }
    //when call getUrl $_GET
    //then assert it to use in arr
}