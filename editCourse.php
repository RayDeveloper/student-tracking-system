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
$UpdateQuery="UPDATE courses SET Course_Name= '$_POST[course_name]',
  Course_Code='$_POST[course_code]',
  Course_Level='$_POST[course_level]' WHERE Course_Code='$_POST[hidden]'";

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
   <script src="script.js"></script>
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
  <div id="wrapper">
  <div id="navmenu">

  <ul>
  <li ><a href="">Student</a>

  <ul>
  <li><a href="staffhome.php">Student List</a></li>
  <li><a href="findstudent.php">Find Student</a></li>
  <li><a href="addStudent.php">Add Student</a></li>
  <li><a  href="EditStudent.php">Edit Student</a></li>
  <li><a href="DeleteStudent.php">Delete Student</a></li>
  </ul>
  </li>

  <li class='active'><a href="">Course</a>
  <ul>
    <li><a href="allCourses.php">Course Listing</a></li>
    <li><a href="addCourse.php">Add Course</a></li>
  <li><a class='active' href="editCourse.php">Edit Course</a></li>
  <li><a href="DeleteCourse.php">Delete Course</a></li>
  </ul>
  </li>

  <li><a href="Customquery.php">Custom Query</a>
  </li>

  <li><a href="logout.php">Log out</a>

  </li>

  </ul>
  </div>
  </div>
  <H1 align="center">Edit Course</H1>
  <form id="formy" action="editCourse.php" method="post"/>
    <input type="text" name="search" required placeholder="Course Code"/>
    <input type="submit" name="submit" value= "Search" />
  </form>

  </body>

  <?php


  global $searchq;
    if(isset($_POST['search'])){
  $searchq=$_POST['search'];

  //$searchq=preg_replace(("#[^0-9a-z]#i" ,"", $searchq);
  $query="SELECT * FROM courses WHERE Course_Code like '$searchq' ";
  $results=$db->doQuery($query);
  $count=count($results);
  //print_r($results);
  //$count =mysql_num_rows($query);
  if($count==0){
   $output='There was no search results';
   }else{
  echo "<table width=200 border=1 cellpadding=1 cellspacing=1 class=table table-bordered>
    <tr>
    <th>Course Name</th>
    <th>Course Code</th>
    <th>Course Level</th>
    </tr>";
while($row=$results->fetch_array()){
  echo "<form action=editCourse.php method=post>";
  echo "<tr>";
  echo "<td> <input type='text' name='course_name' value='$row[Course_Name]'  </td>";
  echo "<td> <input type='text' name='course_code' value='$row[Course_Code]'  </td>";
  echo "<td> <input type='text' name='course_level' value='$row[Course_Level]'  </td>";
  echo "</tr>";
  echo "<td> <input type=hidden name=hidden value='$row[Course_Code]'  </td>";
  echo "<td>" . "<input type=submit name='update' value=update"  .  " </td>";

  echo "</form>";
}
echo"</table>";

}
}

?>

</html>