<?php

/**
 * Magic methods in PHP
 */
class Hotel
{
    /**
     * Hotel location
     *
     * @var mixed $location
     */
    private $location;
    /**
     * Hotel country
     *
     * @var mixed $country
     */
    public $country;

    public function __construct()
    {
        $this->country = 'Germany';
    }

    /**
     * Triggered when invoking inaccessible methods in an object context
     *
     * @param mixed $methodName
     * @param mixed $args
     */
    public function __call($methodName, $args)
    {
        return $this->hotelName();
    }

    /**
     * Triggered when invoking inaccessible methods in an static context
     *
     * @param mixed $methodName
     * @param mixed $args
     */
    public static function __callStatic($methodName, $args)
    {
        return self::info();
    }

    /**
     * Utilized for reading data from inaccessible properties
     *
     * @param mixed $property
     */
    public function __get($property)
    {
        if (isset($this->$property)) {
            return $this->$property;
        } else {
            return $property . ' unknown' . "\n";
        }
    }

    /**
     * Run when writing data to inaccessible properties
     *
     * @param mixed $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    /**
     * Allows a class to decide how it will react when it is treated like a string
     */
    public function __toString()
    {
        return 'Hotel to string';
    }

    /**
     * Serialize() checks if your class has a function with the magic name __sleep(). If so, that function is executed prior to any serialization
     */
    public function __sleep()
    {
        return ["country"];
    }

    /**
     * Method is called when a script tries to call an object as a function
     */
    public function __invoke()
    {
        echo 'Calling object as function' . "\n";
    }

    public function hotelName()
    {
        return 'Hilton';
    }

    public function info()
    {
        return [
            'rooms' => 120
        ];
    }
}

//__construct
$hotel = new Hotel;
//__get
echo $hotel->size;
//__invoke
$hotel();
//__set
$hotel->location = 'Berlin';
//__call                     //__get                      //__callStatic
echo $hotel->name() . '/' . $hotel->location . ' has ' . Hotel::getHotelSettings()['rooms'] . ' rooms' . "\n";
//__toString
echo $hotel . "\n";
//calling __sleep in the background
echo serialize($hotel);

/**
 * You only need to use magic if the object is indeed "magical". If you have a classic object with fixed properties then use setters and getters, they work fine.
    If your object have dynamic properties for example it is part of a database abstraction layer, and its parameters are  set at runtime then you indeed need the magic methods for convenience. 
 */
