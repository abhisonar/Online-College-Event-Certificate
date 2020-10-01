<?php
include "config.php";
$enroll = $_POST["enrollno"];
$sql = "SELECT * FROM student_certificate WHERE Enroll = '$enroll' ";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        	    $name = $row["Name"];
    			$class = $row["Class"];
    			$status = $row["Status"];
    			$game = $row["Game"];
    			$tag =  $row["Tag"];
    			$c1 = $row["C1"];
       			$c2 = $row["C2"];
       			$code = $c1."-".(string)$c2;
       
            /*	$im1 = imagecreatefromjpeg("images/main_image/certificate_deoresir.jpeg");
            	$output = "images/".$row["Name"]."_".$row["Game"].".jpeg";
            	$font = 'font/arial.ttf';
            	$black = imagecolorallocate($im, 0, 0, 0);
            	$blue  = imagecolorallocate($im, 0, 0, 255);
            	// Add some shadow to the text
            	imagettftext($im1, 20, 0, 570, 400, $black, $font, $name);
            	imagettftext($im1, 20, 0, 190, 450, $black, $font, $class);
            	imagettftext($im1, 20, 0, 160, 500, $black, $font, $game);
            	imagettftext($im1, 20, 0, 570, 400, $black, $font, $name);
				imagettftext($im1, 20, 0, 190, 450, $black, $font, $class);
				imagettftext($im1, 20, 0, 160, 500, $black, $font, $game);
            	imagejpeg($im1,$output,50);
            	echo "<img src='$output'><br>";
            	echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";*/
            		        $im = imagecreatefromjpeg("images/main_image/certificate_kedaresir.jpeg");
							$output = "images/".$enrollment."_".$game.".jpeg";
							$font = 'font/arial.ttf';
							$black = imagecolorallocate($im, 0, 0, 0);
    						$blue  = imagecolorallocate($im, 0, 0, 255);
							// Add some shadow to the text
							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);

							// Using imagepng() results in clearer text compared with imagejpeg()
							imagejpeg($im,$output,75);
							echo "<img src='$output'><br>";
							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
    }
   
    
    }

?>