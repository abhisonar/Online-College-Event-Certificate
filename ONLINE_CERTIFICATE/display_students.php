<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}
include 'config.php';

           $sql = "SELECT * FROM student_certificate";
           $result = mysqli_query($conn, $sql);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <style type="text/css">
        
body{ font: 14px sans-serif; }
        .container{
            padding: 20px; 
            text-align: center;
            padding: 20px;
            width: 100%;
            margin: 5px;
             

        }
        .container .w3-panel{
            padding: 20px;
            background-color: black;
            height: 100%; 
            background-color:;
        }

           .sidenav {
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #111;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }

            .sidenav a {
              padding: 8px 8px 8px 32px;
              text-decoration: none;
              font-size: 25px;
              color: #818181;
              display: block;
              transition: 0.3s;
            }

            .sidenav a:hover {
              color: #f1f1f1;
            }

            .sidenav .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }

            #main {
              transition: margin-left .5s;
              padding: 16px;
            }
            @media screen and (max-height: 450px) {
              .sidenav {padding-top: 15px;}
              .sidenav a {font-size: 18px;}
            }
            .btn:hover {
  background-color: RoyalBlue;
}

    </style>
</head>
<body>

    <div id="mySidenav" class="sidenav">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin.php">Admin</a>
    <a href="display_students.php">Student Data</a>
    <a href="add_user.php">Add User</a>
    <a href="add_student.php">Add Student</a>
    <a href="del_student.php">Delete Student</a>
    <a href="logout.php">Logout</a>

    </div> 
    <div class="w3-">
    <div class="container w3-panel w3-card-4">
        <div class="w3-container w3-yellow w3-panel w3-card-2" style="font-size:30px;cursor:pointer;padding:10px 10px 10px 10px ;margin: 0px; border-radius: 20px; text-align: left;">
            <div class="row">
                <div class="col-sm-1">
                 <span  onclick="openNav()">&#9776;</span>
                </div>
                <div class="col-sm-8" style="text-align: center;">
                    <h2>Umang Sports Participants List</h2>
                </div>
              <form method="post" action="mysql_to_excel.php">
                <div class="col-sm-3">
                    <Button name="downloadbtn" class='btn fa fa-download'>Download</Button>
                </div>
              </form>
            </div>
         </div>
      </div>
      </div><br>
      <div>
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="search-bar" id="search-bar" class="form-control" placeholder="Search..">
                <div id="suggesstion-box1"></div>
            </div>
            <div style="text-align: center;">
                <Button align='right' class="btn btn-info btn-lg" name="search-btn" placeholder="Search">Search</Button> 
                <Button class="btn btn-info btn-lg" name="see-all" placeholder="See all">See All</Button>  
            </div>
        </form>
      </div><br><br>
      <br>
     <div class="container" id="main">
           <table border="5" style="width: 100%;">
              <tr align="center">
                  <th>SR. NO.</th>
                  <th>ENROLLMENT NO.</th>
                  <th></th>
                  <th>STUDENT NAME</th>
                  <th>CLASS</th>
                  <th>GAME</th>
                  <th>STATUS</th>
                  <th>GENDER</th>
                  <th>CODE</th>
                  <th></th>
              </tr>
   <?php
   

            if (mysqli_num_rows($result) > 0) {
    // output data of each row
                    while($row = mysqli_fetch_assoc($result))
                    {
                      if(isset($_POST["see-all"] ))
                      {
?>

                        
                         <tr>
                            <td><?php echo $row["Srno"]; ?></td>
                            <td><?php echo $row["Enroll"]; ?></td>
                             <td><a href="display_students.php?id1=<?php echo $row["Srno"];?>"><button>View</button></a></td>
                            <td><?php echo $row["Name"]; ?></td>
                            <td><?php echo $row["Class"]; ?></td>
                            <td><?php echo $row["Game"]; ?></td>
                            <td><?php echo $row["Status"];?></td>
                            <td><?php echo $row["Gender"];?></td>
                            <td><?php echo $row["C1"].'-'.$row["C2"];?></td>
                            <td></td>
                            <td><a href="display_students.php?id=<?php echo $row["Srno"];?>"><button class="remove">DELETE</button></a></td>
                         </tr>           
                
                                      

<?php
                    }

                 }
            }
            else{
                echo "No Data";
            }




             

              if(isset($_POST["search-btn"]))
              {

                    $search =  mysqli_real_escape_string($conn,$_POST["search-bar"]);    
                    $sql1 = "SELECT * FROM student_certificate WHERE Enroll like '%$search%' or Name like '%$search%' or Class like '%$search%' or Game like '%$search%' or Status like '%$search%' ";
                    $result = mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($result)>0)
                    {
                      while ($row1 = mysqli_fetch_assoc($result)) {
                        ?>
                         <tr>
                            <td><?php echo $row1["Srno"]; ?></td>
                            <td><?php echo $row1["Enroll"]; ?></td>
                           <td><a href="display_students.php?id2=<?php echo $row1["Srno"];?>"><button>View</button></a></td>
                            <td><?php echo $row1["Name"]; ?></td>
                            <td><?php echo $row1["Class"]; ?></td>
                            <td><?php echo $row1["Game"]; ?></td>
                            <td><?php echo $row1["Status"];?></td>
                            <td><?php echo $row1["Gender"];?></td>
                            <td><?php echo $row1["C1"].'-'.$row1["C2"];?></td>
                            <td><a href="display_students.php?id=<?php echo $row1["Srno"];?>"><button>DELETE</button></a></td>
                         </tr>
                        <?php
                      }

                    }
                    else{
                      ?>
                      <div class="w3-panel w3-pale-red w3-border" style="text-align: center;">
                        <h3>NO ENTRY AVAILABLE<h3>
                      </div>
                      <?php
                    }
              }
              if( isset($_GET['id']) )
              {
                $id = $_GET['id'];
                $sql= "DELETE FROM student_certificate WHERE Srno ='$id'";
                $res= mysqli_query($conn,$sql) or die("Failed".mysql_error());
                echo "<meta http-equiv='refresh' content='0;url=display_students.php'>";
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
                            			$enrollment = $row1["Enroll"];
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
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        								$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                      
                      if( isset($_GET['id2']) )
                      {
                        $id2 = $_GET['id2'];
                        $sql2 = "SELECT * FROM student_certificate WHERE Srno = '$id2' ";
        	            $result2 = mysqli_query($conn, $sql2) or die("Failed".mysql_error());
        	            if (mysqli_num_rows($result2) > 0) {
                            // output data of each row
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                
                                	
                            			$name = $row2["Name"];
                            			$enrollment = $row2["Enroll"];
                            			$class = $row2["Class"];
                            			$status = $row2["Status"];
                            			$game = $row2["Game"];
                            			$tag =  $row2["Tag"];
                            			$c1 = $row2["C1"];
                               			$c2 = $row2["C2"];
                               			$code = $c1."-".(string)$c2;
                               			if($game == 'BADMINTON' || $game == 'CARROM' || $game == 'CHESS' || $game == 'ATHLETICS' || $game == 'EVENT MANAGEMENT')
                            				{
                        							// Create the image
                        							$im = imagecreatefromjpeg("images/main_image/certificate_kedaresir.jpeg");
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        								$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
                        							$output = "images/".$id1."_".$enrollment."_".$game.".jpeg";
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
              

    
?>

           </table>
        
      </div>
    </div>
 


       <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
 // document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
 // document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
$(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: 'display_students.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
    
// AJAX call for autocomplete  for find student
$(document).ready(function(){
  $("#search-bar").keyup(function(){
    $.ajax({
    type: "POST",
    url: "get_name_suggetion.php",
    data:'keyword2='+$(this).val(),
    beforeSend: function(){
      $("#search-bar").css("background","#FFFFFF");
    },
    success: function(data){
      $("#suggesstion-box1").show();
      $("#suggesstion-box1").html(data);
      $("#search-bar").css("background","#FFFFFF");
    }
    });
  });
});
//To select Student name
function selectName2(val) {
$("#search-bar").val(val);
$("#suggesstion-box1").hide();
}
</script>
</body>
</html>