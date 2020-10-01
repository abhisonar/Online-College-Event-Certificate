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
    <title>GPN CERTIFICATE ONLINE</title>



    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    body{
        transition: background-color .5s;
    }

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

    input{
    
        border-radius: 20px;
        outline: none;
        border: 2px thin;
        padding: 10px 10px;
        text-align: center;
        border-style: none;
    }
    input[type=submit]{
        background: linear-gradient(to top right, #00ccff 0%, #ff66cc 100%);
        width: 20%;
    }
     input[type=number]{
        background: linear-gradient(to top right, #00ccff 0%, #ff66cc 100%);
        width: 100%;
        font-size: 25px;
        color: black;
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

</style>

</script>

</head>
<body>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="admin.php">Admin</a>
    <a href="display_students.php">Student Data</a>
    <a href="add_user.php">Add User</a>
    <a href="add_student.php">Add Student</a>
    <a href="logout.php">Logout</a>
</div>
<div class="container-fluid w3-panel w3-card-4">
         <div class="w3-container w3-yellow w3-panel w3-card-2" style="font-size:30px;cursor:pointer;padding:10px 10px 10px 10px ;margin: 0px; border-radius: 20px; text-align: left;">
            <span  onclick="openNav()">&#9776;</span>
            </div>
        <div class="container" id="main">
            
            <h1>GOVERNMENT POLYTECHNIC NANDURBAR</h1><br>
            <h2> WELCOME TO UMANG 2019-2020 SPORTS ADMIN PANEL</h2><br>
            
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
</script>
</body>
</html>