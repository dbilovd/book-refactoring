<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error;

class FileReaderTester extends TestCase {
	protected $input;

	/**
	 * Setup
	 *
	 * @return void
	 */
	public function setup()
	{
		try {
			// $input = FileReader("data.txt");
			$this->input = fopen("data.txt", "r");
		} catch (Exception $e) {
			throw new Exception($e->getMessage(), 1);
			
		}
	}

	/**
	 * TearDown
	 *
	 * @return void 
	 */
	public function tearDown()
	{
		try {
			fclose($this->input);
		} catch (Exception $e) {
			throw new Exception("Error on closing file", 1);
		}
	}

	/** @test */
	public function testRead()
	{
		$ch = '&';
		for ($i = 0; $i < 4; $i++) {
			$ch = (String) fgetc($this->input);
		}
		$this->assertEquals('d', $ch);
	}

	/** @test */
	public function testReadAtEnd()
	{
		$ch = -1234;
		for ($i = 0; $i < 139; $i++) {
			$ch = fgetc($this->input);
		}
		$this->assertEquals(false, $ch);
	}

	/** @test */
	public function testBoundaryReadConditions ()
	{
		$firstChar; $lastChar; $afterLastChar;
		for ($i = 0; $i < 139; $i++) {
			switch ($i) {
				case 0:
					$firstChar = fgetc($this->input);
					break;

				case 137:
					$lastChar = fgetc($this->input);
					break;

				case 138:
					$afterLastChar = fgetc($this->input);
					break;

				default:
					$ch = fgetc($this->input);
					break;
			}
		}
		$this->assertEquals('B', $firstChar, 'read first char');
		$this->assertEquals('6', $lastChar, 'read last char');
		$this->assertFalse($afterLastChar, 'read char after last char');
	}

	/** @test */
	public function testReadingOfEmptyFile ()
	{
		$emptyFile = fopen('empty.txt', 'r+');
		$firstChar = fgetc($emptyFile);
		fclose($emptyFile);
		$this->assertFalse($firstChar);
	}

	/**
	 * @test
	 * @expectedException Exception
	 */
	public function reading_after_closing_of_file ()
	{
		$tempFile = fopen('empty.txt', 'r');
		fclose($tempFile);
		try {
			$char = fgetc($tempFile);
		} catch(Exception $e) {
			throw new Exception("Error Processing Request", 1);
		}
	}
}
