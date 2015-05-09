<?php

$command = escapeshellcmd('python /usr/share/home/FaceDetect/face_detect.py /usr/share/home/hack/public/group1.jpg /usr/share/home/FaceDetect$
$faces = shell_exec($command);

echo "<pre>";
print_r(json_decode($output,true));
echo "</pre>";

if(count($faces) > 0){

	foreach($faces as $face){

		$xCoordinate = $face[0];
		$yCoordinate = $face[1];
		$width = $face[2];
		$height = $face[3];

		$ini_filename = 'group1.jpg';
		$im = imagecreatefromjpeg($ini_filename);

		$ini_x_size = getimagesize($ini_filename)[0];
		$ini_y_size = getimagesize($ini_filename)[1];

		//the minimum of xlength and ylength to crop.
		$crop_measure = min($ini_x_size, $ini_y_size);

		// Set the content type header - in this case image/jpeg
		//header('Content-Type: image/jpeg');

		$to_crop_array = array('x' =>0 , 'y' => 0, 'width' => $crop_measure, 'height'=> $crop_measure);
		$thumb_im = imagecrop($im, $to_crop_array);

		imagejpeg($thumb_im, 'thumb.jpeg', 100);



	}

}


?>
