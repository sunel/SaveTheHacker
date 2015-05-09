<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

$filename1 = "amy1.jpg";
$filename2 = "amy2.jpg";
$filename3 = "amy3.jpg";
$filename4 = "amy4.jpg";

echo "<pre>";

$total= face_count($filename1,'haarcascade_frontalface_alt.xml');
$coord= face_detect($filename1,'haarcascade_frontalface_alt.xml');
print_r($coord);
echo "<br />";

$total= face_count($filename2,'haarcascade_frontalface_alt.xml');
$coord= face_detect($filename2,'haarcascade_frontalface_alt.xml');
print_r($coord);
echo "<br />";

$total= face_count($filename3,'haarcascade_frontalface_alt.xml');
$coord= face_detect($filename3,'haarcascade_frontalface_alt.xml');
print_r($coord);
echo "<br />";

$total= face_count($filename4,'haarcascade_frontalface_alt.xml');
$coord= face_detect($filename4,'haarcascade_frontalface_alt.xml');
print_r($coord);
echo "<br />";


echo "</pre>";

?>