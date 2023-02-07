<?php
require __DIR__.'/vendor/autoload.php';

namespace devpreshy;

class Framer {
	// define properties
	private $inputPath, $outputPath, $outputName;

	// define constructor
	public function __construct(string $inputPath, string $outputPath, string $outputName?): void {
		$this->inputPath = $inputPath;
		$this->outputPath = $outputPath;
		$this->outputName = $outputName;

		if(!$this->inputPath || !$this->outputPath) {
			exit("An input and output path is required.");
		}
	}

	// define function
	public function generate(): string {
		$video = new \FFMpeg\FFMpeg();
		$video->open($this->inputPath);

		$frameCount = 0;
		foreach ($video->getFrames() as $frame) {
			$path = $this->outputPath;
			$name = $this->outputName ?? 'frame';
		    $frame->save("$name_$frameCount.jpg");
		    $frameCount++;
		}

		return "Extracted $frameCount frames from the video successfully.";
	}
}

?>