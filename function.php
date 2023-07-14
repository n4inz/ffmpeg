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

function audioToVideo(){
    
    $audioFile = $_FILES['audios']['tmp_name'];
    $imageFile = $_FILES['image']['tmp_name']; 
    
    // Lokasi file output video
    $outputFile = 'upload/hasil/'.time().'.mp4';
    
    // Path ke binary ffmpeg
    $ffmpegPath = '/usr/bin/ffmpeg';
    
    // Menjalankan ffmpeg untuk mengubah audio dan gambar menjadi video
    $command = "$ffmpegPath -loop 1 -i $imageFile -i $audioFile -c:v libx264 -tune stillimage -c:a aac -b:a 192k -pix_fmt yuv420p -shortest $outputFile";
    exec($command);
    
    // Cek jika file output berhasil dibuat
    if (file_exists($outputFile)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($outputFile) . '"');
        header('Content-Length: ' . filesize($outputFile));
        readfile($outputFile);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}