<?php
session_start();
include('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <title>MMS IT/WaitingRoom</title>
    <link rel="stylesheet" href="./Style/Customer.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
  <!-- Logo Section -->
  <div class="flex items-center space-x-4 mb-8">
    <img src="https://mms-it.com/profile/images/logo.png" class="w-12 h-12" alt="Logo">
    <h2 class="text-3xl font-semibold text-gray-800">MMS IT</h2>
  </div>

  <!-- Content Section -->
  <div class="flex flex-col md:flex-row items-center bg-white p-6 rounded-lg shadow-lg space-y-6 md:space-y-0 md:space-x-8">
    <!-- Countdown Section -->
    <div class="text-center md:text-left">
      <h1 class="text-4xl font-bold text-gray-800">Hang Tight!</h1>
      <p class="text-lg text-gray-600 mt-4">
        We are just getting things ready for you. Thank you for waiting.
      </p>
      <h2 class="mt-6 text-2xl font-medium text-blue-600">
        <span id="countdown">3600</span> Seconds Left
      </h2>
    </div>

    <!-- Clock Image -->
    <div class="w-48 h-48">
      <img src="https://images.twinkl.co.uk/tw1n/image/private/t_630/u/ux/telling-the-time-wiki_ver_1.png" class="w-full h-full object-contain" alt="Clock">
    </div>
  </div>
    <script type="text/javascript">
        let seconds = 3600;
        function secondCountDown()
        {
            document.getElementById('countdown').textContent=seconds;
            seconds--;
            if(seconds<0)
            {
                window.location.href='StudentLogin.php';
            }
        }
        setInterval(secondCountDown, 1000);
    </script>
</body>
</html>
