<?php
    session_start();
    include('dbconnect.php');
    // // scodeno is not carried
    // if (!isset($_SESSION['StaffID'])) 
    // { 
    //     // want users to get used ADB after loging in and clear logic error
    //     echo "<script>window.alert('Plz login again')</script>";
    //     echo "<script>window.location='StaffLogin.php'</script>";
    // } 
    // else
    // {
    //     //Add new variable that existed in a login form
    //      $StaffID= $_SESSION['StaffID'];
    //      $Username = $_SESSION['Username'];
    //      $Password = $_SESSION['Password'];
    //      $StaffPicture = $_SESSION['StaffPicture'];
        
    // }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <title>MMS IT/StudentListing</title>
     <!-- font awesome cdn -> icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
</div>
        <?php
            $query="SELECT * FROM studenttb";
            $ret=mysqli_query($connection, $query);
            $count=mysqli_num_rows($ret);
            if ($count<1) 
            {
            echo "No data found";
            } 
            else 
            {
                ?>
                <table class="border-separate border border-slate-400 max-w-md w-full mx-auto text-center">
                    <caption class="caption-bottom m-6">
                        <strong>Table 1.1: Student Table Listing</strong>
                    </caption>
                    <tr>
                        <th class="border border-slate-300 ">StudentID</th>
                        <th class="border border-slate-300 ">StudentName</th>
                        <th class="border border-slate-300 ">Username</th>
                        <th class="border border-slate-300 ">Address</th>
                        <th class="border border-slate-300 ">PhoneNo</th>
                        <th class="border border-slate-300 ">Email</th>
                        <th class="border border-slate-300 ">Password</th>
                        <th class="border border-slate-300 ">StudentPicture</th>
                        <th class="border border-slate-300 ">Actions</th>
                    </tr>
                    <?php
                        for ($i=0; $i<$count ; $i++) 
                        { 
                          $row=mysqli_fetch_array($ret);
                          $StudentID =$row['StudentID'];
                          $StudentName =$row['StudentName'];
                          $Username =$row['Username'];
                          $Address =$row['Address'];
                          $PhoneNo =$row['PhoneNo'];
                          $Email =$row['Email'];
                          $Password =$row['Password'];
                          $StudentPicture=$row['StudentPicture'];
                            echo "<tr>";
                            echo "<td class='border border-slate-300'>" . $StudentID . "</td>";  
                            echo "<td class='border border-slate-300'>" . $StudentName. "</td>";   
                            echo "<td class='border border-slate-300'>" . $Username. "</td>";
                            echo "<td class='border border-slate-300'>" . $Address. "</td>";
                            echo "<td class='border border-slate-300'>" . $PhoneNo. "</td>";
                            echo "<td class='border border-slate-300'>" . $Email. "</td>"; 
                            echo "<td class='border border-slate-300'>" . $Password. "</td>"; 
                            echo "<td class='border border-slate-300'>" . $StudentPicture. "</td>";
                            echo "<td class='border border-slate-300'>
                                <a href='StudentEdit.php?StudentID=$StudentID'><i class='fa-solid fa-pen-to-square'></i></a>
                                /
                                <a href='StudentDelete.php?StudentID=$StudentID'><i class='fa-solid fa-trash'></i></a>
                            </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <?php 
            }
            
        ?>
    </div>
</body>
</html>