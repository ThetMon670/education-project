<?php
    session_start();
    include('dbconnect.php');
    if (isset($_POST['btnsignup'])) 
    {
        // Data transfer to each variable
        $StudentName = $_POST['txtstudentname'];
        $Username = $_POST['txtusername'];
        $Address = $_POST['txtaddress'];
        $PhoneNo = $_POST['txtphonenumber'];
        $Email = $_POST['txtemail'];
        $Password = $_POST['txtpassword'];

        $img=$_FILES['Profileimg']['name'];
        $folder="StudentImage/";
        $dbstorefilename=$folder.uniqid()."_".$img;
        //StudentImage/09876_apple.png
        $copyimg=copy($_FILES['Profileimg']['tmp_name'],$dbstorefilename);
        if(!$copyimg)
        {
            echo "<p>Cannot upload photo</p>";
            exit();
        }

        $PhoneNo = $_POST['txtphonenumber'];
        $Checkphoneno="SELECT * FROM studenttb WHERE PhoneNo='$PhoneNo' ";
        $checkCT1=mysqli_query($connection, $Checkphoneno);
        $checkrow1=mysqli_num_rows($checkCT1);
        if($checkrow1>0)
        {
            echo "<script>window.alert('Duplicate phoneno')</script>";
            echo "<script>window.location='StudentRegistration.php'</script>";
        }
        $Username = $_POST['txtusername'];
        $Checkphoneno="SELECT * FROM studenttb WHERE Username='$Username' ";
        $checkCT2=mysqli_query($connection, $Checkphoneno);
        $checkrow2=mysqli_num_rows($checkCT2);
        if($checkrow2>0)
        {
            echo "<script>window.alert('Duplicate Username')</script>";
            echo "<script>window.location='StudentRegistration.php'</script>";
        }
        $Email = $_POST['txtemail'];
        $Checkphoneno="SELECT * FROM studenttb WHERE Email='$Email' ";
        $checkCT3=mysqli_query($connection, $Checkphoneno);
        $checkrow3=mysqli_num_rows($checkCT3);
        if($checkrow3>0)
        {
            echo "<script>window.alert('Duplicate email')</script>";
            echo "<script>window.location='StudentRegistration.php'</script>";
        }
        $Number=preg_match('@[0-9]@',$Password);
        $UpperCharacter=preg_match('@[A-Z]@',$Password);
        $LowerCharacter=preg_match('@[a-z]@',$Password);
        $special=preg_match('@[^\w]@',$Password);

        if(strlen($Password)<9 || !$Number OR  !$UpperCharacter || !$LowerCharacter || !$special)
        {
            echo "<script>window.alert('Password length must include 8 characters:numbers, upper and lower characters, and special characters.')</script>";
            echo "<script>window.location='StudentRegistration.php'</script>";
            exit();
        }
        $checkadmin="SELECT * FROM studenttb WHERE Username='$Username' OR Email='$Email' OR PhoneNo='$PhoneNo' ";
        $checkquery=mysqli_query($connection, $checkadmin);
        $count=mysqli_num_rows($checkquery);
        if($count>0)
        {
            echo "<script>window.alert('User name or email or phone number Already exited')</script>";
            echo "<script>window.location='StaffRegistration.php'</script>";
        }
        else
        {
            $insertCustomerData = "INSERT INTO studenttb(StudentName, Username, Address, PhoneNo, Email, Password,StudentPicture) VALUES ('$StudentName', '$Username', '$Address', '$PhoneNo', '$Email', '$Password','$dbstorefilename')";
            $insertquery=mysqli_query($connection,$insertCustomerData);
            if($insertquery)
            {
                echo "<script>window.alert('Data inserted')</script>";
                echo "<script>window.location='StudentRegistration.php'</script>";
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
    <title>MMS IT/StudentRregistrationForm</title>
     <!-- font awesome cdn -> icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
 
    <div class="flex flex-col justify-center font-[sans-serif] p-32" id="app">
            <div class="max-w-md w-full mx-auto border border-gray-300 rounded-2xl p-8">
              <form class="space-y-6" action="StudentRegistration.php" method="POST" enctype="multipart/form-data">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                      <img class="mx-auto h-10 w-auto" src="https://mms-it.com/profile/images/logo.png" >
                      <h2 class="mt-5 mb-5 text-center text-2xl/9 font-bold tracking-tight text-black-700">Student Register Form</h2>
                    </div>
                    <div>
                        <label for="studentname" class="block text-sm/6 font-medium text-gray-900">Student Name</label>
                        <div class="mt-2">
                        <input type="studentname" name="txtstudentname" id="studentname" placeholder="Kyaw liwn" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="username" class="block text-sm/6 font-medium text-gray-900">User Name</label>
                        <div class="mt-2">
                        <input type="username" name="txtusername" id="username" placeholder="Klwin12" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6">
                        </div>
                    </div>
                    <div>
                        <label for="address" class="block text-sm/6 font-medium text-gray-900">Address</label>
                        <div class="mt-2">
                        <textarea id="address" type="address" name="txtaddress" id="address" placeholder="No.123, Main Road, Yangon" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6"></textarea>
                        </div>
                    </div>
                    <div>
                        <label for="phonenumber" class="block text-sm/6 font-medium text-gray-900">Phone Number</label>
                        <div class="mt-2">
                            <input id="phonenumber" type="phonenumber" name="txtphonenumber" id="username" placeholder="09653568953" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 
                            focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6"></input>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                        <input id="email" type="email" name="txtemail" id="username" placeholder="thetmon@gmail.com" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
                        focus:outline focus:outline-2 focus:-outline-offset-2focus:outline-emerald-500 sm:text-sm/6"></input>
                        </div>
                    </div>
                    <div class="relative">
                        <label id="hs-toggle-password"
                        for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        <div class="mt-2">
                        <input v-bind:type="showPassword ? 'text' : 'password'" id="hs-toggle-password" type="password" name="txtpassword" id="password" placeholder="strong password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 
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
                        <label for="my-file-single" class="block text-sm/6 font-medium text-gray-900">Student Image Upload</label>
                        <div class="mt-2 block text-sm/6 font-medium text-gray-900">
                            <input name="Profileimg" type="file" accept="image/*" @change="previewImage" class="block w-full border rounded px-2 py-1" id="my-file-single" required>
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
                        <button type="submit" class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2focus-visible:outline-offset-2 focus-visible:outline-red-500" name="btndelete" @click="reset">Delete photo</button>
                    </div> 
                    <div class="flex items-center">
                      <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required />
                      <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                          I accept the <a href="TermsandConditions.php" class="text-emerald-600 font-semibold hover:underline ml-1" target="_blank">Terms and Conditions</a>
                      </label>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2focus-visible:outline-offset-2 focus-visible:outline-emerald-500" name="btnsignup">Sign Up</button>
                    </div> 
                    <div class="flex justify-center items-center text-center">
                      <label class="ml-3 block text-sm text-gray-800 ">
                          Already <a href="StudentLogin.php" class="text-emerald-600 font-semibold hover:underline ml-1" target="_blank"> a member?</a>
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
        this.preview = null;
        this.image = null;
        this.preview_list = [];
        this.image_list = [];
      },
      togglePasswordVisibility() {
                    // Toggle the visibility of the password
                    this.showPassword = !this.showPassword;
                }
    }
  });

  app.mount("#app");
  
</script>
</html>