<?php

class ReplaceTempWithQuery
{
	public $quantity = 10;
	public $itemPrice = 15;

	public function getPrice ()
	{
		return $this->getBasePrice() * $this->getDiscountFactor();
	}

	private function getBasePrice ()
	{
		return $this->quantity * $this->itemPrice;
	}

	private function getDiscountFactor ()
	{
		return ($this->getBasePrice() > 1000) ? 0.95 : 0.98;
	}

	public function getPricePlusShipping ()
	{
		return $this->getBasePrice() - $this->getTotalDiscount() + $this->getShippingFee();
	}

	private function getTotalDiscount ()
	{
		return max(0, $this->quantity - 500) * $this->itemPrice * 0.05;
	}

	private function getShippingFee ()
	{
		return min($this->getBasePrice() * 0.1, 100.0);
	}

}