<?php

use PHPUnit\Framework\TestCase;

include('ReplaceTempWithQuery.php');

class TestReplaceTempWithQuery extends TestCase
{
	/** @test */
	public function get_price ()
	{
		$replaceTempWithQuery = new ReplaceTempWithQuery();
		$replaceTempWithQuery->quantity = 100;
		$replaceTempWithQuery->itemPrice = 20;
		$price = $replaceTempWithQuery->getPrice();
		
		$this->assertEquals($price, 1900, "Total price greater than 1000");

		$replaceTempWithQuery->itemPrice = 9;
		$price = $replaceTempWithQuery->getPrice();
		$this->assertEquals($price, 882, "Total price lesser than 1000");
	}

	/** @test */
	public function get_price_plus_shipping ()
	{
		$replaceTempWithQuery = new ReplaceTempWithQuery();
		$replaceTempWithQuery->quantity = 1000;
		$replaceTempWithQuery->itemPrice = 20;
		$price = $replaceTempWithQuery->getPricePlusShipping();
		
		$this->assertEquals($price, 19600.0, "Total price plus shipping");
	}
}