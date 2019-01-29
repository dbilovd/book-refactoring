<?php

require_once("PriceInterface.php");

class NewReleasePrice implements PriceInterface
{
	public function getPriceCode ()
	{
		return Movie::NEW_RELEASE;
	}

	public function getCharge ($rentedDays) {
		return $rentedDays * 3;
	}

	public function getFrequencyRenterPoint ($rentedDays)
	{
		return 1;
	}
}
