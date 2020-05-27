# Robot Name

Manage a robot factory.

The factory produces two types of robots: 
  - Flying robots, that can fly
  - Walking robots, that can walk

When robots come off the factory floor, they have no name.

The first time you boot them up, a random name is generated in the format of :
  - two uppercase letters prefix defining the type of robot
    - FL for flying robots
    - WK for walking robots
  - followed by three digits
  - followed by 2 uppercase letters

Ex: FL837RX or WK811BC...

Every once in a while we need to reset a robot to its factory settings,
which means that their name gets wiped. The next time you ask, it will
respond with a new random name.

The names must be random: they should not follow a predictable sequence.
Random names means a risk of collisions. Your solution must ensure that
every existing robot has a unique name.

**Your solution should make possible:**
 - the making of robots of both types
 - make flying robots fly (a simple `echo` is sufficient)
 - make walking robots walk (a simple `echo` is sufficient)
 - get the name of each robots
 - uniqueness of robots name
 - reset each robots
 
You can create as many files, classes, methods... as you want. (in this folder)
Make your solution as elegant and maintainable as possible, following the **SOLID** principles.
<?php
class Robot
{
	private $type;
	private $name;
	private static $names = [];
	
	function __construct($type) 
	{
	    $this->type = $type;
		$this->name = $this->reset();
	}
	public function reset()
	{
		$rand_number = sprintf("%03d",rand(0,999));
		$unique = false;
		while (!$unique) {
			$name = $this->type.$rand_number.$this->random();
			$unique = $this->isUnique($name);
		}
		$this->replaceName($name);
		
	}
	/**
     * @returns {string}
     */
	public function getName(): string		
	{
		return $this->name;
	}
	/**
     * @param name  string
	 * @returns {bool}
     */
	private function isUnique(String $name): bool	
	{
		if(in_array($name,self::$names))
			return false;
		else 
			return true;
	}
	/**
     * @param name  string
     */
	private function replaceName(String $name)
	{
		$index = array_search($this->name, self::$names);
		unset(self::$names[$index]);
		$this->name = $name;
		self::$names[] = $this->name;
	}
	private function random(): string
	{
		$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
		$rand = '';
		foreach (array_rand($seed, 2) as $k) $rand .= $seed[$k];
		return $rand;
	}
}
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
?>

**Bonus:** Add unit tests to your solution.
