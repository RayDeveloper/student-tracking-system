<?php
require_once("lib/database.php");

//$con=mysql_connect("localhost","root","usbw") or die("Could not connect");
//mysql_select_db("students") or die("Could not find db!");
$output='';
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;

// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");



if(isset($_POST['update'])){
$UpdateQuery ="UPDATE uwi SET FirstName='$_POST[fname]' , LastName='$_POST[lname]' ,
StudentID='$_POST[SID]' , S1500='$_POST[S1500]' ,S1506='$_POST[S1506]', S1501='$_POST[S1501]' , S1502='$_POST[S1502]',
 S1503='$_POST[S1503]' , S1507='$_POST[S1507]' , S1504='$_POST[S1504]' ,
  S1505='$_POST[S1505]', S2415='$_POST[S2415]' ,
 S2420='$_POST[S2420]', S2425='$_POST[S2425]' , S2430='$_POST[S2430]' , S2400='$_POST[S2400]' ,
 S2405='$_POST[S2405]' , S2410='$_POST[S2410]' , S3400='$_POST[S3400]',  S3405='$_POST[S3405]' , S2500= '$_POST[S2500]' , S3415='$_POST[S3415]' , S3440='$_POST[S3440]'  ,S3410='$_POST[S3410]' , S3420='$_POST[S3420]' ,
 S3435='$_POST[S3435]' , S3490='$_POST[S3490]'  ,
 S3425='$_POST[S3425]' , S3430='$_POST[S3430]' , S3500='$_POST[S3500]',
 S3520='$_POST[S3520]' , S3510='$_POST[S3510]' , S1101='$_POST[S1101]' ,
 S1301='$_POST[S1301]' , S1102='$_POST[S1102]' , S1105='$_POST[S1105]' ,
 L1_Core='$_POST[L1_Core]' , L1_Electives='$_POST[L1_Electives]' , ADV_Core='$_POST[ADV_Core]' ,
 ADV_Electives='$_POST[ADV_Electives]' , FOUN='$_POST[FOUN]' , Total_Credits='$_POST[Total_Credits]' ,
 Additional_Courses='$_POST[Additional_Courses]' , Completed='$_POST[Completed]'  WHERE StudentID='$_POST[hidden]' ";
$db->doQuery($UpdateQuery);

}



?>



<!doctype html>
<html>

<head>
  <title>Edit Student</title>
  <meta charset="UTF-8">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/main.js"></script>
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>


<!-- <div id='cssmenu'>
<ul>
   <li ><a href='staffhome.php'><span>Full Listing</span></a></li>
   <li ><a href='findStudent.php'><span>Find a Student</span></a></li>
   <li><a href='addStudent.php'><span>Add A Student</span></a></li>
   <li class='active'><a href='EditStudent.php'><span>Edit Student</span></a></li>
   <li ><a href='DeleteStudent.php'><span>Delete a Student</span></a></li>
      <li><a href='DeleteCourse.php'><span>Delete Course</span></a></li>
   <li><a href='AddCourse.php'><span>Add Course</span></a></li>
   <li><a href='Customquery.php'><span>Custom Query</span></a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>
</ul>
</div> -->
<div id="wrapper">
<div id="navmenu">

<ul>
<li class='active'><a href="#">Student</a>

<ul>
<li><a href="staffhome.php">Student List</a></li>
<li><a href="findstudent.php">Find Student</a></li>
<li><a href="addStudent.php">Add Student</a></li>
<li><a class='active' href="EditStudent.php">Edit Student</a></li>
<li><a href="DeleteStudent.php">Delete Student</a></li>
</ul>
</li>

<li><a href="#">Course</a>
<ul>
  <li><a href="allCourses.php">Course Listing</a></li>
<li><a href="addCourse.php">Add Course</a></li>
<li><a href="editCourse.php">Edit Course</a></li>
<li><a href="DeleteCourse.php">Delete Course</a></li>
</ul>
</li>

<li><a href="Customquery.php">Custom Report</a>
</li>

<li><a href="logout.php">Log out</a>

</li>

</ul>
</div>
</div>
<H1 align="center">Edit student</H1>
<H3>the option to edit a student by entering their ID number.</H3>

<form  action="editStudent.php" align="center" method="post"/>
  <input type="text" name="search" required placeholder="Student ID Number"/>
  <input type="submit" name="submit"  value= "Search" />
</form>

</body>

