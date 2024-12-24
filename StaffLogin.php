<?php
//declare for using session
session_start();
include('dbconnect.php');
if (isset($_POST['btnlogin'])) 
{
    $Email =$_POST['txtemail'];
    $Password =$_POST['txtpassword'];
    $checkaccount="SELECT * FROM stafftb WHERE Email='$Email' AND Password='$Password'";
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
        $StaffID=$array['StaffID'];
        $Email=$array['Email'];
        $Password=$array['Password'];
        $_SESSION['Email']=$Password;
        $_SESSION['Password']=$Password;
        $_SESSION['StaffID']=$StaffID;
        echo "<script>window.alert('Successfully login')</script>";
        echo "<script>window.location='StudentListing.php'</script>";

    } 
    else 
    {
            echo "<script>window.alert('Login Failed')</script>";
            echo "<script>window.location='StaffLogin.php'</script>";
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
    <title>MMS IT/StaffLoginForm</title>
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
              <form class="space-y-6" action="StaffLogin.php" method="POST" enctype="multipart/form-data">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                      <img class="mx-auto h-10 w-auto" src="https://mms-it.com/profile/images/logo.png" >
                      <h2 class="mt-5 mb-5 text-center text-2xl/9 font-bold tracking-tight text-black-700">Staff Login Form</h2>
                    </div>
                    <div>
                        <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                        <div class="mt-2">
                        <input id="email" type="email" name="txtemail" placeholder="thetmon@gmail.com" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300
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
                    <div class="flex items-center">
                      <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" required />
                      <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                          I accept the <a href="TermsandConditions.php" class="text-emerald-600 font-semibold hover:underline ml-1" target="_blank">Terms and Conditions</a>
                      </label>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-emerald-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-emerald-500 focus-visible:outline focus-visible:outline-2focus-visible:outline-offset-2 focus-visible:outline-emerald-500" name="btnlogin">Log in</button>
                    </div> 
                    <div class="flex justify-center items-center text-center">
                      <label class="ml-3 block text-sm text-gray-800 ">
                         <a href="StaffRegistration.php" class="text-emerald-600 font-semibold hover:underline ml-1" target="_blank"> Not a member?</a>
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