<?php

require_once("PriceInterface.php");

class RegularPrice implements PriceInterface
{
	public function getPriceCode ()
	{
		return Movie::REGULAR;
	}

	public function getCharge ($rentedDays) {
		return 2 + (
			$rentedDays > 2 ? ($rentedDays - 2) * 1.5 : 0
		);
	}

	public function getFrequencyRenterPoint ($rentedDays)
	{
		return 0;
	}
}