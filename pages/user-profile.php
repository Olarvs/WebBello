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
<!-- Display user profile information and form for editing -->
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
</form>

</body>
</html>

