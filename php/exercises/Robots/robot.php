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