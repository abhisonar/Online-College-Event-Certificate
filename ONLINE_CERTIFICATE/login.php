<?php
include('config.php');
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admin.php");
    exit;
}

 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, Username, Password FROM admin_login WHERE Username ='$username' and Password ='$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)==1){

            session_start();

            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header('location:admin.php');

        }
        else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
        
    }
    
}
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    </style>
</head>
<body>

    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Admin</a>
    <a href="index.html">Back to the Certificate Section</a>
    </div>
    <div class="container w3-panel w3-card-4">
        <div class="w3-container w3-yellow w3-panel w3-card-2" style="font-size:30px;cursor:pointer;padding:10px 10px 10px 10px ;margin: 0px; border-radius: 20px; text-align: left;">
            <div class="row">
                <div class="col-sm-1">
                 <span  onclick="openNav()">&#9776;</span>
                </div>
                <div class="col-sm-10" style="text-align: center;">
                    <h1>Admin Login</h1>
                </div>
                <div class="col-sm-1"></div>
            </div>
         </div>
        <div class="container" id="main">
           
            <p>Please fill in your credentials to login.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label><h3>Username</h3></label>
                    <input type="text" style="text-align: center;" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label><h3>Password</h3></label>
                    <input type="password" style="text-align: center;" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" style="padding: 10px; outline-style: none; border-radius: 10px; border-style: thin black; width: 50%; font-size: 20px;" class="w3-container w3-yellow" value="Login">
                </div>
            </form>
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