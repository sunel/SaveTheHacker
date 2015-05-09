<?php

$command = escapeshellcmd('python /usr/share/home/FaceDetect/face_detect.py /usr/share/home/hack/public/group1.jpg /usr/share/home/FaceDetect$
$output = shell_exec($command);
echo "<pre>";
print_r(json_decode($output,true));
echo "</pre>";
?>