<?php


global $searchq;
  if(isset($_POST['search'])){
$searchq=sanitize($_POST['search']);
if(strlen($searchq)< 9){
echo "<script type='text/javascript'>alert('The ID number you entered is too short.');</script>";
}else if (strlen($searchq)> 9){
  echo "<script type='text/javascript'>alert('The ID number you entered is too long.');</script>";
}else{
//$searchq=preg_replace(("#[^0-9a-z]#i" ,"", $searchq);
$query="SELECT * FROM uwi WHERE StudentID like '".$searchq."' ";
$results=$db->doQuery($query);
//$count=count($results);
//print_r($results);
//$count =mysql_num_rows($query);

if($results->num_rows==0){
 // $output='There was no search results';
 echo "<script type='text/javascript'>alert('The student does not exist.');</script>";

 }else{
echo "<table width=200 border=1 cellpadding=1 cellspacing=1 class=table table-bordered>
  <tr>
  <tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Student ID</th>
  <th>1500</th>
<th>1506</th>
<th>1501</th>
<th>1502</th>
<th>1503</th>
<th>1507</th>
<th>1504</th>
<th>1505</th>
<th>2415</th>
<th>2420</th>
<th>2425</th>
<th>2430</th>
<th>2400</th>
<th>2405</th>
<th>2410</th>
<th>3400</th>
<th>3405</th>
<th>2500</th>
<th>3415</th>
<th>3440</th>
<th>3410</th>
<th>3420</th>
<th>3435</th>
<th>3490</th>
<th>3425</th>
<th>3430</th>
<th>3500</th>
<th>3520</th>
<th>3510</th>
<th>1101</th>
<th>1301</th>
<th>1102</th>
<th>1105</th>
<th>L1 Core/24</th>
<th>L1 Electives</th>
<th>ADV Core/48</th>
<th>ADV Electvies</th>
<th>FOUNDATION /9</th>
<th>Total Credits</th>
<th>Additional Courses</th>
<th>Completed</th>
  </tr>";

while($row=$results->fetch_array()){
echo "<form id='editStudent' action='EditStudent.php' method='post'>";
 echo "<tr>";
 echo "<td> <input type='text' name='fname' value='$row[FirstName]'/>  </td>";
 echo "<td> <input type='text' name='lname' value='$row[LastName]' /></td>";
 echo "<td> <input type='text' name='SID' value='$row[StudentID]'/>  </td>";
 // echo "<td>" . "<input type=text name=S1400 value=" . $row['S1400'] . " </td>";
 //echo "<td>" . "<input type=text name=S1500 value=" . $row['S1500'] .  "</td> ";
 echo "<td>  <input type='text' name='S1500' value= '$row[S1500]' />   </td> ";
 echo "<td>  <input type='text' name='S1506' value='$row[S1506]' /> </td> ";
 // echo "<td>" . "<input type=text name=S1405 value=" . $row['S1405'] . " </td>";
 echo "<td> <input type='text' name='S1501' value=' $row[S1501] ' /> </td> ";
 echo "<td> <input type='text' name='S1502' value=' $row[S1502] ' /> </td> ";
 // echo "<td>" . "<input type=text name=S1415 value=" . $row['S1415'] . " </td>";
 echo "<td>  <input type='text' name='S1503' value='$row[S1503]' /> </td> ";

 echo "<td> <input type='text' name='S1507' value=' $row[S1507] ' /> </td>";
 // echo "<td>" . "<input type=text name=S1420 value=" . $row['S1420'] . " </td>";
 // echo "<td>" . "<input type=text name=S1502_ value=" . $row['S1502_'] . " </td>";
 echo "<td>  <input type='text' name='S1504' value='$row[S1504]' /> </td> ";

 // echo "<td>" . "<input type=text name=S1410 value=" . $row['S1410'] . " </td>";
 echo "<td> <input type='text' name='S1505' value='$row[S1505]' /> </td>";
 // echo "<td>" . "<input type=text name=S1507_ value=". $row['S1507_'] . " </td>";
 // echo "<td>" . "<input type=text name=S1425 value=" . $row['S1425'] . " </td>";
 // echo "<td>" . "<input type=text name=S1505_ value=" . $row['S1505_'] . " </td>";
 // echo "<td>" . "<input type=text name=S1506_ value=" . $row['S1506_'] . " </td>";
 echo "<td> <input type='text' name='S2415' value='$row[S2415]' /> </td>";
 echo "<td> <input type='text' name='S2420' value='$row[S2420]' /></td>";
 echo "<td> <input type='text' name='S2425' value= '$row[S2425]'/> </td>";
 echo "<td> <input type='text' name='S2430' value='$row[S2430]' /></td>";
 echo "<td> <input type='text' name='S2400' value='$row[S2400]'/> </td>";
 echo "<td> <input type='text' name='S2405' value=' $row[S2405]'/> </td>";
 echo "<td> <input type='text' name='S2410' value='$row[S2410]' /></td>";
 echo "<td> <input type='text' name='S3400' value='$row[S3400]' /></td>";
 echo "<td> <input type='text' name='S3405' value='$row[S3405]'/> </td>";
 echo "<td> <input type='text' name='S2500' value= '$row[S2500]'/> </td>";
 echo "<td> <input type='text' name='S3415' value='$row[S3415]'/> </td>";
 echo "<td> <input type='text' name='S3440' value='$row[S3440]'/> </td>";
 echo "<td> <input type='text' name='S3410' value='$row[S3410]'/> </td>";
 echo "<td> <input type='text' name='S3420' value='$row[S3420]' /></td>";
 echo "<td> <input type='text' name='S3435' value=' $row[S3435]'/> </td>";
 echo "<td> <input type='text' name='S3490' value='$row[S3490]'/> </td>";
 echo "<td> <input type='text' name='S3425' value='$row[S3425]'/> </td>";
 echo "<td> <input type='text' name='S3430' value='$row[S3430]' /></td>";
 echo "<td> <input type='text' name='S3500' value=' $row[S3500]'/> </td>";
 echo "<td> <input type='text' name='S3520' value=' $row[S3520]'/> </td>";
 echo "<td> <input type='text' name='S3510' value='$row[S3510]'/> </td>";
 echo "<td> <input type='text' name='S1101' value=' $row[S1101]'/> </td>";
 echo "<td> <input type='text' name='S1301' value='$row[S1301]'/> </td>";
 echo "<td> <input type='text' name='S1102' value='$row[S1102]'/> </td>";
 echo "<td> <input type='text' name='S1105' value='$row[S1105]'/> </td>";
 echo "<td> <input type='text' name='L1_Core' value='$row[L1_Core]'/> </td>";
 echo "<td> <input type='text' name='L1_Electives' value='$row[L1_Electives]'/> </td>";
 echo "<td> <input type='text' name='ADV_Core' value= '$row[ADV_Core]'/> </td>";
 echo "<td> <input type='text' name='ADV_Electives' value='$row[ADV_Electives]'/> </td>";
 echo "<td> <input type='text' name='FOUN' value='$row[FOUN]'/> </td>";
 echo "<td> <input type='text' name='Total_Credits' value='$row[Total_Credits]'/> </td>";
 echo "<td> <input type='text' name='Additional_Courses' value='$row[Additional_Courses]'/> </td>";
 echo "<td> <input type='text' name='Completed' value='$row[Completed]'/> </td>";
 echo "</tr>";
 echo "<td>" . "<input type=hidden name=hidden value=" . $row['StudentID'] . " </td>";
 echo "<td> <input type='submit' onclick='editStudent_confirm();' name='update' value='update' </td>";
 echo "</form>";
  }//end while
  echo "</table>";



 // $fname=$row['FirstName'];
  //$lname=$row['LastName'];
  //$id=$row['StudentID'];
 // $is=$row['1400'];
 }//end if
 }
 } //end isset

 function sanitize($input) {
     if (is_array($input)) {
         foreach($input as $var=>$val) {
             $output[$var] = sanitize($val);
         }
     }
     else {
         if (get_magic_quotes_gpc()) {
             $input = stripslashes($input);
         }
         $input  = cleanInput($input);
         $output = mysql_real_escape_string($input);
     }
     return $output;
 }

 function cleanInput($input) {

   $search = array(
     '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
     '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
     '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
     '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
   );

     $output = preg_replace($search, '', $input);
     return $output;
   }


