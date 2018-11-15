<?php
Class Color
{
	public $red;
	public $green;
	public $blue;
	static private $verbose = FALSE;

	function __construct(array $kwarg) {
		if (isset($kwarg['rgb'])) {
			$this->red = intval(substr($kwarg['rgb'], 0, 3));
			$this->green = intval(substr($kwarg['rgb'], 3, 6));
			$this->blue  = intval(substr($kwarg['rgb'], 6, 9));
		}
		else if (isset($kwarg['red']) && isset($kwarg['green']) && isset($kwarg['blue'])) {
			$this->red = $kwarg['red'];
			$this->green = $kwarg['green'];
			$this->blue = $kwarg['blue'];
		}
		$this->verbose();
	}
	function __destruct() {
		$this->verbose();
	}
	private function verbose() {
		if (self::verbose) {
			echo 'red : '.$this->red.' green : '.$this->green.' blue : '.$this->blue;
		}
	}
	public static function doc() {
		return (file_get_contents('./Color.doc.txt'));
	}
}
