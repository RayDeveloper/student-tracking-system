<?php

require_once("lib/database.php");



$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;
$data= array();
$fail_var=0;
$pass_var=0;
     $pass=array();
     $fail=array();
     $data=array();

$value;
$student=0;
// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");


?>

<!doctype html>
<html>

<head>
  <title>Display Results</title>
  <meta charset="UTF-8">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!-- // <script src="script.js"></script> -->
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

</head>
<!-- <body> -->
<body onload="startReportPageSetup();">
  <div id="wrapper">
  <div id="navmenu">

  <ul>
  <li><a href="">Student</a>

  <ul>
  <li><a href="staffhome.php">Student List</a></li>
  <li><a href="findstudent.php">Find Student</a></li>
  <li><a href="addStudent.php">Add Student</a></li>
  <li><a href="EditStudent.php">Edit Student</a></li>
  <li><a href="DeleteStudent.php">Delete Student</a></li>

  </ul>
  </li>

  <li><a href="">Course</a>
  <ul>
    <li><a href="allCourses.php">Course Listing</a></li>
  <li><a href="addCourse.php">Add Course</a></li>
  <li><a href="editCourse.php">Edit Course</a></li>
  <li><a href="DeleteCourse.php">Delete Course</a></li>
  </ul>
  </li>

  <li class='active'><a href="Customquery.php">Custom Query</a>
  </li>

  <li><a href="logout.php">Log out</a>

  </li>

  </ul>
  </div>
  </div>
<H1 align="center">Custom Query</H1>
<h3 align="center"> Results</h3>
<?php
if ( isset($_POST['course']) && is_array($_POST['course']) ) {
  $course_name;
$course;
$coursy;
    foreach ( $_POST['course'] as $v => $value ) {
    	//echo "Value:$value <br>";
      if (strpos($value, 'FOUN') !== false) {
        $nospace= str_replace("FOUN","S",$value);
        //echo "<br>";
        $course = str_replace(' ', '', $nospace);
        $sql="SELECT FirstName,LastName,StudentID,$course FROM uwi ";
        $sql_courseName="SELECT Course_Name From Courses where Course_Code LIKE '$value' ";
        //echo $sql_courseName;
        $records=$db->doQuery($sql);
        //print_r($records);
        $course_name=$db->doQuery($sql_courseName);
        // echo("<br>CourseName below<br>");
        //print_r($course_name);
        $coursy=$course_name->fetch_assoc();

         while($student=$records->fetch_assoc()){
           CreateTable($student,$coursy['Course_Name']);
           //echo($coursy['Course_Name']);

         }


}else{
  $nospace= str_replace("INFO","S",$value);
  //echo "<br>";
  $course = str_replace(' ', '', $nospace);
  $sql="SELECT FirstName,LastName,StudentID,$course FROM uwi ";
  $sql_courseName="SELECT Course_Name From Courses where Course_Code LIKE '$value' ";
  //echo $sql_courseName;
  $records=$db->doQuery($sql);
  $course_name=$db->doQuery($sql_courseName);
  $coursy=$course_name->fetch_assoc();

   while($student=$records->fetch_assoc()){
     CreateTable($student,$coursy['Course_Name']);
     //echo($coursy['Course_Name']);

   }
}
}
}
    	//echo "<br>";
//     	//echo $course;
//     	//echo "<br>";
//       $trydata=array();
//       $sql="SELECT FirstName,LastName,StudentID,$course FROM uwi ";
//       $sql_courseName="SELECT Course_Name From Courses where Course_Code LIKE '$value' ";
//       //$sql_courseName="SELECT * From Courses ";
//       //$sql "SELECT 's.FirstName','s.LastName','s.StudentID','c.Course_Name','c.Course_Code' FROM uwi AS s INNER JOIN Courses AS c" ;
//
//       //echo($sql);
//        //echo("<br>");
//       //echo("$sql_courseName<br>");
//       $records=$db->doQuery($sql);
//       //print_r($records);
//       $course_name=$db->doQuery($sql_courseName);
//       // echo("<br>CourseName below<br>");
//       //print_r($course_name);
//       $coursy=$course_name->fetch_assoc();
//
//        while($student=$records->fetch_assoc()){
//         ///foreach($student as $key => $val){
//          // for($i=0;$i<count($student);$i++){
//            if($student[$course]==4||$student[$course]==6){
//             $SID=$student['StudentID'];
//
//               if (!isset($data[$SID]))
//               $data[$SID] = array();
//               //$data[$SID]['Grade']=$student[$course];
//               //$data[$SID]=$student[$course];
//               array_push($trydata, $student[$course]);
//           }else{
//
//           }
//         CreateTable($student,$coursy['Course_Name']);
//      }
//
//
//
//     }
//     //echo json_encode($data);
//     //echo json_encode($trydata);
//
//
// }


function CreateTable($tableData,$course_name){
//display data better than this
  //Remove the S and put the INFO in

  echo "<table class='table table-bordered'>";
  // echo '<tr>
  // <th>Word</th>
  // <th>Score</th>
  // </tr>';
  foreach ($tableData as $key1 => $row) {
      echo "<tr> <th>$key1</th><td>$row</td> </tr>";
  }
  echo "<tr><th>$course_name</th></tr>";
  echo "</tbody>";
  echo '</table>';

}


?>

<div  id="chart_container">
    <div id"chart_sec"></div>
</div>
<div class="col-md-4">
<h4>Chart Options</h4>
<div class="form-group">
<h5>Chart Types</h5>
<select class="form-control"  id="select_graph">
<option>select chart</option>
<option>Pie Chart</option>
<option>Bar Chart</option>
</select>
</div>
<div class="form-group">
<h5>Data Sources</h5>
<!-- <label class="radio-inline">
<input type="radio" name="datasrc" checked value="json"  class="datasrc">JSON File
</label>
 --><label class="radio-inline">
<input type="radio" name="datasrc" checked value="php" class="datasrc"> PHP API
</label>
</div>
</div>
 </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="jslibs/jquery/dist/jquery.min.js"></script>
        <script src="jslibs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="jslibs/highcharts/highcharts.js"></script>
        <script src="js/main.js"></script>
</body>
</html>
