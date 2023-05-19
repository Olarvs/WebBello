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

if ($ID) {
    try{
        $sql = "UPDATE `tbl_residents` SET `firstname` = '$Firstname', `lastname` = '$Lastname', `sex` = '$Sex', `age` = '$Age', `address` = '$Address', `contact` = '$Contact', `email` = '$Email' WHERE id = '$ID';";
        $result = mysqli_query($con, $sql);

        // if ($result) {
        //     echo "Update Profile Successfully!";
        // } else {
        //     echo "Error updating profile.";
        // }

        exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Updated succesfully!')));
        
    }catch(Exception $e){
        exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
    }
} else {
    echo "User ID not found in session.";
}
// try{
    
//     $sql = "UPDATE `tbl_residents` SET `firstname` ='$Firstname',`lastname` ='$Lastname',`sex` ='$Sex',`age` ='$Age',`address` ='$Address',`contact` ='$Contact',`email` ='$Email',`status` = '$Status' WHERE `tbl_residents`.`id` = '$ID';";
//     mysqli_query($con, $sql);

   
    
//     exit(json_encode(array("responseStatus" =>'success', "responseContent" =>'reload', "responseMessage" =>'Updated succesfully!')));

// }catch(Exception $e){
//     exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Update failed error:!')));
// }

?>
