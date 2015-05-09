<?php

$filename1 = "amy1.jpg";
$filename2 = "test1.jpg";

$signature1 = puzzle_fill_cvec_from_file($filename1);
$signature2 = puzzle_fill_cvec_from_file($filename2);

$d = puzzle_vector_normalized_distance($signature1, $signature2);

echo "<pre>";
var_dump($d);

if ($d < PUZZLE_CVEC_SIMILARITY_THRESHOLD) {
  echo "Pictures look similar\n";
}

?>