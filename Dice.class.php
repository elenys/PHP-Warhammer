<?php

	/**
	*			Dice.class.php
	*/
	final class Dice
	{
		static public function doc() {
			print ("Dice.doc.php")
		}
		 
		public function getValueDice() {
			return rand(1, 6);
		}
	}
?>