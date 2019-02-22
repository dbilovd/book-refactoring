<?php

class Gamma
{
	/**
	 * Parent or calling class
	 * 
	 * @var Object
	 */
	private $parent;

	/**
	 * [$inputVal description]
	 * @var [type]
	 */
	private $inputVal;

	/**
	 * [$inputVal description]
	 * @var [type]
	 */
	private $quantity;

	/**
	 * [$inputVal description]
	 * @var [type]
	 */
	private $yearToDate;

	/**
	 * Constructor
	 */
	public function __construct ($parent, $inputVal, $quantity, $yearToDate)
	{
		$this->parent = $parent;
		$this->inputVal = $inputVal;
		$this->quantity = $quantity;
		$this->yearToDate = $yearToDate;
	}

	/**
	 * Compute method
	 * 
	 * @return [type] [description]
	 */
	public function compute ()
	{
		$importantValue1 = ($this->inputVal * $this->quantity) + $this->parent->delta();
		$importantValue2 = ($this->inputVal * $this->yearToDate) + 100;
		if (($this->yearToDate - $importantValue1) > 100) {
			$importantValue2 -= 20;
		}
		$importantValue3 = $importantValue2 * 7;
		return $importantValue3 - 2 * $importantValue1;
	}
}
