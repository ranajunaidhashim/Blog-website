<?php
include("db.php");

$n =  $_GET["nm"];
$e =  $_GET["em"];
$u =  $_GET["un"];
$p =  $_GET["ps"]; {
    $q1 = "INSERT INTO users (name, email, username, password) VALUES ('$n', '$e', '$u', '$p')";
    $result = mysqli_query($conn, $q1);
    if ($result) {
        echo "success";
    } else {
        echo "failure";
    }
}
?>
