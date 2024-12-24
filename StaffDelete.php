<?php
include('dbconnect.php');
$StaffID=$_GET['StaffID'];
$deletestaff="DELETE FROM stafftb WHERE 
StaffID=$StaffID";
$deletequery=mysqli_query($connection,$deletestaff);
if($deletequery)
{
    echo "<script>window.alert('Successfully deleted staff data')</script>";
    echo"<script>
    window.location='StaffRegistration.php'</script>";
}
else
{
    echo "<p> Something went wrong in Delete " . mysqli_error($connection) . " </p>";
}
?>