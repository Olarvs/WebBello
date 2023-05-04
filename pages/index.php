<?php
require_once '../components/navbar.php';
?>


<body>

<div class="flex justify-center items-center h-screen ">
<form class ="w-96 p-5" id = "frmLogin" action = "#">
<div class ="mt-3">
<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
  <input type="text" id="email" class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400" placeholder="sample@gmail.com" required>
  <p class="mt-2 text-sm text-gray-600 dark:text-gray-500 hidden"><span class="font-medium">Oops!</span> Username already taken!</p>
</div>
<div class ="mt-3">
<label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
  <input type="password" id="password" class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400" required>
  <p class="mt-2 text-sm text-gray-600 dark:text-gray-500 hidden"><span class="font-medium">Oops!</span> Username already taken!</p>
</div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-3 w-full">Log In</button>
</form>
 </div>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
<script defer >
const email = document.querySelector('#email');

const password = document.querySelector('#password');

const frmLogin = document.querySelector('#frmLogin');

frmLogin.addEventListener('submit' , async (event) =>{
  event.preventDefault()
  formData = new FormData();
  formData.append('email', email.value)
  formData.append('password', password.value)
  const fetchResponse = await fetch("../api/login/login.php",{
    method: "POST",
    body: formData,
  });

  const getResponse = await fetchResponse.json();
  console.log(getResponse)
  if(getResponse.responseStatus === 'success'){
    window.location = '/web-bello/pages/dashboard.php';
  }
})
</script>

</body>
