<?php

use PHPUnit\Framework\TestCase;

include('ExtractMethod.php');

class TestExtractMethod extends TestCase
{
	/** @test */
	public function print_owing ()
	{
		$extractMethod = new ExtractMethod();
		$extractMethod->customerName = 'David';
		$extractMethod->orders = json_decode(json_encode([
			[ 'amount' => "10.00" ],
			[ 'amount' => "15.00" ],
			[ 'amount' => "20.00" ],
		]));
		$statement = $extractMethod->printOwing();
		
		$this->assertContains("Customer Owes", $statement);
		$this->assertContains("Name: David", $statement);
		$this->assertContains("Amount: 45.00", $statement);
	}
}