<?php
	
	/**
	* 
	*/

	require_once 'BoardEntity.class.php';
	
	abstract class Ship extends BoardEntity
	{
		
		protected $used;
		protected $momentum;
		protected $initShield;
		protected $initPower;
		protected $initSpeed;
		protected $curShield;
		protected $curSpeed;
		protected $curPower;
		protected $isMoving;
		protected array $weapons;

		abstract function __construct();
		
		protected function repair($nbrDice) {
			if ($nbrDice <= $this->$curPower)
			{
				while ($nbrDice and $this->curHull < $this->initHull)
				{	
					$dice = getDiceValue();
					if ($dice == 6)
					{
						$totalRepared += $dice;
						$this->$curHull++;
					}
				}
				loosPower($nbrDice);
				return $totalRepared;
			}
			return False;
		}

		protected function move () {

		}

		protected function rotate () {

		}

		protected function collide () {

		}

		protected function loosPower($value) {
			$this->curPower -= $value;
			if ( $this->curPower < 0 )
				print("Erreur, Curent Power can't be negativ you should add some verification");
		}

		public function canUseRepair(){
			if ($this->$isMoving === False && $this->$curPower > 0)
				return True;
			else
				return False;
		}

		public function getDamage ($nbrDice){


		}
	}

?>