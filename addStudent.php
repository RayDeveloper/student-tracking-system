<!doctype html>
<html>

<head>
  <title>Add Student</title>
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
  <li class='active'><a href="">Student</a>

  <ul>
  <li><a href="staffhome.php">Student List</a></li>
  <li><a href="findstudent.php">Find Student</a></li>
  <li><a class='active' href="addStudent.php">Add Student</a></li>
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

  <li><a href="Customquery.php">Custom Query</a>
  </li>

  <li><a href="logout.php">Log out</a>

  </li>

  </ul>
  </div>
  </div>
<H1 align="center">Add a student</H1>

<form action="insertdb.php" align="center" method="post">
  First name: <input type="text" required name="fname"><br>
  Last name: <input type="text" required name="lname"><br>
  Student ID: <input type="text" required name="ID"><br>
  1400:<input type="text" name="1400"><br>
  1500:<input type="text" name="1500"><br>
  1506:<input type="text" name="1506"><br>
  1405:<input type="text" name="1405"><br>
  1501:<input type="text" name="1501"><br>
  1502:<input type="text" name="1502"><br>
  1415:<input type="text" name="1415"><br>
  1503:<input type="text" name="1503"><br>
  1507:<input type="text" name="1507"><br>
  1420:<input type="text" name="1420"><br>
  1502_:<input type="text" name="1502_"><br>
  1504:<input type="text" name="1504"><br>
  1410:<input type="text" name="1410"><br>
  1505:<input type="text" name="1505"><br>
  1507_:<input type="text" name="1507_"><br>
  1425:<input type="text" name="1425"><br>
  1505_:<input type="text" name="1505_"><br>
  1506_:<input type="text" name="1506_"><br>
  2415:<input type="text" name="2415"><br>
  2420:<input type="text" name="2420"><br>
  2425:<input type="text" name="2425"><br>
  2430:<input type="text" name="2430"><br>
  2400:<input type="text" name="2400"><br>
  2405:<input type="text" name="2405"><br>
  2410:<input type="text" name="2410"><br>
  3400:<input type="text" name="3400"><br>
  3405:<input type="text" name="3405"><br>
  2500:<input type="text" name="2500"><br>
  3415:<input type="text" name="3415"><br>
  3440:<input type="text" name="3440"><br>
  3410:<input type="text" name="3410"><br>
  3420:<input type="text" name="3420"><br>
  3435:<input type="text" name="3435"><br>
  3490:<input type="text" name="3490"><br>
  3425:<input type="text" name="3425"><br>
  3430:<input type="text" name="3430"><br>
  3500:<input type="text" name="3500"><br>
  3520:<input type="text" name="3520"><br>
  3510:<input type="text" name="3510"><br>
  1101:<input type="text" name="1101"><br>
  1301:<input type="text" name="1301"><br>
  1102:<input type="text" name="1102"><br>
  1105:<input type="text" name="1105"><br>
  L1 Core/24: <input type="text" name="L1_Core"><br>
  L1 Electives: <input type="text" name="L1_Electives"><br>
  ADV Core: <input type="text" name="ADV_Core"><br>
  ADV Electives: <input type="text" name="ADV_Electives"><br>
  FOUN/9: <input type="text" name="FOUN"><br>
  Total Credits: <input type="text" name="Total_Credits"><br>
  Additional Courses: <input type="text" name="Additional_Courses"><br>
  Completed: <input type="text" name="Completed"><br>

  <input style="position: relative; left:300px; bottom:900px; height:100px; width:100px" type="submit" name="submit" value="Add Student">

</form>

</body>


</html>
