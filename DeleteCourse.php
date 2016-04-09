<?php
require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$course=FALSE;

// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");
$sql="SELECT * FROM Courses ";
$records=$db->doQuery($sql);

if(isset($_POST['coursecode'])){
  $Deletequery =("DELETE FROM Courses WHERE  Course_Code='$_POST[coursecode]' ");
  $db->doQuery($Deletequery);
  $new_code= str_replace("INFO","S",$_POST['coursecode']);

  // $sql3= "ALTER TABLE uwi DROP COLUMN $new_code";
  // $db->doQuery($sql3);

}
?>

<!doctype html>
<html>

<head>
  <title>Delete Course</title>
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
  <li><a href="#">Student</a>

  <ul>
  <li><a href="staffhome.php">Student List</a></li>
  <li><a href="findstudent.php">Find Student</a></li>
  <li><a href="addStudent.php">Add Student</a></li>
  <li><a href="EditStudent.php">Edit Student</a></li>
  <li><a href="DeleteStudent.php">Delete Student</a></li>

  </ul>
  </li>

  <li  class='active'><a href="#">Course</a>
  <ul>
    <li><a href="allCourses.php">Course Listing</a></li>
  <li><a href="addCourse.php">Add Course</a></li>
  <li><a href="editCourse.php">Edit Course</a></li>
  <li><a  class='active' href="DeleteCourse.php">Delete Course</a></li>
  </ul>
  </li>

  <li><a href="Customquery.php">Custom Report</a>
  </li>

  <li><a href="logout.php">Log out</a>

  </li>

  </ul>
  </div>
  </div>
<H1 align="center">Delete A Course</H1>
<H3>Delete a course from the system</H3>

<form action="DeleteCourse.php" align="center" method="post">
  <!-- Course Name: <input type="text" name="coursename"><br> -->
  Course Code: <input type="text" required name="coursecode"><br>
     <!-- <label >Choose Course Level</label></br>
  <input type="radio" name="level"  value="Level 1">Level 1<br>
  <input type="radio" name="level" value="Level 2" >Level 2<br>
  <input type="radio" name="level" value="Level 3" >Level 3<br>
  <input type="radio" name="level" value="Elective" >Elective<br>
  <input type="radio" name="level" value="Foundation Course" >Foundation Course<br> -->

  <input type="submit" name="submit" value="Delete Course">
</form>
<H1 align="center">All Courses</H1>
<table width="200" border="1" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
<th>Course Name</th>
<th>Course Code</th>
<th>Course Level</th>
<th>Course Credits</th>


<?php
while($course=$records->fetch_assoc()){
echo "<tr>";
echo "<td>".$course['Course_Name']."</td>";
echo "<td>".$course['Course_Code']."</td>";
echo "<td>".$course['Course_Level']."</td>";
echo "<td>".$course['Course_Credits']."</td>";


echo "</tr>";
}//end while


?>
</table>
</body>
<?php

 //$_CourseName = isset($_POST['coursename']) ? $_POST['coursename'] : '';
 //$_CourseCode = isset($_POST['coursecode']) ? $_POST['coursecode'] : '';

?>

</html>
