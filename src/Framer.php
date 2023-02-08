<?php
namespace devpreshy;
use FFMpeg;

class Framer {
	// define properties
	private $inputFile, $outputPath, $docroot;

	// define constructor
	public function __construct(string $inputFile, string $outputPath) {
		$this->inputFile = $inputFile;
		$this->outputPath = $outputPath;
		$this->docroot = dirname(__DIR__);
	}

	// define function
	public function generate(): bool {
		try {
			$ffmpeg = FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($this->docroot.'/'.$this->inputFile);

			$video
			    ->filters()
			    ->extractMultipleFrames(FFMpeg\Filters\Video\ExtractMultipleFramesFilter::FRAMERATE_EVERY_10SEC, $this->docroot.'/'.$this->outputPath)
			    ->synchronize();

			$video
			    ->save(new FFMpeg\Format\Video\X264(), $this->docroot.'/'.$this->outputPath.'/frame_%d.jpg');

			return true;
		} catch(\Exception $e) {
			return false;
		}
	}
}

?>