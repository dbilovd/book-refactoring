<?php

class Rental
{
	private $movie;
	private $daysForRent;

	public function __construct ($movie, $daysForRent)
	{
		$this->movie = $movie;
		$this->daysForRent = $daysForRent;
	}

	public function getDaysRented ()
	{
		return $this->daysForRent;
	}

	public function getMovie ()
	{
		return $this->movie;
	}

	public function getCharge ()
	{
		return $this->getMovie()
			->getCharge($this->getDaysRented());
	}

	public function getFrequencyRenterPoints ()
	{
		// For every renting you earn a point
		// Add additional point - if deserving
		return 1 + $this->getMovie()
			->getFrequencyRenterPoint($this->getDaysRented());
	}
}