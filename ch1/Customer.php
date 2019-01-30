<?php

require_once("Movie.php");
require_once("HTMLStatement.php");
require_once("JsonStatement.php");
require_once("TextStatement.php");

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

	public function statement () {
		return (new TextStatement())->statement($this);
	}

	public function htmlStatement () {
		return (new HTMLStatement())->statement($this);
	}

	public function jsonStatement () {
		return (new JsonStatement())->statement($this);
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
