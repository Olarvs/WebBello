<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['IDUSER'])) {
    header('Location: /web-bello/pages/user-login.php');
    exit();
}

include_once("../connections/connection.php");
$con = connection();

$ID = $_SESSION['IDUSER'];

$sql = "SELECT * FROM tbl_residents WHERE id = '$ID'";
$result = mysqli_query($con, $sql);

if ($result) {
    $user = mysqli_fetch_assoc($result);

    // Assign the fetched values to variables
    $Firstname = $user['firstname'];
    $Lastname = $user['lastname'];
    $Sex = $user['sex'];
    $Age = $user['age'];
    $Address = $user['address'];
    $Contact = $user['contact'];
    $Email = $user['email'];
} else {
    echo "Error fetching user data: " . mysqli_error($con);
}
// if ($result) {
//   // Profile updated successfully
//   // Redirect to the profile page
//   header('Location: ../pages/user-profile.php');
//   exit();
// } else {
//   echo "Error updating profile.";
// }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <title>Web-Bello | Profile</title>
    <link rel="stylesheet" href="../style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />

</head>

<body>
<!-- Display user profile information and form for editing
<h1>Edit Profile</h1>
<form action="../api/residents/resident-profile.php" method="POST">
    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" value="<?php echo $Firstname; ?>"><br>

    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" value="<?php echo $Lastname; ?>"><br>

    <label for="sex">Sex:</label>
    <input type="text" name="sex" value="<?php echo $Sex; ?>"><br>

    <label for="age">Age:</label>
    <input type="text" name="age" value="<?php echo $Age; ?>"><br>

    <label for="address">Address:</label>
    <input type="text" name="address" value="<?php echo $Address; ?>"><br>

    <label for="contact">Contact:</label>
    <input type="text" name="contact" value="<?php echo $Contact; ?>"><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $Email; ?>"><br>

    <input type="submit" value="Save Changes">
</form> -->

<!-- UPDATE MODAL -->
<div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Resident
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div id ="updateModalBody">

            </div>
            <form action="#" id ="updateHoaInformation">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <input type ="hidden" name ="idUpdate" id ="idUpdate" >
                    <div>
                        <label for="firstnameUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                        <input type="text" name="firstnameUpdate" id="firstnameUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <div>
                        <label for="lastnameUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                        <input type="text" name="lastnameUpdate" id="lastnameUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <div>
                        <label for="sexUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sex</label>
                        <select id="sexUpdate" name ="sexUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div>
                        <label for="ageUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
                        <input type="text" name="ageUpdate" id="ageUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <div>
                        <label for="addressUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="addressUpdate" id="addressUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>

                    <div>
                        <label for="contactUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">contact</label>
                        <input type="text" name="contactUpdate" id="contactUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    
                    <div>
                        <label for="emailUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" name="emailUpdate" id="emailUpdate"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    
                    <div>
                        <label for="statusUpdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                        <select id="statusUpdate" name ="statusUpdate"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="flex items-center">
                    <button type="submit" class="w-full focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 ">
                        Update 
                    </button>
                    
            </form>
        </div>
    </div>
</div>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>
</html>

