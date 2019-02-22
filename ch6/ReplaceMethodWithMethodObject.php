<?php

include("Gamma.php");

class ReplaceMethodWithMethodObject
{
	public function delta()
	{
		return 10;
	}

	public function gamma ($inputVal, $quantity, $yearToDate)
	{
		return (new Gamma($this, $inputVal, $quantity, $yearToDate))
			->compute();
	}
}
