<?php
require __DIR__.'/vendor/autoload.php';

use devpreshy\Framer;

// define args
$inputFile = (isset($argv[1]) ? $argv[1] : FALSE);
$outputPath = (isset($argv[2]) ? $argv[2] : FALSE);
$outputName = (isset($argv[3]) ? $argv[3] : FALSE);

// Validate arguments
if (!$inputFile || !$outputPath) {
    echo "Error: missing required argument(s). Usage: php index.php inputFile outputPath\n";
    exit(1);
}

// Define constructs
$framer = new Framer($inputFile, $outputPath);
// Generate frames
$generate = $framer->generate();

if($generate) {
	echo "Frames extracted the video successfully";
} else {
	echo "Failed to extract frames. Check Logs";
}

?>