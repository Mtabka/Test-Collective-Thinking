<?php 

use Robot;

class FlyingRobot extends Robot
{
	private static $type = 'FL';
	
	function __construct() 
	{
	    parent::__construct(self::$type);
		$this->name = $this->reset();
	}
	public function fly()
	{
		echo 'Yeah im flying!';
	}
}