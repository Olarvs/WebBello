<?php

function connection(){
   
    
    //localhost
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "db_innersparc_sales";

 
    $con = new mysqli($host, $username, $password, $database,);
    
    if($con->connect_error){
        echo $con->connect_error;
    }else{
        return $con;
    }
}

?>