<?php 
$sqlString = '';
$db = FALSE;
$connection = FALSE;
$results = FALSE;
$row = FALSE;
$employee=FALSE;

// A variable to create an instance of the database class
$db = new DatabaseAdapter("students");
$sql="SELECT * FROM uwi ";
$records=$db->doQuery($sql);


?>

<!doctype html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login Form</title>
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

<H1 align="center">Full listing</H1>
<table width="200" border="1" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
<th>First Name</th>
<th>Last Name</th>
<th>ID Number</th>
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

</tr>
<?php
while($employee=$records->fetch_assoc()){

echo "<tr>";
echo "<td>".$employee['FirstName']."</td>";
echo "<td>".$employee['LastName']."</td>";
echo "<td>".$employee['StudentID']."</td>";
echo "<td>".$employee['S1400']."</td>";
echo "<td>".$employee['S1500']."</td>";
echo "<td>".$employee['S1506']."</td>";
echo "<td>".$employee['S1405']."</td>";
echo "<td>".$employee['S1501']."</td>";
echo "<td>".$employee['S1502']."</td>";
echo "<td>".$employee['S1415']."</td>";
echo "<td>".$employee['S1503']."</td>";
echo "<td>".$employee['S1507']."</td>";
echo "<td>".$employee['S1420']."</td>";
echo "<td>".$employee['S1502_']."</td>";
echo "<td>".$employee['S1504']."</td>";
echo "<td>".$employee['S1410']."</td>";
echo "<td>".$employee['S1505']."</td>";
echo "<td>".$employee['S1507_']."</td>";
echo "<td>".$employee['S1425']."</td>";
echo "<td>".$employee['S1505_']."</td>";
echo "<td>".$employee['S1506_']."</td>";
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
