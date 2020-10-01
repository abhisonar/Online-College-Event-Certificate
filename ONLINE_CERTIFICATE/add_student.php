<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- jQuery UI library -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
            input[type=text]{
              align-self: center;
              width: 100%;
              text-align: center;
            }
            select{
              width: 100%;
              text-indent: 47%;
            padding: 7px;
            background-color: white;
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
    <div class="container w3-panel w3-card-4">
        <div class="w3-container w3-yellow w3-panel w3-card-2" style="font-size:30px;cursor:pointer;padding:10px 10px 10px 10px ;margin: 0px; border-radius: 20px; text-align: left;">
            <div class="row">
                <div class="col-sm-1">
                 <span  onclick="openNav()">&#9776;</span>
                </div>
                <div class="col-sm-10" style="text-align: center;">
                    <h2>Student Entry</h2>
                </div>
                <div class="col-sm-1"></div>
            </div>
         </div>
     <div class="container" id="main">
        
        <p>Please fill all the Fields for Student Entry.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Enrollment NO.</label>
                <input type="text" name="find" class="form-control" id="suggestion">
                <div id="suggesstion-box1"></div>
            </div>
             <div id="result"></div>
             </div>
            <div style="text-align: left;">
                <button class="btn btn-info btn-lg" type="submit" name="search">Proceed</button>
            </div>
        </form>
      </div>
    </div>
    <?php
include 'config.php';
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST["search"])  )
{

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["find"]))){
         $enroll_err = "Please Enter the Enrollment No.";
    }
    else{
          $eno = $_POST["find"];
           if($_POST["find"] == 'OTHER' || $_POST["find"] == 'other' || $_POST["find"] == 'Other')
                         {
         ?>
         <div class="container w3-panel w3-card-4">
            
                            <form action="add_student.php" method="POST">
                                <div class="row">
                                    <div class="col-25">
                                      <label for="fname">Enrollment No.</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="eno" name="enroll1">
                                    </div>
                                  </div>
                              <div class="row">
                                    <div class="col-25">
                                      <label for="fname">Name</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="name" name="name">
                                      <div id="suggesstion-box"></div>
                                    </div>
                                  </div>
                                 <div class="row">
                                    <div class="col-sm-3">
                                      <label for="fname">Gender</label>
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="radio"  name="gender" value="M">Male
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="radio"  name="gender" value="F">Female
                                    </div>
                                     <div class="col-sm-3"></div>
                                  </div>
                                 <div class="row">
                                    <div class="col-25">
                                      <label for="gm">Event</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="game" name="game">
                                    </div>
                                  </div>
                                 <div class="row">
                                    <div class="col-25">
                                      <label for="cls">Class</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="class" name="class">
                                    </div>
                                  </div>
                               <div class="row">
                                    <div class="col-25">
                                      <label for="gm">Status</label>
                                    </div>
                                    <div class="col-75">
                                       <input type="text" id="status" name="status">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" name="add_button" class="btn btn-primary" value="Add">
                                  </div>
                            </form>
                          
                        </div>                   
         <?php
                  }
                     else
                        {
                      $eno1 = $_POST["find"];
                       $sql = "SELECT * FROM main_student WHERE Eno = '$eno1' or NAME = '$eno1' ";
                       $result = mysqli_query($conn, $sql);
            
                        if (mysqli_num_rows($result) > 0) {
                // output data of each row
                                while($row = mysqli_fetch_assoc($result))
                                {
            ?>
            
                        <div class="container w3-panel w3-card-4" >
            
                            <form action="add_student.php" method="POST">
                                <div class="row">
                                    <div class="col-25">
                                      <label for="fname">Enrollment No.</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="eno" name="enroll1" value="<?php echo $row["Eno"];?>">
                                    </div>
                                  </div>
                              <div class="row">
                                    <div class="col-25">
                                      <label for="fname">Name</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="name" name="name" value="<?php echo $row["Name"];?>">
                                    </div>
                                  </div>
                                 <div class="row">
                                    <div class="col-sm-3">
                                      <label for="fname">Gender</label>
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="radio"  name="gender" value="M">Male
                                    </div>
                                    <div class="col-sm-3">
                                      <input type="radio"  name="gender" value="F">Female
                                    </div>
                                     <div class="col-sm-3"></div>
                                  </div>
                                 <div class="row">
                                    <div class="col-25">
                                      <label for="gm">Event</label>
                                    </div>
                                    <div class="col-75">
                                     <select name="game" id="gm" name="games">
                                     <option value="BADMINTON">BADMINTON</option>
                                     <option value="TABLE TENNIS">TABLE TENNIS</option>
                                     <option value="CRICKET">CRICKET</option>
                                     <option value="VOLLEYBALL">VOLLEYBALL</option>
                                     <option value="THROWBALL">THROWBALL</option>
                                     <option value="QUIZ">QUIZ</option>
                                     <option value="POSTER PRESENTATION">POSTER PRESENTATION</option>
                                     <option value="RUNNING">RUNNING</option>
                                     <option value="SHHOTPUT">SHHOTPUT</option>
                                     <option value="DISCUSS THROW">DISCUSS THROW</option>
                                     <option value="KABADDI">KABADDI</option>
                                     <option value="KHO-KHO">KHO-KHO</option>
                                     <option value="TUG-OF-WAR">TUG-OF-WAR</option>
                                     <option value="RANGOLI">RANGOLI</option>
                                     <option value="CARROM">CARROM</option>
                                     <option value="CHESS">CHESS</option>
                                     <option value="DANCE">DANCE</option>
                                     <option value="DRAMA">DRAMA</option>
                                     <option value="DRAMA">SINGING</option>
                                     <option value="DRAMA">ANCHORING</option>
                                     <option value="ALUMNI">ALUMNI</option>
                                     <option value="STAFF">STAFF</option>
                                     <option value="PHOTOGRAPHY">PHOTOGRAPHY</option>
                                    </select>
                                    </div>
                                  </div>
                                 <div class="row">
                                    <div class="col-25">
                                      <label for="cls">Class</label>
                                    </div>
                                    <div class="col-75">
                                      <input type="text" id="cls" name="class" value="<?php echo $row["Branch"];?>">
                                    </div>
                                  </div>
                               <div class="row">
                                    <div class="col-25">
                                      <label for="gm">Game</label>
                                    </div>
                                    <div class="col-75">
                                      <select name="status" name="class">
                                     <option value="WINNER">WINNER</option>
                                      <option value="RUNNER UP">RUNNER UP</option>
                                      <option value="2ND RUNNER UP">2ND RUNNER UP</option>
                                      <option value="SUCCESSFULLY PARTICIPATED">SUCCESSFULLY PARTICIPATED</option>
                                      <option value="VOLUNTEER">VOLUNTEER</option>
                                      <option value="UMPIRE">UMPIRE</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" name="add_button" class="btn btn-primary" value="Add">
                                  </div>
                            </form>
                          
                        </div>                                   
            
            <?php
                             }
                        }
               }
    }
  }
}

    
if (isset($_POST["add_button"])) {
  $enrollno = $_POST["enroll1"];
        $stud_name = $_POST["name"];
        $game = $_POST["game"];
        $class = $_POST["class"];
        $status = $_POST["status"];
        $gender = $_POST["gender"];
        $c1 = "";

        $sql_game = "SELECT Game FROM game_list";
        $result_game = mysqli_query($conn,$sql_game);

        if($status=="VOLUNTEER" and $game)
        {
          $sql1 = "SELECT MAX(C2) as max_val FROM student_certificate where C1='VL' ";
        $inc = mysqli_query($conn,$sql1);
        $result = mysqli_fetch_array($inc);
        $result_inc = $result["max_val"] + 1;
              
        }
        elseif($status=="UMPIRE" and $game)
        {
          $sql1 = "SELECT MAX(C2) as max_val FROM student_certificate where C1='UM' ";
        $inc = mysqli_query($conn,$sql1);
        $result = mysqli_fetch_array($inc);
        $result_inc = $result["max_val"] + 1;
              
        }
        elseif($status=="ALUMNI" and $game)
        {
          $sql1 = "SELECT MAX(C2) as max_val FROM student_certificate where C1='AL' ";
        $inc = mysqli_query($conn,$sql1);
        $result = mysqli_fetch_array($inc);
        $result_inc = $result["max_val"] + 1;
              
        }
        elseif($game){  
          $sql1 = "SELECT MAX(C2) as max_val FROM student_certificate where Game='$game' AND Status!='VOLUNTEER' ";
        $inc = mysqli_query($conn,$sql1);
        $result = mysqli_fetch_array($inc);
        $result_inc = $result["max_val"] + 1;  
        } 
        while($row_g = mysqli_fetch_assoc($result_game))
        {
            $game_name = $row_g["Game"];
            if($game_name == "other" or $game_name == "Other" or $game_name == "OTHER")
            {
                $sql1 = "SELECT MAX(C2) as max_val FROM student_certificate where C1='OT' ";
        $inc = mysqli_query($conn,$sql1);
        $result = mysqli_fetch_array($inc);
        $result_inc = $result["max_val"] + 1;
            }
        }

        if($gender=='M')
        {
          $tag="Mr.";
        }
        else
        {
          $tag="Miss."; 
        }
        
        $sql_game = "SELECT Game FROM game_list";
        $result_game = mysqli_query($conn,$sql_game);
        
        if($status=="VOLUNTEER" and $game)
        {
        $sql2 = "SELECT Gcode from game_list WHERE Game='$status' ";
        $get_gcode = mysqli_query($conn,$sql2);
        $result_gcode = mysqli_fetch_array($get_gcode);
        $c1=$result_gcode["Gcode"];
        }
        elseif($status=="UMPIRE" and $game)
        {
          $sql2 = "SELECT Gcode from game_list WHERE Game='$status' ";
        $get_gcode = mysqli_query($conn,$sql2);
        $result_gcode = mysqli_fetch_array($get_gcode);
        $c1=$result_gcode["Gcode"];
        }
        elseif($status=="ALUMNI" and $game)
        {
          $sql2 = "SELECT Gcode from game_list WHERE Game='$status' ";
        $get_gcode = mysqli_query($conn,$sql2);
        $result_gcode = mysqli_fetch_array($get_gcode);
        $c1=$result_gcode["Gcode"];
        }
        elseif($game)
        {
           $sql2 = "SELECT Gcode from game_list WHERE Game='$game' ";
        $get_gcode = mysqli_query($conn,$sql2);
        $result_gcode = mysqli_fetch_array($get_gcode);
        $c1=$result_gcode["Gcode"];
        }
        
        while($row_g = mysqli_fetch_assoc($result_game))
        {
            $game_name = $row_g["Game"];
            if($game_name == "other" or $game_name == "Other" or $game_name == "OTHER")
            {
                $c1 ="OT";
            }
        }
       

        $stmt = $conn->prepare("INSERT into student_certificate(Enroll,Name,Class,Game,Status,Gender,Tag,C1,C2) VALUES (?,?,?,?,?,?,?,?,?) ");
        $stmt->bind_param("issssssss",$enrollno, $stud_name, $class, $game, $status, $gender, $tag, $c1, $result_inc);

        if($stmt->execute())
        {
        ?>
        <div class="w3-panel w3-pale-green w3-border" style="text-align: center;">
          <h3>Entry Successfully Registered<h3>
        </div>
        <?php

        }
        else{
          echo "ERROR.". mysqli_error($conn);
        }
        $stmt->close();
        $conn->close();
   }

 
?>



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
 
// AJAX call for autocomplete 
$(document).ready(function(){
  $("#name").keyup(function(){
    $.ajax({
    type: "POST",
    url: "get_name_suggetion.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#name").css("background","#FFFFFF");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#name").css("background","#FFFFFF");
    }
    });
  });
});
//To select student name
function selectName(val) {
$("#name").val(val);
$("#suggesstion-box").hide();
}

// AJAX call for autocomplete  for find student
$(document).ready(function(){
  $("#suggestion").keyup(function(){
    $.ajax({
    type: "POST",
    url: "get_name_suggetion.php",
    data:'keyword1='+$(this).val(),
    beforeSend: function(){
      $("#suggestion").css("background","#FFFFFF");
    },
    success: function(data){
      $("#suggesstion-box1").show();
      $("#suggesstion-box1").html(data);
      $("#suggetion").css("background","#FFFFFF");
    }
    });
  });
});
//To select country name
function selectName1(val) {
$("#suggestion").val(val);
$("#suggesstion-box1").hide();
}
</script>
</body>
</html>