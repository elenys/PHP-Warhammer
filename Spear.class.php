<?php

/*
**    Spear.class.php
*/

require_once("Weapon.class.php");

	class Spear extends Weapon {

		public function __construct() {
			$this->name = "Spear";
			$this->initCharge = 0;
			$this->shortRange = 30;
			$this->midRange = 60;
			$this->longRange = 90;
			parent::__construct();
		}
	}

?>
