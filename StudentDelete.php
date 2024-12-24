<?php
include('dbconnect.php');
$StudentID=$_GET['StudentID'];
$deletestudent="DELETE FROM studenttb WHERE 
StudentID=$StudentID";
$deletequery=mysqli_query($connection,$deletestudent);
if($deletequery)
{
    $imgname = "$StudentPicture"; // Change this to the path of your image file
      if (file_exists($imgname)) 
      {
          if (unlink($imgname)) 
          {
              echo "File deleted successfully.";
          } 
          else
          {
              echo "Unable to delete the file.";
          }
      } 
      else 
      {
          echo "Image is not found";
      }
    echo "<script>window.alert('Successfully deleted student data')</script>";
    echo"<script>
    window.location='StudentRegistration.php'</script>";
}
else
{
    echo "<p> Something went wrong in Delete " . mysqli_error($connection) . " </p>";
}
?>