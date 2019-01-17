<?php

Class Map
{
	const X = 150;
	const Y = 100;
	public $map = array();

	public function __construct($ships1 = NULL, $ships2 = NULL)
	{
		$this->generateMap();
		$this->createObstacles();
	}
	
	private function generateMap()
	{
		$this->map = array_fill(0, self::Y, array_fill(0, self::X, '.'));
	}

	private function createObstacles()
	{
	}

	public function show()
	{
		$i = 0;
		foreach($this->map as $row) {
			foreach ($row as $c) {
				echo $c;
			}
			echo '<br>';
		}
	}
}
