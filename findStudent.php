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

$output='';
?>



<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>


<div id='cssmenu'>
<ul>
   <li ><a href='staffhome.php'><span>Full Listing</span></a></li>
   <li class='active'><a href='findStudent.php'><span>Find a Student</span></a></li>
   <li><a href='addStudent.php'><span>Add A Student</span></a></li>
      <li><a href='EditStudent.php'><span>Edit Student</span></a></li>
   <li ><a href='DeleteStudent.php'><span>Delete a Student</span></a></li>
   <li><a href='AddCourse.php'><span>Add Course</span></a></li>
   <li><a href='DeleteCourse.php'><span>Delete Course</span></a></li>
   <li><a href='Customquery.php'><span>Custom Query</span></a></li>
   <li><a href='logout.php'><span>Logout</span></a></li>

</ul>
</div>
<H1 align="center">Search for a student</H1>
<form id="formy" action="findStudent.php" method="post"/>
  <input type="text" name="search" placeholder="Student ID Number"/>
  <input type="submit" name="submit" value= "Search" />
</form>

</body>
<?php

if(isset($_POST['search'])){
$searchq=$_POST['search'];
//$searchq=preg_replace(("#[^0-9a-z]#i" ,"", $searchq);
$query="SELECT * FROM uwi WHERE StudentID like '".$searchq."' ";
$results=$db->doQuery($query);
$count=count($results);


if($count==0){
 $output='There was no search results';
 }else{
echo "<table width=200 border=1 cellpadding=1 cellspacing=1 class=table table-bordered>
  <tr>
  <tr>
  <th>First Name</th>
  <th>Last Name</th>
  <th>Student ID</th>
  <th>1400</th>
  <th>1500</th>
<th>1506</th>
<th>1405</th>
<th>1501</th>
<th>1502</th>
<th>1415</th>
<th>1503</th>
<th>1507</th>
<th>1420</th>
<th>1502_</th>
<th>1504</th>
<th>1410</th>
<th>1505</th>
<th>1507_</th>
<th>1425</th>
<th>1505_</th>
<th>1506_</th>
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
echo "<td>".$row['S1400']."</td>";
echo "<td>".$row['S1500']."</td>";
echo "<td>".$row['S1506']."</td>";
echo "<td>".$row['S1405']."</td>";
echo "<td>".$row['S1501']."</td>";
echo "<td>".$row['S1502']."</td>";
echo "<td>".$row['S1415']."</td>";
echo "<td>".$row['S1503']."</td>";
echo "<td>".$row['S1507']."</td>";
echo "<td>".$row['S1420']."</td>";
echo "<td>".$row['S1502_']."</td>";
echo "<td>".$row['S1504']."</td>";
echo "<td>".$row['S1410']."</td>";
echo "<td>".$row['S1505']."</td>";
echo "<td>".$row['S1507_']."</td>";
echo "<td>".$row['S1425']."</td>";
echo "<td>".$row['S1505_']."</td>";
echo "<td>".$row['S1506_']."</td>";
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

?>

</html>
