<?php

namespace Carousel\Id;

use Carousel\Id\AbstractId;

class IdGeneratorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test that true does in fact equal true
     */
    public function setup()
    {
        $this->ww = new WW;
        $this->toyota = new Toyota;
    }
    /**
    * make sure id's are not equals 
    *
    * @test
    */
    public function idsAreNotEqual()
    {
        $this->assertTrue($this->ww->getId() != $this->toyota->getId());
    }
}

class WW
{
    protected $id;
    public function __construct()
    {
        $this->id = CarId::generate();
    }
    public function getId()
    {
        return $this->id;
    }
}
class Toyota
{
    protected $id;
    public function __construct()
    {
        $this->id = CarId::generate();
    }
    public function getId()
    {
        return $this->id;
    }
    
}
class CarId extends AbstractId
{
}
