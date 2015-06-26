<?php
	
	/**
	* 
	*/

	require_once 'BoardEntity.class.php';
	require_once 'Direction.class.php';
	
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
		protected $hasInertie;
		protected array $weapons;

		abstract function __construct();
		
		private function changeShipPos ($totalMoove)
		{
			$dir = $this->getDir();
			$ret = entityIsOnTrajectory($totalMoove, $dir, $this->z1Head, $this->z2Head);
			if ($newTotalMoove !== False)
			{
				$totalMoove = $ret['newMoove'];
				$this->collide($getEntity($ret['entityNbr']));
			}
			if ($dir == "NORTH")
			{
				$this->z1Tail['y'] += $totalMoove;
				$this->z2Tail['y'] += $totalMoove;
				$this->z1Head['y'] += $totalMoove;
				$this->z2Head['y'] += $totalMoove;
			}
			else if ($dir == "SOUTH")
			{
				$this->z1Tail['y'] -= $totalMoove;
				$this->z2Tail['y'] -= $totalMoove;
				$this->z1Head['y'] -= $totalMoove;
				$this->z2Head['y'] -= $totalMoove;
			}
			else if ($dir == "EAST")
			{
				$this->z1Tail['x'] += $totalMoove;
				$this->z2Tail['x'] += $totalMoove;
				$this->z1Head['x'] += $totalMoove;
				$this->z2Head['x'] += $totalMoove;
			}
			else if ($dir == "WEST")
			{
				$this->z1Tail['x'] -= $totalMoove;
				$this->z2Tail['x'] -= $totalMoove;
				$this->z1Head['x'] -= $totalMoove;
				$this->z2Head['x'] -= $totalMoove;
			}
			else
				print ("Wrong direction FORMAT");
			if (isOutOfTheMap($this->z1Tail, $this->z2Tail, $this->z1Head, $this->z2Head))
				$this->shipDestroyed();
		}

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
/*FAUX A REVOIR*/
		protected function moove ($value) {
			if ($this->curSpeed + $this->curPower > $value)
			{
				$totalMoove
				$this->isMoving = True;
				while ($this->curSpeed > 0 and $value)
				{
					$this->curSpeed--;
					$value--;
					$totalMoove++;
				}
				while ($this->curPower > 0 and $value)
				{
					$this->curPower--;
					$value--;
					$totalMoove++;
				}
				if ($this->curSpeed > 0)
					$this->hasInertie = True;
				$this->changeShipPos($totalMoove);
			}
			// print("Pas assez de point de mouvement et de puissance pour se deplacer")
		}

		protected function rotate () {

		}

		protected function collide ($otherEntity) {
			$this->changeMovingStatus(False);
			if (property_exists($otherEntity, $isMoving) == True)
				$otherEntity->changeMovingStatus(False);
			$tmpHull = $this->curHull;
			$this->getDamage($otherEntity->getCurHull());
			$otherEntity->getDamage($tmpHull);
		}

		protected function loosPower($value) {
			$this->curPower -= $value;
			if ( $this->curPower < 0 )
				print("Erreur, Curent Power can't be negativ you should add some verification");
		}

		public function canUseRepair(){
			if ($this->isMoving === False && $this->curPower > 0)
				return True;
			else
				return False;
		}

		public function getDamage ($dammage)
		{
			if ($this->curShield > 0)
			{
				$shield = $dammage;
				while ($this->curShield and $dammage)
				{

					$this->curShield--;
					$dammage--;
				}
				// Le bouclier a absorber $shield - $dammage
			}
			$this->curHull -= $dammage;
			/*if ($this->curHull <= 0)
				$this->shipDestroyed();*/
			// le vaisseau a subis $dammage;
		}

		public function changeMovingStatus($newStatus) {
			$isMoving = $newStatus;
		}

	}

?>