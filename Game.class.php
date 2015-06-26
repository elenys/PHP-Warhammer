<?php

	/**
	* 
	*/

	require_once 'Player.class.php';

	final class Game
	{
		private $gameName;
		private $nbrPlayer;
		private $endGame;
		private $endTour;
		private $shipAvailable;
		private $playerAvailable;
		private $tabPlayer = array();

		function __construct($arg)
		{
			$this->tabPlayer[] = new Player ($arg["player1Ship"]);
			$this->tabPlayer[] = new Player ($arg["player2Ship"]);
			$this->nbrPlayer = 2;
		}

		function game ()
		{
			$this->playerAvailable = $this->nbrPlayer;
			while ($this->endGame === False)
			{
				foreach ($this->tabPlayer as $player)
				{
					if ($player->hasShip() === False)
						$this->playerAvailable--;
				}
				if ($this->playerAvailable == 1)
					$this->endGame;
				else
					$this->tour();
			}
			print "GAME IS OVER";
		}

		function tour ()
		{
			$this->shipAvailable = $this->nbrPlayer;
			$this->initTour();
			while ($this->endTour)
			{
				foreach ($this->tabPlayer as $player)
				{
					$this->phase($player);
					if ($player->hasShipAvailable() === False)
						$this->shipAvailable--;
				}
				if ($this->shipAvailable == 0)
					$this->endTour = True;
			}	
		}

		function phase ($player)
		{
			$player->orderPhase();
			$player->movePhase();
			$player->attackPhase();
		}

		function initTour()
		{
			foreach ($this->tabPlayer as $player)
				$player->initShip();
		}
	}
?>