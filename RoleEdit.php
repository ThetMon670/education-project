<?php
session_start();
include('dbconnect.php');
$RoleID=isset($_GET['RoleID']) ? $_GET['RoleID'] : $_POST['RoleID'];
$query="SELECT * FROM staffroletb WHERE RoleID='$RoleID'"; 
$ret = mysqli_query($connection,$query);
// add data into array columns
$array = mysqli_fetch_array($ret);
if (isset($_POST['btnedit'])) 
{
    // Data transfer to each variable
    $RoleID =$_POST['txtRoleID'];
    $Position = $_POST['txtrolename'];
    // Perform the insertion query
    $Update = "UPDATE staffroletb SET RoleID = '$RoleID', Rolename = ' $Position' WHERE RoleID = '$RoleID' ";
    $UpdateRet = mysqli_query($connection, $Update);
    if ($UpdateRet) //True
    {
        echo "<script>window.alert('Role Information Updated')</script>";
        echo "<script>window.location='StaffRole.php'</script>";
    } 
    else 
    {
        echo "<p> Something went wrong in Update " . mysqli_error($connection) . " </p>";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <link rel="stylesheet" href="./Style/Admin.css">
     <!-- font awesome cdn -> icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>
<body>
  <div class="flex flex-col justify-center font-[sans-serif] h-screen p-4">
            <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
              <form class="space-y-6" action="RoleEdit.php" method="POST">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                      <img class="mx-auto h-10 w-auto" src="https://mms-it.com/profile/images/logo.png" alt="Your Company">
                      <h2 class="mt-5 mb-5 text-center text-2xl/9 font-bold tracking-tight text-black-700">Staff Role Register Form</h2>
                    </div>
                    <div>
                        <label for="rolename" class="block text-sm/6 font-medium text-gray-900">Role Name</label>
                        <div class="mt-2">
                        <input type="rolename" name="txtrolename" id="rolename" autocomplete="rolename" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-emerald-500 sm:text-sm/6" value="<?php echo $array['Rolename'] ?>">
                        <input type="hidden"  name="txtRoleID" value="<?php echo $RoleID; ?>">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-500" name="btnedit">Edit</button>
                    </div>
              </form>
            </div>
    </div>
</body>
</html>

