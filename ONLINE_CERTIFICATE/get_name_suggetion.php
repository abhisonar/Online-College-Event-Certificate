<?php
include 'config.php';
if(!empty($_POST["keyword"])) {
$query ="SELECT Name FROM main_student WHERE Name like '%" . $_POST["keyword"] . "%' ";
$result = mysqli_query($conn,$query);
if(!empty($result)) {
?>
<ul id="name-list">
<?php
while($get_name= mysqli_fetch_assoc($result)) {
?>
<li onClick="selectName('<?php echo $get_name["Name"]; ?>');"><?php echo $get_name["Name"]; ?></li>
<?php 
        } 
?>
</ul>
<?php 
  } 
}

if(!empty($_POST["keyword1"])) {
$query1 ="SELECT Name FROM main_student WHERE Name like '%" . $_POST["keyword1"] . "%' ";
$result1 = mysqli_query($conn,$query1);
if(!empty($result1)) {
?>
<ul id="name-list1">
<?php
while($get_name1= mysqli_fetch_assoc($result1)) {
?>
<li onClick="selectName1('<?php echo $get_name1["Name"]; ?>');"><?php echo $get_name1["Name"]; ?></li>
<?php 
        } 
?>
</ul>
<?php 
  } 
}

if(!empty($_POST["keyword2"])) {
$query2 ="SELECT Name FROM main_student WHERE Name like '%" . $_POST["keyword2"] . "%' ";
$result2 = mysqli_query($conn,$query2);
if(!empty($result2)) {
?>
<ul id="name-list2">
<?php
while($get_name2= mysqli_fetch_assoc($result2)) {
?>
<li onClick="selectName2('<?php echo $get_name2["Name"]; ?>');"><?php echo $get_name2["Name"]; ?></li>
<?php 
        } 
?>
</ul>
<?php 
  } 
}
?>