<?php
session_start();//if there is no session then start session
if (!isset($_SESSION['ID'])) {
    header('Location: /InnerSPARC-Sales-System/pages/index.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="../style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
</style>
</head>

<body> 
  <?php 
  if(isset($_SESSION['ID'])){
    echo '<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="https://flowbite.com/" class="flex items-center">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-black dark:text-white">InnerSPARCRealty</span>
      </a>
      <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="dashboard.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page" id ="linkDashboard">Dashboard</a>
          </li>
          <li>
            <a href="users.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" id ="linkUsers">Users</a>
          </li>
          <li>
            <a href="commission.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" id = "linkCommission">Commission</a>
          </li>
          <li>
            <a href="logout.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent" id ="linkLogout">Logout</a>
          </li>
    
        </ul>
      </div>
    </div>
  </nav>
  ';
  }
  ?>

<script defer>

const linkUser = document.querySelector('#linkUsers')
const linkDashboard = document.querySelector('#linkDashboard')
const linkCommission = document.querySelector('#linkCommission')
const linkLogout = document.querySelector('#linkLogout')

//designs

const selectedDesign = "block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"

const notSelectedDesign = "block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"

//get current url
let currentPage = 'dashboard.php'

let currentUrl = window.location.href;

// Get the index of the last slash in the URL
let lastSlashIndex = currentUrl.lastIndexOf("/");

// Get the substring of the URL starting from the last slash index
let lastPartOfUrl = currentUrl.substr(lastSlashIndex + 1);

currentPage = lastPartOfUrl

if(currentPage === 'dashboard.php'){
  linkDashboard.className = selectedDesign;
  linkCommission.className = notSelectedDesign;
  linkUser.className =notSelectedDesign;
}

if(currentPage === 'users.php'){
  linkDashboard.className = notSelectedDesign;
  linkCommission.className = notSelectedDesign;
  linkUser.className = selectedDesign;
}

if(currentPage === 'commission.php'){
  linkDashboard.className = notSelectedDesign;
  linkCommission.className = selectedDesign;
  linkUser.className =notSelectedDesign;
}

</script>

</body>
</html>