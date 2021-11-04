<?php

 /**
  * MAKE AVATAR FUNCTION
  */
  if(!function_exists('makeAvatar')){

       function makeAvatar($fontPath, $dest, $newchar){
           $path = $dest;
           $image = imagecreate(200,200);
           $red = rand(0,255);
           $green = rand(0,255);
           $blue = rand(0,255);
           imagecolorallocate($image,$red,$green,$blue);
           $textcolor = imagecolorallocate($image,255,255,255);
           imagettftext($image,85,0,15,145,$textcolor,$fontPath,$newchar);
           imagepng($image,$path);
           imagedestroy($image);
           return $path;
           //imagettftext()
       }
  }



?>
