<?php
include 'config.php';
$enroll = $_POST["enrollno"];
$sql = "SELECT * FROM student_certificate WHERE Enroll = '$enroll' ";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        
            echo $row["Name"]." ".$row["Class"]." ".$row["Game"];
            	// Create the image
				$im = imagecreatefromjpeg("images/main_image/certificate_kedaresir.jpeg");
				$output = "images/".$enrollment."_".$game.".jpeg";
				$font = realpath('font/arial.TTF');
				$black = imagecolorallocate($im, 0, 0, 0);
				$blue  = imagecolorallocate($im, 0, 0, 255);
				// Add some shadow to the text
				imagettftext($im, 20, 0, 570, 400, $black, $font, $row["Name"]);
				imagettftext($im, 20, 0, 190, 450, $black, $font, $row["Class"]);
				imagettftext($im, 20, 0, 160, 500, $black, $font, $row["Game"]);

				// Using imagepng() results in clearer text compared with imagejpeg()
				imagejpeg($im,$output,75);
				echo "<img src='$output'><br>";
				echo "<a href='$output' download><Button class='btn fa fa-download'>Download</Button></a>";

    
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