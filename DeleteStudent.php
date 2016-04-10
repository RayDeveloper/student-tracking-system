<?php
 require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;

// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");



//$con=mysql_connect("localhost","root","usbw") or die("Could not connect");
//mysql_select_db("students") or die("Could not find db!");
//$output='';

if(isset($_POST['search'])){
  $search_sanitize=sanitize($_POST['search']);
  $Deletequery =("DELETE FROM uwi WHERE  StudentID='$search_sanitize' ");
  $db->doQuery($Deletequery);

 // mysql_query($Deletequery,$con);
};
$sql="SELECT * FROM uwi ";
$records=$db->doQuery($sql);


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

?>



<!doctype html>
<html>

<head>
  <title>Delete Student</title>
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


  <div id="wrapper">
  <div id="navmenu">

  <ul>
  <li class='active'><a href="#">Student</a>

  <ul>
  <li><a href="staffhome.php">Student List</a></li>
  <li><a href="findstudent.php">Find Student</a></li>
  <li><a href="addStudent.php">Add Student</a></li>
  <li><a href="EditStudent.php">Edit Student</a></li>
  <li><a class='active' href="DeleteStudent.php">Delete Student</a></li>
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
<H1 align="center">Delete  a student</H1>
<H3>Delete a student from the system</H3>

<form id="formy" action="DeleteStudent.php" method="post"/>
  <input type="text" name="search" required placeholder="Student ID Number"/>
  <input type="submit" name="submit" value= "Delete" />
</form>

<H1 align="center">Student listing</H1>
<table width="200" border="1" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
<th>First Name</th>
<th>Last Name</th>
<th>ID Number</th>
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

</tr>
<?php
while($employee=$records->fetch_assoc()){

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
</body>

<?php
if(isset($_POST['search'])){
$searchq=$_POST['search'];
//$searchq=preg_replace(("#[^0-9a-z]#i" ,"", $searchq);
$query="SELECT * FROM uwi WHERE StudentID like '".$searchq."' ";
$records=$db->doQuery($query);

//$count =mysql_num_rows($query);
//$count =count($records);


if($records){
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
while($row=$results->fetch_assoc()){

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
  echo "<td>" . "<input type=hidden name=hidden value=" . $row['StudentID'] . " </td>";
 echo "<td>" . "<input type=submit name=delete  value=Delete"  .  " </td>";
 echo "</table>";

 // $fname=$row['FirstName'];
  //$lname=$row['LastName'];
  //$id=$row['StudentID'];
 // $is=$row['1400'];
 }//end if
}//end issets



?>


</html>
