<?php

require_once("Dice.class.php");

	abstract class Weapon {

		public				$name;
		public				$range;
		protected			$initCharge;
		const				shortRangeD = 4;
		const				midRangeD = 5;
		const				longRangeD = 6;
		protected			$curCharge;
		protected			$shortRange;
		protected			$midRange;
		protected			$longRange;
		static				$verbose = FALSE;

		public static function		doc() {
			return (file_get_contents("./Weapon.doc.txt"));
		}

		public function				__construct() {
			if ($this->verbose === TRUE)
				print ($this->name . "has been constructed." . PHP_EOL);
		}

		public function				__destruct() {
			if ($this->verbose === TRUE)
				print ($this->name . "has been destructed." . PHP_EOL);
		}

		public function				getRange() {
			return ($this->range);
		}

		public function				setRange($range) {
			$this->range = $range;
		}

		public function				subCharge() {
			if ($this->curCharge > 0) {
				$this->curCharge = $this->curCharge - 1;
				return (1);
			}
			return (0);
		}

		public function				addCharge() {
			$this->curCharge = $this->curCharge + 1;
			return (-1);
		}

		public function				getCharge() {
			return ($this->curCharge);
		}

		public function				reset() {
			$this->curCharge = initCharge;
		}

		private function			is_enfilade($dirV1, $dirV2) {
			if (($dirV1 === "NORTH" || $dirV1 === "SOUTH") && ($dirV2 === "NORTH" || $dirV2 === "SOUTH"))
				return (TRUE);
			else if (($dirV1 === "EAST" || $dirV1 === "WEST") && ($dirV2 === "EAST" || $dirV2 === "WEST"))
				return (TRUE);
			return (FALSE);
		}

		public function			shoot() {
			
		}
	}

?>
