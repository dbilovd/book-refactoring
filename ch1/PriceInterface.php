<?php

interface PriceInterface
{
	public function getPriceCode ();

	public function getCharge ($rentedDays);


	public function getFrequencyRenterPoint ($rentedDays);
}
