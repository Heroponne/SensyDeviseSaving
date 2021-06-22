<?php

// Preparing a file to save rates
$filename = 'saved_rates.txt';

//creating an array for currency pairs and rate
$crossesAndRates = [];

while (true) {
	// Preparing an array with all currencies pairs available
	$allCross = file_get_contents('https://api.ibanfirst.com/PublicAPI/Cross');
	$jsonFullCross = json_decode($allCross, true);
	$crossArray = [];
	for ($i=0; $i < count($jsonFullCross['crossList']); $i++) { 
		array_push($crossArray, $jsonFullCross['crossList'][$i]['instrument']);
	}

	// For each currency pair, getting the rate and updating array for currency pairs and rate
	for ($i=0; $i < count($crossArray); $i++) { 
		$APIresult = file_get_contents('https://api.ibanfirst.com/PublicAPI/Rate/' . $crossArray[$i]);
		$APIresult = json_decode($APIresult, true);
		$crossesAndRates[$crossArray[$i]] = $APIresult['rate']['rate'];
	}

	// Currency pairs and rates are saved in the file in JSON format, with "\n" to have it more readable for human, but for pure JSON we can remove "\n"
	file_put_contents($filename, json_encode($crossesAndRates) . "\n", FILE_APPEND);

	//Waiting 10 minutes before next loading
	sleep(10*60);
}

?>
