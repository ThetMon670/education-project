<?php
session_start();
include('dbconnect.php');
$StaffID=isset($_GET['StaffID']) ? $_GET['StaffID'] : $_POST['txtStaffID'];
$query="SELECT * FROM stafftb WHERE StaffID='$StaffID'"; 
$ret = mysqli_query($connection,$query);
// add data into array columns
$array = mysqli_fetch_array($ret);
$StaffID = $array['StaffID'];
$StaffPicture = $array['StaffPicture'];

if (isset($_POST['btnedit'])) 
{
    // Data transfer to each variable
    $StaffID =$_POST['txtStaffID'];
    $StaffName = $_POST['txtStaffName'];
    $Username = $_POST['txtUsername'];
    $Address = $_POST['txtAddress'];
    $PhoneNo = $_POST['txtPhoneNo'];
    $Email = $_POST['txtEmail'];
    $Password = $_POST['txtPassword'];
    $Position = $_POST['cboRole'];
    

    if (isset($_FILES['Profileimg']) && $_FILES['Profileimg']['error'] === UPLOAD_ERR_OK) 
    {
      $imgname = "$StaffPicture"; // Change this to the path of your image file
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
      $img=$_FILES['Profileimg']['name'];
      $folder="upload/";
      $dbstorefilename=$folder.uniqid()."_".$img;
      //upload/09876_apple.png
      $copyimg=copy($_FILES['Profileimg']['tmp_name'],$dbstorefilename);
      if(!$copyimg)
      {
          echo "<p>Cannot upload photo</p>";
          exit();
      }

        // Perform the insertion query
        $Update = "UPDATE stafftb SET StaffID = '$StaffID', StaffName = ' $StaffName', Username = '$Username', Address = '$Address', PhoneNo = '$PhoneNo', Email = '$Email', Password = '$Password', StaffPicture='$dbstorefilename', RoleID= '$Position' WHERE StaffID='$StaffID' ";
        $UpdateRet = mysqli_query($connection, $Update);
        if ($UpdateRet) //True
        {
            echo "<script>window.alert('Admin Information Updated')</script>";
            echo "<script>window.location='StaffRegistration.php'</script>";
        } 
        else 
        {
            echo "<p> Something went wrong in Update " . mysqli_error($connection) . " </p>";
            
        }
    } 
    // no updating image
     else
    {
        // Perform the insertion query
        $Update = "UPDATE stafftb SET StaffID = '$StaffID', StaffName = ' $StaffName', Username = '$Username', Address = '$Address', PhoneNo = '$PhoneNo', Email = '$Email', Password = '$Password', StaffPicture='$StaffPicture', RoleID= '$Position' WHERE StaffID='$StaffID' ";
        $UpdateRet = mysqli_query($connection, $Update);
        if ($UpdateRet) //True
        {
            echo "<script>window.alert('Admin Information Updated')</script>";
            echo "<script>window.location='StaffRegistration.php'</script>";
        } 
        else 
        {
            echo "<p> Something went wrong in Update " . mysqli_error($connection) . " </p>";
            
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
    <title>MMS IT/StaffRregistrationForm</title>
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
    <div class="flex flex-col justify-center font-[sans-serif] p-32" id="app">
            <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
              <form class="space-y-6" action="StaffEdit.php" method="POST" enctype="multipart/form-data">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                      <img class="mx-auto h-10 w-auto" src="https://mms-it.com/profile/images/logo.png" >
                      <h2 class="mt-5 mb-5 text-center text-2xl/9 font-bold tracking-tight text-black-700">Staff Edit Form</h2>
                    </div>
                    <div>
                        <label for="staffname" class="block text-sm/6 font-medium text-gray-900">Staff Name</label>
                        <div class="mt-2">
                        <input type="staffname" name="txtStaffName" id="staffname" value="<?php echo $array['StaffName'] ?>" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="username" class="block text-sm/6 font-medium text-gray-900">User Name</label>
                        <div class="mt-2">
                        <input type="username" name="txtUsername" id="username" value="<?php echo $array['Username'] ?>" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
                        <div class="mt-2">
                        <textarea id="address" type="address" name="txtAddress" id="address" placeholder="No.123, Main Road, Yangon" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6"><?php echo $array['Address'] ?></textarea>
                        </div>
                    </div>
                    <div>
                        <label for="phonenumber" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
                        <div class="mt-2">
                            <input id="phonenumber" type="phonenumber" name="txtPhoneNo" id="username"  value="<?php echo $array['PhoneNo']?>" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 
                            focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6"></input>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                        <input id="email" type="email" name="txtEmail" id="username" value="<?php echo $array['Email'] ?>" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6"></input>
                        </div>
                    </div>
                    <div class="relative">
                        <label id="hs-toggle-password"
                        for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        <div class="mt-2">
                        <input v-bind:type="showPassword ? 'text' : 'password'" id="hs-toggle-password" type="password" name="txtPassword" id="password" value="<?php echo $array['Password'] ?>" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6"></input>
                        <button type="button" @click="togglePasswordVisibility"          class="absolute inset-y-12 right-0 flex items-center px-3 text-gray-400 hover:text-emerald-500 focus:outline-none">
                    <!-- Eye Icon (SVG) -->
                          <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path v-if="!showPassword" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                          <path v-if="!showPassword" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                          <path v-if="!showPassword" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                          <line v-if="!showPassword" x1="2" x2="22" y1="2" y2="22"></line>
                          <path v-if="!showPassword" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                          <circle v-if="!showPassword" cx="12" cy="12" r="3"></circle>
                          </svg>
                          </button>
                        </div>
                    </div>
                    <div>
                        <label for="staffrole" class="block text-sm/6 font-medium text-gray-900">Staff Role</label>
                        <div class="mt-2">
                        <select name="cboRole" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6">
                        <?php 
                            $selectrole="SELECT * From staffroletb";
                            $rolequery=mysqli_query($connection,$selectrole);
                            $countrole=mysqli_num_rows($rolequery);
                            for ($i=0; $i <$countrole ; $i++)
                            { 
                                $array=mysqli_fetch_array($rolequery);
                                $RoleID=$array['RoleID'];
                                $Rolename=$array['Rolename'];
                                echo " <option value='$RoleID'>$Rolename</option>";
                            }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div>
                        <label for="my-file-single" class="block text-sm/6 font-medium text-gray-900">Staff Old Image</label>
                        <div class="mt-2 block text-sm/6 font-medium text-gray-900">
                            <img id="oldimg" name="oldimg" src="<?php echo $StaffPicture; ?>">
                        </div>
                    </div>
                    <div>
                        <label for="my-file-single" class="block text-sm/6 font-medium text-gray-900">Staff Image Upload</label>
                        <div class="mt-2 block text-sm/6 font-medium text-gray-900">
                            <input name="Profileimg" type="file" accept="image/*" @change="previewImage" class="block w-full border rounded px-2 py-1" id="my-file-single">
                        </div>
                    </div>
                    <div class="border p-2 mt-3">
                        <p class="block text-sm/6 font-medium text-gray-900">Preview Here:</p>
                        <template v-if="preview">
                          <img :src="preview" class="img-fluid" />
                          <p class="mb-0">file name: {{ image.name }}</p>
                          <p class="mb-0">size: {{ image.size/1024 }}KB</p>
                        </template>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2focus-visible:outline-offset-2 focus-visible:outline-red-500" name="btndelete" @click="reset" @click="handleClick" >Delete photo</button>
                    </div> 
                    <div class="flex items-center">
                      <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                      <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                          I accept the <a href="TermsandConditions.php" class="text-emerald-600 font-semibold hover:underline ml-1" target="_blank">Terms and Conditions</a>
                      </label>
                    </div>
                    <div>
                      <input type="hidden" name="txtStaffID" value="<?php echo $StaffID; ?>">
                        <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2focus-visible:outline-offset-2 focus-visible:outline-emerald-500" name="btnedit">Edit</button>
                    </div> 
                    <div class="flex justify-center items-center text-center">
                      <label class="ml-3 block text-sm text-gray-800 ">
                           <a href="StaffLogin.php" class="text-emerald-600 font-semibold hover:underline ml-1" target="_blank"> Not a member?</a>
                      </label>
                    </div>
              </form>
            </div>
    </div>
</body>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
  const app = Vue.createApp({
    data() {
      return {
        preview: null,
        image: null,
        preview_list: [],
        image_list: [],
        showPassword: false,
        password: '',
        idButtonDisabled:false,
        // Button is initially disabled
      };
    },
    methods: {
      previewImage(event) {
        const input = event.target;
        if (input.files) {
          const reader = new FileReader();
          reader.onload = (e) => {
            this.preview = e.target.result;
          };
          this.image = input.files[0];
          reader.readAsDataURL(input.files[0]);
        }
      },
      previewMultiImage(event) {
        const input = event.target;
        if (input.files) {
          Array.from(input.files).forEach((file) => {
            const reader = new FileReader();
            reader.onload = (e) => {
              this.preview_list.push(e.target.result);
            };
            this.image_list.push(file);
            reader.readAsDataURL(file);
          });
        }
      },
      reset() {
        if (this.preview === null) 
        {

          alert("There is no image to reset.");
          return;
           // Exit the method if there's no image
        }    
        this.preview = null;
        this.image = null;
        this.preview_list = [];
        this.image_list = [];
      },
      togglePasswordVisibility() 
      {
        // Toggle the visibility of the password
        this.showPassword = !this.showPassword;
      },
      handleClick()
      {
        this.isButtonDisabled = false; 
        // Enable the button after choosing image

      }
    }
  });

  app.mount("#app");
  
</script>
</html>