<?php 

require_once("lib/database.php");
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;
$data=[];
$count=0;
$value;
// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");


?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <!-- // <script src="script.js"></script> -->
    <link rel="stylesheet" href="css/admin.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body onload="startReportPageSetup();">
<div id='cssmenu'>
<ul>
   <li ><a href='staffhome.php'><span>Full Listing</span></a></li>
   <li ><a href='findStudent.php'><span>Find a Student</span></a></li>
   <li ><a href='#'><span>Day Students</span></a></li>
   <li><a href='#'><span>Evening Students</span></a></li>
   <li><a href='#'><span>Add A Student</span></a></li>
   <li><a href='EditStudent.php'><span>Edit Student</span></a></li>
   <li ><a href='DeleteStudent.php'><span>Delete a Student</span></a></li>
   <li><a href='#'><span>Add A Student</span></a></li>
    <li><a href='addCourse.php'><span>Add Course</span></a></li>
    <li ><a href='DeleteCourse.php'><span>Delete Course</span></a></li>
    <li class='active' ><a href='Customquery.php'><span>Custom Query</span></a></li>

   <li><a href='logout.php'><span>Logout</span></a></li>
 
</ul>
</div>
<H1 align="center">Custom Query</H1>
<h3 align="center"> Results</h3>
<?php
if ( isset($_POST['course']) && is_array($_POST['course']) ) {
  $course_name;

    foreach ( $_POST['course'] as $v => $value ) {
    	//echo "Value: $value<br>";
    	$nospace= str_replace("INFO","S",$value);
    	//echo "<br>";
    	$course = str_replace(' ', '', $nospace);
    	//echo "<br>";
    	//echo $course;
    	//echo "<br>";

      $sql="SELECT FirstName,LastName,StudentID,$course FROM uwi ";
      $sql_courseName="SELECT Course_Name From Courses where Course_Code LIKE '$value' ";
      //$sql_courseName="SELECT * From Courses ";
      //$sql "SELECT 's.FirstName','s.LastName','s.StudentID','c.Course_Name','c.Course_Code' FROM uwi AS s INNER JOIN Courses AS c" ;

      //echo($sql);
       //echo("<br>");
      //echo("$sql_courseName<br>");
      $records=$db->doQuery($sql);
      //print_r($records);
      $course_name=$db->doQuery($sql_courseName);
      // echo("<br>CourseName below<br>");
      //print_r($course_name);
      $coursy=$course_name->fetch_assoc();

       while($student=$records->fetch_assoc()){

            $data[$count]['StudentID']= $student['StudentID'];
            $data[$count]['Grade']=$student[$course];
            $count++;
        //echo $student['StudentID'];
        //echo $student[$course];
        //echo $student['FirstName'];
        //echo $student['LastName'];
        //echo $student[$course];

       // print_r( $student);



             //$data['StudentID']= $student['StudentID'];
            //$data['Grade']=$student['$value'];

        //$student=$student["FirstName"];
        //print_r($student) ;
        //echo ($student["FirstName"]);
        CreateTable($student,$coursy['Course_Name']);
        //echo json_encode($student);
       //print_r($student);
       // echo"data array:<br>";
       // print_r($data);
       // echo"<br>Count:$count<br>";
     }
     //echo json_encode($data);


    }
    echo json_encode($data);
}

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





      //   $getQuery="SELECT Word,Frequency FROM wordfrequency WHERE Word = '$key1'";
      //   $results=$db->doQuery($getQuery); 
      //   $num=$frequency['Frequency'];
      //   $num=$num+$row;

      //         array_push($data, $row); 
      // $row = $results->fetch_assoc();

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

        <script src="jslibs/highcharts/highcharts.js"></script>
        <script src="js/main.js"></script>
</body>
</html>