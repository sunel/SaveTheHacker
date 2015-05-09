<?php

$filename1 = "amy1.jpg";
$filename2 = "amy2.jpg";
$filename3 = "amy3.jpg";
$filename4 = "amy4.jpg";

$filename5 = "test1.jpg";

$signature1 = puzzle_fill_cvec_from_file($filename1);
$signature2 = puzzle_fill_cvec_from_file($filename2);
$signature3 = puzzle_fill_cvec_from_file($filename3);
$signature4 = puzzle_fill_cvec_from_file($filename4);
$signature5 = puzzle_fill_cvec_from_file($filename5);


$d = puzzle_vector_normalized_distance($signature1, $signature2);

echo "<pre> amy1 and amy2";
var_dump($d);
echo "</pre>";

$d = puzzle_vector_normalized_distance($signature1, $signature3);

echo "<pre> amy1 and amy3";
var_dump($d);
echo "</pre>";


$d = puzzle_vector_normalized_distance($signature1, $signature4);

echo "<pre> amy1 and amy4";
var_dump($d);
echo "</pre>";


if ($d < PUZZLE_CVEC_SIMILARITY_THRESHOLD) {
  echo "Pictures look similar\n";
}

?>
