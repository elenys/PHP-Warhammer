<?php

	/**
	* 
	*/
	final class Player
	{
		public	$playerName;
		public static $nbrInstancePlayer;

		private	$playerNumber;
		private	$playerShip = array();

		function __construct($arg)
		{
			self::$nbrInstancePlayer++;
			if (array_key_exists("name", $arg)
				$playerName = $arg["name"];
			else
				$playerName = "player" . $nbrInstancePlayer;
			$playerNumber = $nbrInstancePlayer;
			createShip($arg["ship"]);
		}

		private function createShip ($tabShip)
		{
			foreach ($tabShip as $ship)
			{
				$i = 0;
				if ($ship["type"] == "imperialCruiser")
				{
					while ($i < $ship["nbr"])
					{
						$this->playerShip[] = new imperialCruiser();
						$i++;
					}
				}
			}
		}

		private function initAllShip ()
		{
			foreach ($this->playerShip as $ship)
			{
				$ship->initShip();
			}
		}
	}

?>