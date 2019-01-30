<?php

require_once("StatementInterface.php");

class TextStatement implements StatementInterface
{
	public function statement ($customer)
	{
		$result = "Rental Record for {$customer->getName()}\n";

		foreach ($customer->getRentals() as $rental) {
			$result .= "{$rental->getMovie()->getTitle()}\t{$rental->getCharge()}\n";
		}

		$result .= "Amount owed is {$customer->charge()}\n";
		$result .= "You earned {$customer->renterPoints()} frequent renter points";

		return $result;
	}
}