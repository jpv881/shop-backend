<?php

// *** Include the class
include("resize-class.php");
 
// *** 1) Initialize / load image
$resizeObj = new resize('IMG_8020.JPG'); //la imagen tiene que estar en el directorio de este script
 
// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
$resizeObj -> resizeImage(150, 100, 'crop');
 
// *** 3) Save image
$resizeObj -> saveImage('thumbnails/IMG_8020.JPG', 100);
?>