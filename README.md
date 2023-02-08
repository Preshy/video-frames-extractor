# Video Frames Extractor Script
### A command-line tool to extract video frames to photos (video previews).

## Prerequisites
* PHP 8 or later
* Composer
* FFmpeg installed on your system
* PHP-FFmpeg
* A video file and an output directory for the frames

### Installation
* Clone or download the repository to your local machine
* In the terminal, navigate to the root directory of the repository
* Run the following command to install the dependencies:

```
$ composer install
```
### Usage
The tool takes three arguments: the input video file, the output video file, and the watermark image file. To run the tool, open the terminal, navigate to the root directory of the repository, and run the following command:

#### Execute code
```
$ php index.php demo/input.mp4 demo/frames
```

The tool will add the watermark image to the center of the input video file and save the result as the output video file. The output file will have the same format as the input file.

### Note
If the arguments are not passed, you will get an error message:

##### Error: missing required argument(s). Usage: php index.php inputFile outputPath

### Demo
Open the demo folder to view a demo video and its generated frames

### Contributions
PR's / Reviews are welcome here. I'm always open to learning!