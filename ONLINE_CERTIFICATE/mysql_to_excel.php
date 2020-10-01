<?php  
include 'config.php';
$output = '';
 if(isset($_POST["downloadbtn"]))
{
 $query = "SELECT * FROM student_certificate";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Srno.</th>  
                         <th>Enroll</th>  
                         <th>Name</th>
                         <th>Class</th>
                         <th>Game</th>  
                         <th>Status</th>  
                         <th>Gender</th>  
                         <th>Code</th>
                    </tr>
  ';
  while($row1 = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row1["Srno"].'</td>  
                         <td>'.$row1["Enroll"].'</td>  
                         <td>'.$row1["Name"].'</td>  
                         <td>'.$row1["Class"].'</td>  
                         <td>'.$row1["Game"].'</td>
                         <td>'.$row1["Status"].'</td>  
                         <td>'.$row1["Gender"].'</td>
                         <td>'.$row1["C1"].'-'.$row1["C2"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=sport_participant.xls');
  echo $output;
 }
}
?>