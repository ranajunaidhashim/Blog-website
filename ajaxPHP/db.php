<?php

$conn = mysqli_connect("localhost", "root", "", "myblog");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// format Novemeber 18, 2023 
function formatTimestamp($timestamp) {
    return date('F j, Y', strtotime($timestamp));
}

?>