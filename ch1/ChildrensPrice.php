<?php

require_once("PriceInterface.php");

class ChildrensPrice implements PriceInterface
{
	public function getPriceCode ()
	{
		return Movie::CHILDRENTS;
	}


	public function getCharge ($rentedDays) {
		return 1.5 + (
			($rentedDays > 3) ? 
				(($rentedDays - 3) * 1.5) : 0
		);
	}

	public function getFrequencyRenterPoint ($rentedDays)
	{
		return 0;
	}
}
