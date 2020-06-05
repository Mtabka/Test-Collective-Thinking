<?php 

use Robot;

class WalkingRobot extends Robot
{
	private static $type = 'WK';
	
	function __construct() 
	{
	    parent::__construct(self::$type);
        $this->name = $this->reset();
    }
	public function walk()
	{
		echo 'Yeah im walking!';
	}
}