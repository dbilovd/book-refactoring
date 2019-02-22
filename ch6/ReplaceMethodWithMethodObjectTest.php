<?php

use PHPUnit\Framework\TestCase;

include("ReplaceMethodWithMethodObject.php");

class ReplaceMethodWithMethodObjectTest extends TestCase
{
	/** @test */
	public function gamma ()
	{
		$gamma = (new ReplaceMethodWithMethodObject())
			->gamma(10, 200, 5);
		$this->assertEquals(-2970, $gamma);
	}
}
