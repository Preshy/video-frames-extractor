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
		$this->outputName = $outputName ?? 'frames';

		if(!$this->inputPath || !$this->outputPath) {
			exit("An input and output path is required.");
		}
	}

	// define function
	public function generate(): string {
		$video = new \FFMpeg\FFMpeg();
		$video->open($this->inputPath);

		$video
		    ->filters()
		    ->extractMultipleFrames(FFMpeg\Filters\Video\ExtractMultipleFramesFilter::FRAMERATE_EVERY_10SEC, $this->outputPath)
		    ->synchronize();

		$video
		    ->save(new FFMpeg\Format\Video\X264(), $this->outputPath . '/' . $this->inputName);

		return "Frames extracted the video successfully.";
	}
}

?>