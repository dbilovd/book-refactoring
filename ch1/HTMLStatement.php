<?php

require_once("StatementInterface.php");

class HTMLStatement implements StatementInterface
{
	public function statement ($customer)
	{
		$result = "<h1>Rental Record for {$customer->getName()}</h1>";

		foreach ($customer->getRentals() as $rental) {
			$result .= "<p>{$rental->getMovie()->getTitle()} {$rental->getCharge()}</p>";
		}

		$result .= "<h2>Amount owed is {$customer->charge()}</h2>";
		$result .= "<h2>You earned {$customer->renterPoints()} frequent renter points</h2>";

		return $result;
	}
}