<?php

require_once("HTMLStatement.php");
require_once("JsonStatement.php");
require_once("TextStatement.php");

class StatementStrategyContext
{
	private $statementType;

	public function __construct ($type)
	{
		switch ($type) {
			case 'json':
				$this->statementType = (new JsonStatement());
				break;

			case 'html':
				$this->statementType = (new HTMLStatement());
				break;

			case 'text':
			default:
				$this->statementType = (new TextStatement());
				break;
		}
	}

	public function statement ($customer)
	{
		return $this->statementType->statement($customer);
	}
}