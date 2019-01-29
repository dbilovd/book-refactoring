<?php

require_once("Movie.php");
require_once("Rental.php");
require_once("Customer.php");

$movieOne = new Movie("Aquaman", 1);
$movieTwo = new Movie("Titanic", 0);

$rentalOne = new Rental($movieOne, 14);
$rentalTwo = new Rental($movieTwo, 7);

$customer = new Customer("David");
$customer->addRental($rentalOne);
$customer->addRental($rentalTwo);

echo $customer->statement();
