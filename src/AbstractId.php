<?php namespace Carousel\Id;

use Ramsey\Uuid\Uuid;

abstract class AbstractId
{
    /**
     * generated id
     *
     * @var string
     */
    protected $id;
    private function __construct($id)
    {
        $this->id = $id;
    }
    /**
     * statically generate Uuid|string
     */
    public static function generate()
    {
        return new static(Uuid::uuid4());
    }
    /**
     * generate from user input
     *
     * @return id|string
     */
    public static function fromInput($id)
    {
        return new static($id);
    }
}
