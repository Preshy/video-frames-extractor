<?php
require __DIR__.'/vendor/autoload.php';

use devpreshy\Framer;

// define args
$inputPath = $argv[1];
$outputPath = $argv[2];

// Validate arguments
if (!isset($inputFile) || !isset($outputDirectory)) {
    echo "Error: missing required argument(s). Usage: php extractFrames.php inputFile outputDirectory\n";
    exit(1);
}

// Define constructs
$framer = new Framer($inputPath, $outputPath);
// Generate frames
$framer->generate();

?>