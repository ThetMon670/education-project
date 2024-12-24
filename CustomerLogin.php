<?php
//declare for using session
session_start();
include('dbconnect.php');
if (isset($_POST['btnlogin'])) 
{
    $Username =$_POST['txtusername'];
    $Password =$_POST['txtpassword'];
    echo  $Username ;
    $checkaccount="SELECT * FROM customertb WHERE Username='$Username' AND Password='$Password'";
    $selectquery=mysqli_query($connection, $checkaccount);
    // invert str into int
    $rowcount = mysqli_num_rows($selectquery);
    if ($rowcount) 
    {
        // if successful, hello user name 
        //use section to take data till another form
        //using mysqli_fetch_array is each column is selected
        $array=mysqli_fetch_array( $selectquery);
        //check data in database
        // add data into new variables eg id, name
        $CustomerID=$array['CustomerID'];
        $Username=$array['Username'];
        $Password=$array['Password'];
        $_SESSION['CustomerID']=$CustomerID;
        $_SESSION['Username']=$Username;
        $_SESSION['Password']=$Password;
        echo "<script>window.alert('Successfully login')</script>";
        echo "<script>window.location='Home.php'</script>";

    } 
    else 
    {
            // echo "<script>window.alert('Login Failed')</script>";
            // echo "<script>window.location='CustomerLogin.php'</script>";
            if (isset($_SESSION['Logiincount'])) 
            {
                $attemp=$_SESSION['Logiincount'];
                if ($attemp==1) 
                {
                    echo "<script>window.alert('Login Fail Attemp 2')</script>";
                    $_SESSION['Logiincount']=2;
                }
                else if($attemp==2)
                {
                    echo "<script>window.alert('Login Fail Attemp 3')</script>";
                    echo "<script>window.location='Waiting_Room.php'</script>";
                }
                
            }
            else
            {
                 echo "<script>window.alert('Login Fail Attemp 1')</script>";
                $_SESSION['Logiincount']=1;
            }  
            
        }
            
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Style/Admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">  
    <script>
        document.addEventListener("DOMContentLoaded", () => 
        {
            const status = document.getElementById("textbox");
            const showPassword = document.querySelector(".display-eye i");
            showPassword.addEventListener("click", () => {
            if (status.type === "password") {
                status.type = "text";
                showPassword.classList.add("fa-eye");
                showPassword.classList.remove("fa-eye-slash");
                showPassword.classList.remove("hide_pass");
            } else {
                status.type = "password";
                showPassword.classList.add("fa-eye-slash");
                showPassword.classList.remove("fa-eye");
                showPassword.classList.add("hide_pass");
            }});
        });

    </script>
</head>
<body>
    <div class="p-globe">
        <!-- <div class="p-icon">
            <i class="fas fa-globe"></i>
        </div> -->
        <!-- <h2 class="txt-align">Ready To Rate Your Experrience</h2>
        <p>Your feedback is valuable to us. Please let us know how teenagers can be safe online.</p> -->
    </div>
    <div class="form-container">
        <div class="form_background"></div>
        <form action="CustomerLogin.php" method="POST">
        <div class="form-group" >
            <h1 id="Entryheader">Customer Login Form</h1>
            <p class="m-b">Please complete the form below to provide details about your login.</p>
        </div>
        <hr><br>
        <div class="form-group">
            <label>User name:</label>
            <input type="text" name="txtusername" placeholder="Thet Mon" required>
        </div>
        <div class="form-group">
                <label type="password">User Password</label>
                <div class="eye-icon">
                    <input type="password" name="txtpassword" id="textbox" id="clickeye"
                    value="Strong Password" required>
                    <span class="display-eye">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                    </span>
                </div>
        </div>  
        <div class="form-group">
            <button type="submit" name="btnlogin"  value="login">Log in</button>
        </div>
    </form>
    </div>   
</body>
</html>