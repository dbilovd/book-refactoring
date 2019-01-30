<?php

use PHPUnit\Framework\TestCase;

require_once("Movie.php");
require_once("Rental.php");
require_once("Customer.php");

class Test extends TestCase
{
	function setUp ()
	{
		$movieOne = new Movie("Aquaman", 1);
		$movieTwo = new Movie("Titanic", 0);

		$rentalOne = new Rental($movieOne, 14);
		$rentalTwo = new Rental($movieTwo, 7);

		$this->customer = new Customer("David");
		$this->customer->addRental($rentalOne);
		$this->customer->addRental($rentalTwo);
	}

	function testCustomerGeneratedSummary ()
	{
		$expectedStatement = "Rental Record for David\nAquaman\t42\nTitanic\t9.5\nAmount owed is 51.5\nYou earned 3 frequent renter points";
		
		$statement = $this->customer->statement();
		$this->assertEquals($statement, $expectedStatement);

		$statement = $this->customer->statement('text');
		$this->assertEquals($statement, $expectedStatement);
	}

	function testCustomerGeneratedSummaryHTML ()
	{
		$statement = $this->customer->statement('html');

		$this->assertRegexp('/Rental Record for David/', $statement);
		$this->assertRegexp('/Aquaman 42/', $statement);
		$this->assertRegexp('/Titanic 9\.5/', $statement);
		$this->assertRegexp('/Amount owed is 51\.5/', $statement);
		$this->assertRegexp('/You earned 3 frequent renter points/', $statement);
	}

	function testCustomerGeneratedSummaryJson ()
	{
		$statement = $this->customer->statement('json');

		$expected = json_encode([
			'title'			=> 'Rental Record for David',
			'rentals'		=> [
				[
					'title'	=> 'Aquaman',
					'price'	=> 42
				], [
					'title'	=> 'Titanic',
					'price'	=> 9.5
				]
			],
			'total'			=> 51.5,
			'renterPoints'	=> 3
		]);

		$this->assertJsonStringEqualsJsonString($statement, $expected);
	}
}