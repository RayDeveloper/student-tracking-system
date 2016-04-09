<?php
require_once("lib/database.php");
/*
$host="localhost";
$user="root";
$pass="usbw";
$db="students";
$con=mysql_connect("localhost","root","usbw") or die("Could not connect");

mysql_select_db($db);


$sql="SELECT * FROM uwi ";
$records=mysql_query($sql,$con);
*/
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$results2 = FALSE;

$row = FALSE;
$employee=FALSE;
$tricks=FALSE;


// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");
$sql="SELECT * FROM uwi ";
$results=$db->doQuery($sql);

// $try="Show columns From courses";
// $results2=$db->doQuery($try);


//if(isset($_POST['mytext[]'])){
//  echo "inside";
// $text=$_POST['mytext[]'];

//echo "This is the line" .$text;

//$sql="INSERT INTO info (Data) VALUES ($text)";
//echo $sql;

 //print_r($_POST);//print out the whole post
  //print_r($_POST['mytext']);
//mysql_query($sql,$con);

//mysql_query($sql,$con);

/*
if(mysql_query($sql,$con)){
  header('Location:addStudent.php');
}else{
  echo "not inserted";
}
*/


//$sql="INSERT INTO info (Data) VALUES ('$text')";
//echo "$text";
//echo $sql;
?>

<!doctype html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Student Listing</title>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


</head>


<body>
  <div id="wrapper">
  <div id="navmenu">

  <ul>
  <li class='active'><a href="#">Student</a>

  <ul>
  <li><a class='active' href="staffhome.php">Student List</a></li>
  <li><a href="findstudent.php">Find Student</a></li>
  <li><a href="addStudent.php">Add Student</a></li>
  <li><a href="EditStudent.php">Edit Student</a></li>
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
<H1 align="center">Student listing</H1>
<H3>student listing displays the students that are currently in the system.</H3>
<br>
<br>
<br>
<br>
<br>
<table class="table table-bordered">
  <tr>
<th>First Name</th>
<th>Last Name</th>
<th>ID Number</th>
<!-- <th>1400</th> -->
<th>1500</th>
<th>1506</th>
<!-- <th>1405</th> -->
<th>1501</th>
<th>1502</th>
<!-- <th>1415</th> -->
<th>1503</th>
<th>1507</th>
<!-- <th>1420</th> -->
<!-- <th>1502_</th> -->
<th>1504</th>
<!-- <th>1410</th> -->
<th>1505</th>
<!-- <th>1507_</th> -->
<!-- <th>1425</th> -->
<!-- <th>1505_</th> -->
<!-- <th>1506_</th> -->
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

</tr>
<?php
while($employee=$results->fetch_assoc()){

echo "<tr>";
echo "<td>".$employee['FirstName']."</td>";
echo "<td>".$employee['LastName']."</td>";
echo "<td>".$employee['StudentID']."</td>";
// echo "<td>".$employee['S1400']."</td>";
echo "<td>".$employee['S1500']."</td>";
echo "<td>".$employee['S1506']."</td>";
// echo "<td>".$employee['S1405']."</td>";
echo "<td>".$employee['S1501']."</td>";
echo "<td>".$employee['S1502']."</td>";
// echo "<td>".$employee['S1415']."</td>";
echo "<td>".$employee['S1503']."</td>";
echo "<td>".$employee['S1507']."</td>";
// echo "<td>".$employee['S1420']."</td>";
// echo "<td>".$employee['S1502_']."</td>";
echo "<td>".$employee['S1504']."</td>";
// echo "<td>".$employee['S1410']."</td>";
echo "<td>".$employee['S1505']."</td>";
// echo "<td>".$employee['S1507_']."</td>";
// echo "<td>".$employee['S1425']."</td>";
// echo "<td>".$employee['S1505_']."</td>";
// echo "<td>".$employee['S1506_']."</td>";
echo "<td>".$employee['S2415']."</td>";
echo "<td>".$employee['S2420']."</td>";
echo "<td>".$employee['S2425']."</td>";
echo "<td>".$employee['S2430']."</td>";
echo "<td>".$employee['S2400']."</td>";
echo "<td>".$employee['S2405']."</td>";
echo "<td>".$employee['S2410']."</td>";
echo "<td>".$employee['S3400']."</td>";
echo "<td>".$employee['S3405']."</td>";
echo "<td>".$employee['S2500']."</td>";
echo "<td>".$employee['S3415']."</td>";
echo "<td>".$employee['S3440']."</td>";
echo "<td>".$employee['S3410']."</td>";
echo "<td>".$employee['S3420']."</td>";
echo "<td>".$employee['S3435']."</td>";
echo "<td>".$employee['S3490']."</td>";
echo "<td>".$employee['S3425']."</td>";
echo "<td>".$employee['S3430']."</td>";
echo "<td>".$employee['S3500']."</td>";
echo "<td>".$employee['S3520']."</td>";
echo "<td>".$employee['S3510']."</td>";
echo "<td>".$employee['S1101']."</td>";
echo "<td>".$employee['S1301']."</td>";
echo "<td>".$employee['S1102']."</td>";
echo "<td>".$employee['S1105']."</td>";
echo "<td>".$employee['L1_Core']."</td>";
echo "<td>".$employee['L1_Electives']."</td>";
echo "<td>".$employee['ADV_Core']."</td>";
echo "<td>".$employee['ADV_Electives']."</td>";
echo "<td>".$employee['FOUN']."</td>";
echo "<td>".$employee['Total_Credits']."</td>";
echo "<td>".$employee['Additional_Courses']."</td>";
echo "<td>".$employee['Completed']."</td>";



echo "</tr>";


}//end while

?>
</table>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/morefields.js" type="text/javascript" defer="defer"></script>

</body>

</html>
