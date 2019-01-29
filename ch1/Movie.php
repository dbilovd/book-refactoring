<?php

require_once("RegularPrice.php");
require_once("NewReleasePrice.php");
require_once("ChildrensPrice.php");

class Movie {
	const CHILDRENS = 2;
	const NEW_RELEASE = 1;
	const REGULAR = 0;

	private $title;
	private $price;
	
	public function __construct ($title, $price)
	{
		$this->title = $title;
		$this->setPriceCode($price);
	}

	public function getTitle ()
	{
		return $this->title;
	}

	public function getCharge ($rentedDays) {
		return $this->price->getCharge($rentedDays);
	}

	public function getFrequencyRenterPoint ($rentedDays)
	{
		return $this->price->getFrequencyRenterPoint($rentedDays);
	}

	public function getPriceCode ()
	{
		return $this->price->getPriceCode();
	}

	public function setPriceCode ($price)
	{
		switch ($price) {
			case self::REGULAR :
				$this->price = new RegularPrice();
				break;

			case self::NEW_RELEASE :
				$this->price = new NewReleasePrice();
				break;

			case self::CHILDRENS :
				$this->price = new ChildrensPrice();
				break;

			default :
				throw new Exception("Wrong Price code provided.", 1);
				break;
		}
	}
}
