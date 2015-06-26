<?php

	/**
	* 
	*/
	abstract class BoardEntity
	{
		protected $name;
		protected $curHull;
		protected $sprite;
		protected $player;
		protected $width;
		protected $leght;

		protected $initHull;
		protected $z1Head = array();
		protected $z2Head = array();
		protected $z1Tail = array();
		protected $z2Tail = array();
		protected $direction;

		abstract function __construct();
		

	}

?>