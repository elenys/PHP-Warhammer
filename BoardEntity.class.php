<?php

	/**
	* 
	*/
	abstract class BoardEntity
	{
		protected		$name;
		protected		$curHull;
		protected		$sprite;
		protected 		$player;
		protected 		$width;
		protected 		$leght;

		protected 		$initHull;
		protected array $z1Head;
		protected array $z2Head;
		protected array $z1Tail;
		protected array $z2Tail;
		protected 		$direction;

		abstract function __construct();
	}

?>