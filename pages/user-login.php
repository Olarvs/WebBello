<?php
// session_start();//if there is no session then start session
// if (isset($_SESSION['ID'])) {
//     header('Location: /web-bello/pages/user-index.php');
//     exit();
//   }
?>
 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-Bello Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

</head>

<body>
 <!-- Try Login Form -->

 <!-- <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                    alt="logo">
                Flowbite
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#"
                                class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot
                                password?</a>
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                            in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="#"
                                class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Old user login -->

    <div class="flex justify-center items-center h-screen " style="background-image: url('../images/family-logo.png');">
        <form class="w-96 p-5" id="frmLogin" action="#">
            <div class="mt-3">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                <input type="text" id="email"
                    class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400"
                    placeholder="sample@gmail.com" required>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-500 hidden"><span class="font-medium">Oops!</span>
                    Username already taken!</p>
            </div>
            <div class="mt-3">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                <input type="password" id="password"
                    class="bg-gray-50 border border-gray-500 text-gray-900 placeholder-gray-700 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5 dark:bg-gray-100 dark:border-gray-400"
                    required>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-500 hidden"><span class="font-medium">Oops!</span>
                    Username already taken!</p>
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-3 w-full">Log
                In</button>
        </form>
    </div>




    <script defer>
    const email = document.querySelector('#email');

    const password = document.querySelector('#password');

    const frmLogin = document.querySelector('#frmLogin');

    frmLogin.addEventListener('submit', async (event) => {
        event.preventDefault()
        formData = new FormData();
        formData.append('email', email.value)
        formData.append('password', password.value)
        const fetchResponse = await fetch("../api/login/login.php", {
            method: "POST",
            body: formData,
        });

        const getResponse = await fetchResponse.json();
        console.log(getResponse)
        if (getResponse.responseStatus === 'success') {
            window.location = '/web-bello/pages/user-index.php';
        }
    })
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>