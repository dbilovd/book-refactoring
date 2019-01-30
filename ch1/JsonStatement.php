<?php

require_once("StatementInterface.php");

class JsonStatement implements StatementInterface
{
	public function statement ($customer)
	{
		$results = [ 
			'title' => "Rental Record for {$customer->getName()}"
		];

		foreach ($customer->getRentals() as $rental) {
			$results['rentals'][] = [
				'title'	=> $rental->getMovie()->getTitle(),
				'price'	=> $rental->getCharge()
			];
		}

		$results['total'] = $customer->charge();
		$results['renterPoints'] = $customer->renterPoints();

		return json_encode($results);
	}

}