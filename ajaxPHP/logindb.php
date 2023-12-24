<?php 
 include("db.php");

$n =  $_GET["un"];
$p =  $_GET["ps"];  

{
    $q1 = "SELECT * FROM users WHERE username='$n' AND password='$p'";
    $result = mysqli_query($conn, $q1);
    if ($result->num_rows > 0) {
        echo "success"; 
    } else {
        echo "failure";
    }
}

?>