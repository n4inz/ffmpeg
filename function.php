<?php 
require 'vendor/autoload.php'; // Sesuaikan dengan path ke library php-ffmpeg

use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Mp3;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['video'])) {
        videoToAudio();
    } elseif (isset($_POST['audio'])) {
        audioToVideo();
    } 

}

function videoToAudio(){

    try{
        // $ffmpeg = FFMpeg::create();

        // $audioOutputPath = 'upload/hasil/'.time().'.mp3';

        // $video = $ffmpeg->open($_FILES['video']['tmp_name']);
        // $audioFormat = new Mp3();

        // $video->save($audioFormat, $audioOutputPath);
        // // Membuat header untuk mengunduh file
        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // header('Content-Disposition: attachment; filename="' . basename($audioOutputPath) . '"');
        // header('Content-Length: ' . filesize($audioOutputPath));
            // Path ke binary ffmpeg
        $audioOutputPath = 'upload/hasil/'.time().'.mp3';
        $ffmpegPath = '/usr/bin/ffmpeg';
        $video = $_FILES['video']['tmp_name'];
        $command = "$ffmpegPath -i $video -vn -acodec libmp3lame -ab 128k $audioOutputPath";

        // $command = "$ffmpegPath -loop 1 -i $imageFileEscaped -i $audioFileEscaped -c:v libx264 -tune stillimage -c:a aac -b:a 192k -pix_fmt yuv420p -shortest $audioOutputPath";
        exec($command);
        if (file_exists($audioOutputPath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($audioOutputPath) . '"');
            header('Content-Length: ' . filesize($audioOutputPath));
            readfile($audioOutputPath);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }catch(Exception $e){
        echo $e;
        return false;
        header('location: index.php');

    }
    
}

// function audioToVideo(){
//     $audioFile = $_FILES['audios']['tmp_name'];
//     $imageFile = $_FILES['image']['tmp_name']; 
    
//     $outputFile = 'upload/hasil/'.time().'.mp4';
    
//     // Path ke binary ffmpeg
//     $ffmpegPath = '/usr/bin/ffmpeg';
    

//     $command = "$ffmpegPath -loop 1 -i $imageFile -i $audioFile -vf scale=200:200:force_original_aspect_ratio=decrease,pad=200:200:-1:-1:color=black -c:v libx264 -tune stillimage -c:a aac -b:a 192k -pix_fmt yuv420p -shortest $outputFile";

//     exec($command);
    
//     // Cek jika file output berhasil dibuat
//     if (file_exists($outputFile)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename="' . basename($outputFile) . '"');
//         header('Content-Length: ' . filesize($outputFile));
//         readfile($outputFile);
//         header('Location: ' . $_SERVER['HTTP_REFERER']);
//     }else{
//         header('Location: ' . $_SERVER['HTTP_REFERER']);
//     }
// }





function audioToVideo(){
    $audioFile = $_FILES['audios']['tmp_name'];
    $outputFile = 'upload/hasil/'.time().'.mp4';
    
    // Path to binary ffmpeg (update this path accordingly)
    $ffmpegPath = '/usr/bin/ffmpeg ';

    $imageFiles = array();
    $delay = $_POST['delay'] ?? 2;
    foreach ($_FILES['images']['tmp_name'] as $index => $tmpFile) {
        // $imageFiles[] = "-loop 1 -t 7 -framerate 1 -i upload/1.jpg";
        $imageFiles[] = "-loop 1 -t ".$delay." -framerate 1 -i $tmpFile";
    }

    $imageInputs = implode(' ', $imageFiles);

    $command = "$ffmpegPath $imageInputs -i $audioFile -filter_complex \"";
    
    foreach (range(0, count($imageFiles) - 1) as $index) {
        $command .= "[$index:v]fps=25,scale=1280:720,setsar=1[v$index]; ";
    }


    $command .= " [".count($imageFiles).":a]anull[a0]; ";
    
    $command .= join('', array_map(function ($index) {
        return "[v$index]";
    }, range(0, count($imageFiles) - 1)));

    $command .= "concat=n=" . count($imageFiles) . ":v=1:a=0[v]\" -map \"[v]\" -map \"[a0]\" -c:v libx264 -c:a aac -b:a 192k -pix_fmt yuv420p $outputFile";

    exec($command);
    // Check if the file output was successfully created
    if (file_exists($outputFile)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($outputFile) . '"');
        header('Content-Length: ' . filesize($outputFile));
        readfile($outputFile);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