function viewEdit(){


if(isset($_POST['search'])){
$searchq=$_POST['search'];
//$searchq=preg_replace(("#[^0-9a-z]#i" ,"", $searchq);
$query="SELECT * FROM uwi WHERE StudentID like '".$searchq."' ";
$results=$db->doQuery($query);

if($results==0){
 $output='There was no search results';
 }else{
echo "<table width=200 border=1 cellpadding=1 cellspacing=1 class=table table-bordered>
  <tr>
  <tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Student ID</th>
  <th>1500</th>
<th>1506</th>
<th>1501</th>
<th>1502</th>
<th>1503</th>
<th>1507</th>
<th>1504</th>
<th>1505</th>
<th>2415</th>
<th>2420</th>
<th>2425</th>
<th>2430</th>
<th>2400</th>
<th>2405</th>
<th>2410</th>
<th>3400</th>
<th>3405</th>
<th>2500</th>
<th>3415</th>
<th>3440</th>
<th>3410</th>
<th>3420</th>
<th>3435</th>
<th>3490</th>
<th>3425</th>
<th>3430</th>
<th>3500</th>
<th>3520</th>
<th>3510</th>
<th>1101</th>
<th>1301</th>
<th>1102</th>
<th>1105</th>
<th>L1 Core/24</th>
<th>L1 Electives</th>
<th>ADV Core/48</th>
<th>ADV Electvies</th>
<th>FOUNDATION /9</th>
<th>Total Credits</th>
<th>Additional Courses</th>
<th>Completed</th>
  </tr>";
while($row=$results->fetch_array()){
 echo "<tr>";
echo "<td>".$row['FirstName']."</td>";
echo "<td>".$row['LastName']."</td>";
echo "<td>".$row['StudentID']."</td>";
// echo "<td>".$row['S1400']."</td>";
echo "<td>".$row['S1500']."</td>";
echo "<td>".$row['S1506']."</td>";
// echo "<td>".$row['S1405']."</td>";
echo "<td>".$row['S1501']."</td>";
echo "<td>".$row['S1502']."</td>";
// echo "<td>".$row['S1415']."</td>";
echo "<td>".$row['S1503']."</td>";
echo "<td>".$row['S1507']."</td>";
// echo "<td>".$row['S1420']."</td>";
// echo "<td>".$row['S1502_']."</td>";
echo "<td>".$row['S1504']."</td>";
// echo "<td>".$row['S1410']."</td>";
echo "<td>".$row['S1505']."</td>";
// echo "<td>".$row['S1507_']."</td>";
// echo "<td>".$row['S1425']."</td>";
// echo "<td>".$row['S1505_']."</td>";
// echo "<td>".$row['S1506_']."</td>";
echo "<td>".$row['S2415']."</td>";
echo "<td>".$row['S2420']."</td>";
echo "<td>".$row['S2425']."</td>";
echo "<td>".$row['S2430']."</td>";
echo "<td>".$row['S2400']."</td>";
echo "<td>".$row['S2405']."</td>";
echo "<td>".$row['S2410']."</td>";
echo "<td>".$row['S3400']."</td>";
echo "<td>".$row['S3405']."</td>";
echo "<td>".$row['S2500']."</td>";
echo "<td>".$row['S3415']."</td>";
echo "<td>".$row['S3440']."</td>";
echo "<td>".$row['S3410']."</td>";
echo "<td>".$row['S3420']."</td>";
echo "<td>".$row['S3435']."</td>";
echo "<td>".$row['S3490']."</td>";
echo "<td>".$row['S3425']."</td>";
echo "<td>".$row['S3430']."</td>";
echo "<td>".$row['S3500']."</td>";
echo "<td>".$row['S3520']."</td>";
echo "<td>".$row['S3510']."</td>";
echo "<td>".$row['S1101']."</td>";
echo "<td>".$row['S1301']."</td>";
echo "<td>".$row['S1102']."</td>";
echo "<td>".$row['S1105']."</td>";
echo "<td>".$row['L1_Core']."</td>";
echo "<td>".$row['L1_Electives']."</td>";
echo "<td>".$row['ADV_Core']."</td>";
echo "<td>".$row['ADV_Electives']."</td>";
echo "<td>".$row['FOUN']."</td>";
echo "<td>".$row['Total_Credits']."</td>";
echo "<td>".$row['Additional_Courses']."</td>";
echo "<td>".$row['Completed']."</td>";
echo "</tr>";
 }//end while
 echo "</table>";
 // $fname=$row['FirstName'];
  //$lname=$row['LastName'];
  //$id=$row['StudentID'];
 // $is=$row['1400'];
 }//end if
}//end isset
}//end function viewEdit();




?>


</html>
