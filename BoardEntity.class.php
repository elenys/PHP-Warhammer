<?php

	/**
	* 
	*/
	abstract class BoardEntity
	{
		protected $name;
		protected $curHull;
		protected $sprite;
		protected $nbrEntity;
		protected $width;
		protected $leght;

		protected $initHull;
		protected $z1Head = array();
		protected $z2Head = array();
		protected $z1Tail = array();
		protected $z2Tail = array();
		protected $direction;

		abstract function __construct();
		
		public function getCurHull() {
			return $curHull;
		}
	}

?>