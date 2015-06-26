<?php
	/**
	*		Direction.class.php  
	*/
	class Direction
	{
		public static $way = array("NORD" => 0, "SOUTH" => 1, "EAST" => 2, "WEAST" => 3);
		private $curWay;
		
		function __construct($direction) {
			$this->$curWay = $direction; 
		}
		
		public function setDir($direction) {
			$this->$curWay = $direction; 
		}

		public function getDir() {
			return $this->curWay;
		}
	}
?>