<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
  width: 100%;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
img{
	width: 100%;
}
</style>
</head>
<body>
	<?php
include 'config.php';

$enrollment = $_POST["enrollno"];
$select = $_POST["tag"];
if($select =='PARTICIPANT')
{
	$sql = "SELECT * FROM student_certificate WHERE Enroll = '$enrollment' AND Status != 'VOLUNTEER' ";
	$result = mysqli_query($conn, $sql);
}
elseif($select =='VOLUNTEER')
{
	$sql = "SELECT * FROM student_certificate   WHERE Enroll ='$enrollment' AND Status = 'VOLUNTEER' ";
	$result = mysqli_query($conn, $sql);
}

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
        		
    			$name = $row["Name"];
    			$class = $row["Class"];
    			$status = $row["Status"];
    			$game = $row["Game"];
    			$tag =  $row["Tag"];
    			$c1 = $row["C1"];
       			$c2 = $row["C2"];
       			$code = $c1."-".(string)$c2;
       			
    
    			
    				if($game == 'BADMINTON' || $game == 'CARROM' || $game == 'CHESS' || $game == 'ATHLETICS' || $game == 'EVENT MANAGEMENT')
    				{
							// Create the image
							$im = imagecreatefromjpeg("images/main_image/certificate_kedaresir.jpeg");
							$output = "images/".$game."_".$enrollment.".jpeg";
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
					elseif ($game == 'KHO-KHO' || $game == 'DANCE' || $game == 'DRAMA' || $game == 'RUNNING' || $game == 'SINGING' || $game == 'ANCHORING') {
							// Create the image
							$im = imagecreatefromjpeg("images/main_image/certificate_deoresir.jpeg");
							$output = "images/".$game."_".$enrollment.".jpeg";
							$font ='font/arial.ttf';
							$black = imagecolorallocate($im, 0, 0, 0);
    						$blue  = imagecolorallocate($im, 0, 0, 255);
							// Add some shadow to the text
							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);

							// Using imagepng() results in clearer text compared with imagejpeg()
							imagejpeg($im,$output,75);
							echo "<img src='$output'><br>";
							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
					}
					elseif ($game == 'CRICKET' || $game == 'DISCUSS THROW' || $game == 'KABADDI' || $game == 'THROW BALL' ) {
							// Create the image
							$im = imagecreatefromjpeg("images/main_image/certificate_rokadesir.jpeg");
							$output = "images/".$game."_".$enrollment.".jpeg";
							$font ='font/arial.ttf';
							$black = imagecolorallocate($im, 0, 0, 0);
    						$blue  = imagecolorallocate($im, 0, 0, 255);
							// Add some shadow to the text
							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
							// Using imagepng() results in clearer text compared with imagejpeg()
							imagejpeg($im,$output,75);
							echo "<img src='$output'><br>";
							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
					}
					elseif ($game == 'POSTER PRESENTATION' || $game == 'QUIZ' || $game == 'RANGOLI' || $game == 'RUNNING') {
						// Create the image
							$im = imagecreatefromjpeg("images/main_image/certificate_jainsir.jpeg");
							$output = "images/".$game."_".$enrollment.".jpeg";
							$font ='font/arial.ttf';
							$black = imagecolorallocate($im, 0, 0, 0);
    						$blue  = imagecolorallocate($im, 0, 0, 255);
							// Add some shadow to the text
							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
							// Using imagepng() results in clearer text compared with imagejpeg()
							imagejpeg($im,$output,75);
							echo "<img src='$output'><br>";
							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
					}
					elseif ($game == 'SHOTPUT' || $game == 'TABLE TENNIS' || $game == 'TUG-OF-WAR' || $game == 'VOLLEYBALL') {
						// Create the image
							$im = imagecreatefromjpeg("images/main_image/certificate_thakaresir.jpeg");
							$output = "images/".$game."_".$enrollment.".jpeg";
							$font ='font/arial.ttf';
							$black = imagecolorallocate($im, 0, 0, 0);
    						$blue  = imagecolorallocate($im, 0, 0, 255);
							// Add some shadow to the text
							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
							// Using imagepng() results in clearer text compared with imagejpeg()
							imagejpeg($im,$output,75);
							echo "<img src='$output'><br>";
							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
					}
					elseif ($game) {
						// Create the image
							$im = imagecreatefromjpeg("images/main_image/certificate_congrats.jpeg");
							$output = "images/".$game."_".$enrollment.".jpeg";
							$font ='font/arial.ttf';
							$black = imagecolorallocate($im, 0, 0, 0);
    						$blue  = imagecolorallocate($im, 0, 0, 255);
							// Add some shadow to the text
							imagettftext($im, 20, 0, 620, 400, $black, $font, $name);
							imagettftext($im, 20, 0, 220, 460, $black, $font, $class);
							imagettftext($im, 20, 0, 720, 460, $black, $font, $status);
							imagettftext($im, 20, 0, 300, 530, $black, $font, $game);
							imagettftext($im, 16, 0, 565, 827, $blue, $font, $code);
							imagettftext($im, 20, 0, 530, 400, $black, $font, $tag);
							// Using imagepng() results in clearer text compared with imagejpeg()
							imagejpeg($im,$output,75);
							echo "<img src='$output'><br>";
							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
					}
					
					 if( isset($_GET['id1']) )
                      {
                        $id1 = $_GET['id1'];
                        $sql = "SELECT * FROM student_certificate WHERE Srno = '$id1' ";
        	            $result = mysqli_query($conn, $sql) or die("Failed".mysql_error());
        	            if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row1 = mysqli_fetch_assoc($result)) {
                                
                                	
                            			$name = $row1["Name"];
                            			$class = $row1["Class"];
                            			$status = $row1["Status"];
                            			$game = $row1["Game"];
                            			$tag =  $row1["Tag"];
                            			$c1 = $row1["C1"];
                               			$c2 = $row1["C2"];
                               			$code = $c1."-".(string)$c2;
                               			if($game == 'BADMINTON' || $game == 'CARROM' || $game == 'CHESS' || $game == 'ATHLETICS' || $game == 'EVENT MANAGEMENT')
                            				{
                        							// Create the image
                        							$im = imagecreatefromjpeg("images/main_image/certificate_kedaresir.jpeg");
                        							$output = "images/".$game."_".$enrollment.".jpeg";
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
                        					elseif ($game == 'KHO-KHO' || $game == 'DANCE' || $game == 'DRAMA' || $game == 'RUNNING') {
                        							// Create the image
                        							$im = imagecreatefromjpeg("images/main_image/certificate_deoresir.jpeg");
                        							$output = "images/".$enrollment."_".$game.".jpeg";
                        							$font ='font/arial.ttf';
                        							$black = imagecolorallocate($im, 0, 0, 0);
                            						$blue  = imagecolorallocate($im, 0, 0, 255);
                        							// Add some shadow to the text
                        							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
                        							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
                        							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
                        							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
                        							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
                        							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
                        
                        							// Using imagepng() results in clearer text compared with imagejpeg()
                        							imagejpeg($im,$output,75);
                        							echo "<img src='$output'><br>";
                        							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
                        					}
                        					elseif ($game == 'CRICKET' || $game == 'DISCUSS THROW' || $game == 'KABADDI' || $game == 'THROW BALL') {
                        							// Create the image
                        							$im = imagecreatefromjpeg("images/main_image/certificate_rokadesir.jpeg");
                        							$output = "images/".$enrollment."_".$game.".jpeg";
                        							$font ='font/arial.ttf';
                        							$black = imagecolorallocate($im, 0, 0, 0);
                            						$blue  = imagecolorallocate($im, 0, 0, 255);
                        							// Add some shadow to the text
                        							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
                        							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
                        							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
                        							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
                        							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
                        							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
                        							// Using imagepng() results in clearer text compared with imagejpeg()
                        							imagejpeg($im,$output,75);
                        							echo "<img src='$output'><br>";
                        							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
                        					}
                        					elseif ($game == 'POSTER PRESENTATION' || $game == 'QUIZ' || $game == 'RANGOLI' || $game == 'RUNNING') {
                        						// Create the image
                        							$im = imagecreatefromjpeg("images/main_image/certificate_jainsir.jpeg");
                        							$output = "images/".$enrollment."_".$game.".jpeg";
                        							$font ='font/arial.ttf';
                        							$black = imagecolorallocate($im, 0, 0, 0);
                            						$blue  = imagecolorallocate($im, 0, 0, 255);
                        							// Add some shadow to the text
                        							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
                        							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
                        							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
                        							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
                        							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
                        							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
                        							// Using imagepng() results in clearer text compared with imagejpeg()
                        							imagejpeg($im,$output,75);
                        							echo "<img src='$output'><br>";
                        							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
                        					}
                        					elseif ($game == 'SHOTPUT' || $game == 'TABLE TENNIS' || $game == 'TUG-OF-WAR' || $game == 'VOLLEYBALL') {
                        						// Create the image
                        							$im = imagecreatefromjpeg("images/main_image/certificate_thakaresir.jpeg");
                        							$output = "images/".$enrollment."_".$game.".jpeg";
                        							$font ='font/arial.ttf';
                        							$black = imagecolorallocate($im, 0, 0, 0);
                            						$blue  = imagecolorallocate($im, 0, 0, 255);
                        							// Add some shadow to the text
                        							imagettftext($im, 20, 0, 570, 400, $black, $font, $name);
                        							imagettftext($im, 20, 0, 190, 450, $black, $font, $class);
                        							imagettftext($im, 20, 0, 650, 450, $black, $font, $status);
                        							imagettftext($im, 20, 0, 160, 500, $black, $font, $game);
                        							imagettftext($im, 16, 0, 730, 827, $blue, $font, $code);
                        							imagettftext($im, 20, 0, 500, 400, $black, $font, $tag);
                        							// Using imagepng() results in clearer text compared with imagejpeg()
                        							imagejpeg($im,$output,75);
                        							echo "<img src='$output'><br>";
                        							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
                        					}
                        					  elseif ($game) {
                        						// Create the image
                        							$im = imagecreatefromjpeg("images/main_image/certificate_congrats.jpeg");
                        							$output = "images/".$game."_".$enrollment.".jpeg";
                        							$font ='font/arial.ttf';
                        							$black = imagecolorallocate($im, 0, 0, 0);
                            						$blue  = imagecolorallocate($im, 0, 0, 255);
                        							// Add some shadow to the text
                        							imagettftext($im, 20, 0, 620, 400, $black, $font, $name);
                        							imagettftext($im, 20, 0, 220, 460, $black, $font, $class);
                        							imagettftext($im, 20, 0, 720, 460, $black, $font, $status);
                        							imagettftext($im, 20, 0, 300, 530, $black, $font, $game);
                        							imagettftext($im, 16, 0, 565, 827, $blue, $font, $code);
                        							imagettftext($im, 20, 0, 530, 400, $black, $font, $tag);
                        							// Using imagepng() results in clearer text compared with imagejpeg()
                        							imagejpeg($im,$output,75);
                        							echo "<img src='$output'><br>";
                        							echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";
                        					}
                        					  
                            }
        	            }
                        
                      }
					


	}
}
else {
      ?>
        <div class="w3-panel w3-pale-red w3-border" style="text-align: center;">
          <h3>NO ENTRY AVAILABLE<h3>
        </div>
<?php
}
?>

</body>
</html>

