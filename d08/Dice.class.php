<?php

Class Dice
{
	public $dices = 0;

	public function __construct($str)
	{
		$dice = sscanf($str, "%d %c %d", $this->dice, $c, $d);
	}

	public function cast()
	{
		$res = 0;
		while ($dices > 0) {
			$res += rand(1, 6);
			($this->dices)--;
		}
		return $res;
	}
}
