<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

$Firstname = $_POST['firstname'];
$Lastname = $_POST['lastname'];
$Email = $_POST['email'];
$Address = $_POST['address'];
$Password = $_POST['password'];
try{
    


    $sql = "INSERT INTO `tbl_hoa` (`firstname`,`lastname`,`email`,`address`,`password`) VALUES ('$Firstname','$Lastname','$Email', '$Address', '$Password');";
    mysqli_query($con, $sql);

    //get all if success
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_hoa` ORDER BY `created_at` DESC");

    //store in result

    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>$result, "responseMessage" =>'Home owner has been added succesfully!')));

  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Adding new home owner failed error:!')));
}


?>