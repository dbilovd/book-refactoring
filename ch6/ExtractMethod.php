<?php

class ExtractMethod {
	public $customerName;
	public $orders;

	public function printOwing ()
	{
		$toReturn = $this->printHeader();
		$toReturn .= $this->printDetails(
			$this->getOutstanding()
		);
		return $toReturn;
	}

	private function printHeader ()
	{
		return 
			"***********************\n
			**** Customer Owes ****\n
			***********************\n";
	}

	private function getOutstanding ()
	{
		$result = array_reduce($this->orders, function ($res, $order) {
			return $res + floatval($order->amount);
		}, 0.0);
		return number_format($result, 2);
	}

	private function printDetails ($amount)
	{
		return 
			"Name: {$this->customerName}\n
			Amount: {$amount}\n";
	}
}