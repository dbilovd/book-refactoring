<?php

require_once("Movie.php");

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

	public function getName ()
	{
		return $this->name;
	}

	public function statement () {
		$result = "Rental Record for {$this->getName()}\n";

		foreach ($this->rentals as $rental) {
			$result .= "{$rental->getMovie()->getTitle()}\t{$rental->getCharge()}\n";
		}

		$result .= "Amount owed is {$this->charge()}\n";
		$result .= "You earned {$this->renterPoints()} frequent renter points";

		return $result;
	}

	public function htmlStatement () {
		$result = "<h1>Rental Record for {$this->getName()}</h1>";

		foreach ($this->rentals as $rental) {
			$result .= "<p>{$rental->getMovie()->getTitle()} {$rental->getCharge()}</p>";
		}

		$result .= "<h2>Amount owed is {$this->charge()}</h2>";
		$result .= "<h2>You earned {$this->renterPoints()} frequent renter points</h2>";

		return $result;
	}

	private function charge () {
		return array_reduce($this->rentals, function ($a, $rental) {
			return $a + $rental->getCharge();
		}, 0);
	}

	private function renterPoints ()
	{
		return array_reduce($this->rentals, function ($a, $rental) {
			return $a + $rental->getFrequencyRenterPoints();
		}, 0);
	}
}
