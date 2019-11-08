<?php
if (php_sapi_name() == "cli") {
	echo "-----------------------------------------------------\n";
    echo "Select option:\n";
	echo "1. option 1'\n";
	echo "2. option 2'\n";
	echo "-----------------------------------------------------\n";
	$handle = fopen ("php://stdin","r");
	$line = fgets($handle);
	if(trim($line) == "1"){
		echo "Result\n";
		echo "Select option:\n";
		echo "1. Option 12'\n";
		echo "2. Option 22'\n";
		$handle = fopen ("php://stdin","r");
		$line = fgets($handle);

		if(trim($line) == "1"){
			echo "Result 1\n";
			$handle = fopen ("php://stdin","r");
		//exit;
		}
		//exit;
	} else if(trim($line) == "2"){
		echo "Result 2\n";
		//exit;
	} else {
		echo "Wrong selection...\n";
	}
	echo "\n";

} else {
	echo "This can only be executed under CLI.";
}

?>
