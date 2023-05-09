<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once("../../connections/connection.php");
$con = connection();

$Firstname = $_POST['firstname'];
$Lastname = $_POST['lastname'];
$Sex = $_POST['sex'];
$Age = $_POST['age'];
$Address = $_POST['address'];
$Contact = $_POST['contact'];
$Email = $_POST['email'];

try{
    


    $sql = "INSERT INTO `tbl_residents` (`firstname`,`lastname`,`sex`,`age`,`address`,`contact`,`email`) VALUES ('$Firstname','$Lastname','$Sex','$Age','$Address','$Contact','$Email');";
    mysqli_query($con, $sql);

    //get all if success
    $sqlGet = mysqli_query($con, "SELECT * FROM `tbl_residents`");

    //store in result

    $result = mysqli_fetch_all($sqlGet, MYSQLI_ASSOC);

    exit(json_encode(array("responseStatus" =>'success', "responseContent" =>$result, "responseMessage" =>'Resident has been added succesfully!')));

  
}catch(Exception $e){
    exit(json_encode(array("responseStatus" =>'error', "responseContent" =>$e->getMessage(), "responseMessage" =>'Adding new resident failed error:!')));
}


?>