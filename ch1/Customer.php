<?php

require_once("Movie.php");
require_once("StatementStrategyContext.php");

class Customer
{
	private $name;
	private $rentals = [];

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function addRental ($rental)
	{
		$this->rentals[] = $rental;
	}

	public function getRentals ()
	{
		return $this->rentals;
	}

	public function getName ()
	{
		return $this->name;
	}

	public function statement ($format = '') {
		return (new StatementStrategyContext($format))
			->statement($this);
	}

	/**
	 * @deprecated use statement('html') instead
	 */
	public function htmlStatement () {
		return (new StatementStrategyContext('html'))
			->statement($this);
	}

	/**
	 * @deprecated use statement('json') instead
	 */
	public function jsonStatement () {
		return (new StatementStrategyContext('json'))
			->statement($this);
	}

	public function charge () {
		return array_reduce($this->rentals, function ($a, $rental) {
			return $a + $rental->getCharge();
		}, 0);
	}

	public function renterPoints ()
	{
		return array_reduce($this->rentals, function ($a, $rental) {
			return $a + $rental->getFrequencyRenterPoints();
		}, 0);
	}
}
