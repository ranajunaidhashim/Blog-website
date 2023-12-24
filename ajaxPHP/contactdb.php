<?php 
 include("db.php");

$n =  $_GET["nm"];
$e =  $_GET["em"];
$p =  $_GET["ph"];  
$m =  $_GET["msg"];  

{
    $q1 = "INSERT INTO contact (name, email, phone, message) VALUES ('$n', '$e', '$p', '$m')";
    mysqli_query($conn, $q1);
    echo "Message Sent ..";
}

?>