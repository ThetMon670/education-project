<?php
    session_start();
    include('dbconnect.php');
    // scodeno is not carried
    if (!isset($_SESSION['StaffID'])) 
    { 
        // want users to get used Staff after loging in and clear logic error
        echo "<script>window.alert('Plz login again')</script>";
        echo "<script>window.location='StaffLogin.php'</script>";
    } 
    else
    {
        if (isset($_POST['btnadd'])) 
        {
            $RoleName=$_POST['txtrolename'];
            $Checktypename="SELECT * FROM staffroletb WHERE Rolename='$RoleName' ";
            $checkCT=mysqli_query($connection, $Checktypename);
            $checkrow=mysqli_num_rows($checkCT);
            if($checkrow>0)
            {
                echo "<script>window.alert('Duplicate staffRole Name')</script>";
                echo "<script>window.location='StaffRole.php'</script>";
            }
            else
            {
                $insert="INSERT INTO staffroletb(Rolename)VALUES('$RoleName')";
                $inserted=mysqli_query($connection, $insert);
                echo "<script>window.alert('StaffRole successfully added')</script>";
                echo "<script>window.location='StaffRole.php'</script>";
            }
            
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <title>MMS IT/StaffRoleForm</title>
    <!-- font awesome cdn -> icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<nav class="flex items-center justify-between flex-wrap bg-lime-700  p-6">
  <div class="flex items-center flex-shrink-0 text-white mr-6 space-x-3">
    <img class="mx-auto h-8 w-auto" src="https://mms-it.com/profile/images/logo.png" >
    <span class="font-semibold text-xl tracking-tight">MMS IT</span>
  </div>
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-white border-white-400 hover:text-emerald-400 hover:border-emerald-400">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto ">
    <div class="text-sm lg:flex-grow">
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
        <b>Docs</b>
      </a>
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white mr-4">
        Examples
      </a>
      <a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-white">
        Blog
      </a>
    </div>
    <div>
      <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:bg-emerald-500 focus-visible:outline-emerald-500  mt-4 lg:mt-0 semi-bold">Download</a>
    </div>
  </div>
</nav>
    <div class="flex flex-col justify-center font-[sans-serif] h-screen p-4">
            <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
              <form class="space-y-6" action="StaffRole.php" method="POST">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                      <img class="mx-auto h-10 w-auto" src="https://mms-it.com/profile/images/logo.png" >
                      <h2 class="mt-5 mb-5 text-center text-2xl/9 font-bold tracking-tight text-black-700">Staff Role Register Form</h2>
                    </div>
                    <div>
                        <label for="rolename" class="block text-sm/6 font-medium text-gray-900">Role Name</label>
                        <div class="mt-2">
                        <input type="rolename" name="txtrolename" id="rolename" autocomplete="rolename" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2focus-visible:outline-offset-2 focus-visible:outline-emerald-500" name="btnadd">Add</button>
                    </div>
              </form>
            </div>
    </div>
    </div>
        <?php
            $query="SELECT * FROM staffroletb";
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
                        <strong>Table 1.1: Staff Role Table Listing</strong>
                    </caption>
                    <tr>
                        <th class="border border-slate-300 ">RoleID</th>
                        <th class="border border-slate-300 ">Role Name</th>
                        <th class="border border-slate-300 ">Actions</th>
                    </tr>
                    <?php
                        for ($i=0; $i<$count ; $i++) 
                        { 
                            $row=mysqli_fetch_array($ret);
                            $RoleID =$row['RoleID'];
                            $Rolename =$row['Rolename'];
                            echo "<tr>";
                            echo "<td class='border border-slate-300'>" . $RoleID . "</td>";  
                            echo "<td class='border border-slate-300'>" . $Rolename . "</td>";    
                            echo "<td class='border border-slate-300'>
                                <a href='RoleEdit.php?RoleID=$RoleID'><i class='fa-solid fa-pen-to-square'></i></a>
                                /
                                <a href='RoleDelete.php?RoleID=$RoleID'><i class='fa-solid fa-trash'></i></a>
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