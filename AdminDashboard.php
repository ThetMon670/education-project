<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tailwind CSS (optional, replace with your styles if needed) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Vue.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3"></script>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="leading-normal tracking-normal" id="main-body" id="app">
    <div class="flex flex-wrap">

      <menu></menu>

      <div class="w-full bg-gray-100 pl-0 lg:pl-64 min-h-screen" :class="sideBarOpen ? 'overlay' : ''" id="main-content">

        <nav></nav>

        <div class="p-6 bg-gray-100 mb-20">
          <router-view />
        </div>

        <footer></footer>

      </div>
    </div>
  </div>
</body>
</html>
