<?php
session_start();

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

$ID = $_SESSION['IDUSER'] ?? null;
$Firstname = $_POST['firstname'];
$Lastname = $_POST['lastname'];
$Sex = $_POST['sex'];
$Age = $_POST['age'];
$Address = $_POST['address'];
$Contact = $_POST['contact'];
$Email = $_POST['email'];
$Password = $_POST['password'];
$Password1 = $_POST['password1'];
$Image = $_POST['profileImage'];

if ($ID) {
    try{

        // Check if a file is uploaded
if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['profileImage'];
    
    // Process the uploaded file
    $fileName = $file['name'];
    $fileTmpPath = $file['tmp_name'];
    $fileType = $file['type'];
    
    // Determine the file extension
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    // Define the allowed file extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    
    // Check if the file extension is allowed
    if (in_array($fileExtension, $allowedExtensions)) {
        // Generate a unique file name
        $newFileName = uniqid('profile_', true) . '.' . $fileExtension;
        
        // Set the destination path for the uploaded file
        $uploadPath = 'C:/xampp/htdocs/web-bello/images/' . $newFileName;
        
        // Move the uploaded file to the destination path
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Update the profile image URL in the database
            $imageUrl = 'http://example.com/profiles/' . $newFileName; // Update with the actual URL
          
            exit(json_encode(array("responseStatus" => 'success', "responseContent" => $imageUrl, "responseMessage" => 'Profile image updated successfully!')));   
        } else {
            // Error moving the uploaded file
            exit(json_encode(array("responseStatus" => 'error', "responseContent" => '', "responseMessage" => 'Failed to move the uploaded file.')));
        }
    } else {
        // Invalid file extension
        exit(json_encode(array("responseStatus" => 'error', "responseContent" => '', "responseMessage" => 'Invalid file extension. Only JPG and PNG files are allowed.')));
    }
}

        // ========PASSWORD========

        // Check if the password field is empty
        if(!empty($Password)){
            // Check if the password field is empty
            if($Password == $Password1){
            $HashPassword = password_hash($Password, PASSWORD_DEFAULT);
            $sql = "UPDATE `tbl_residents` SET `firstname` = '$Firstname', `lastname` = '$Lastname', `sex` = '$Sex', `age` = '$Age', `address` = '$Address', `contact` = '$Contact', `email` = '$Email', `password` = '$HashPassword' WHERE id = '$ID';";
            $result = mysqli_query($con, $sql);

            exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Updated succesfully!')));
            }else{
                echo "Password doesn't match.";
            }
        }
    }catch(Exception $e){
        exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
    }
} else {
    echo "User ID not found in session.";
}

?>
