<!DOCTYPE html>
<?php
//Create connection
$con=mysqli_connect("localhost","root","0123456","clinic");
//Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>The Clinic</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/patientbutton.css">
  
</head>
<body>

    <div class="container">
        <h1><a href="doctormain.php">The Clinic</a>
      <div class="pull-right">
      <div class="btn-group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Doctor: <span class="caret"></span>
          </button>
          
        
      </div>
      </div>
      </h1>

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">

                        

                        <li class="dropdown">
                        <li class="active">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              Personal
                              <b class="caret"></b>
                              </a>
                            <ul class="dropdown-menu">
                              <li class="active"><a href="showmyinfo.php">Personal Info</a></li>
                              <li><a href="myappointments.php">All Appointments</a></li>
                            </ul>
                        </li>
                        </li>


                        <li><a href="mypatients.php">View Patients</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            About Prescriptions 
                            <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a href="createprescription.php">Create Prescription</a></li>
                              <li><a href="searchprescription.php">Search Prescription</a></li>
                         
                            </ul>
                        </li>
                        <li><a href="../index.php">Logout</a></li>
                </ul>                        
            </div>
        </div>
    </div>
    </div>



<!-- TEST -->





</body>

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</html>





<?php

$con=mysqli_connect("localhost","root","0123456","clinic");
//Check connection
if (!$con) {
    die('Could not connect' . mysqli_error());
   // echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
 //  echo "sucessful";  
}

session_start();
// username and password sent from form 
$mystaffID = $_SESSION['mystaffID'];
//echo $mystaffID; 
$mylicense = $_SESSION['mylicense'];
//echo $mylicense;

//$addr="SELECT phone FROM patient WHERE staffID=$mystaffID AND license='$mylicense'";



$all="SELECT * FROM doctorssee WHERE staffID=$mystaffID AND license='$mylicense'";

$result=mysqli_query($con,$all);

$count=mysqli_num_rows($result);



//


//hello


$patients = mysqli_query($con,"SELECT Staff.staffid, Staff.name, Staff.phone, doctorssee.license From DoctorsSee inner join (Staff) on Doctorssee.staffid=Staff.staffid
");


echo "<h2><center>Personal Information</h2>";


echo "<center><table border='5' style='width:400px'>
<tr>
<th>StaffID</th>
<th>Name</th>
<th>Phone#</th>
<th>License#</th>

</tr>";

while($row = mysqli_fetch_array($patients)){
   echo "<tr>";
  echo '<td align="center">' . $row['staffid'] . "</td>";
  echo '<td align="center">' . $row['name'] . "</td>";
  echo '<td align="center">' . $row['phone'] . "</td>";
  echo '<td align="center">' . $row['license'] . "</td>";
  echo "</tr>";



echo "</table><p></p></center>";

}


//hello




// If result matched $mystaffID and $mylicense, table row must be 1 row
if($count == 0){
echo "Wrong staffID# or License";

}
else {
    // Register $mystaffID, $mylicense and redirect to file "login_success.php"



//echo "Successful";
}

?>
