<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n = isset($_POST["tt"]) ? $_POST["tt"] : "";
    $e = isset($_POST["ps"]) ? $_POST["ps"] : "";

    // Escape special characters to prevent SQL injection
    $n = mysqli_real_escape_string($conn, $n);
    $e = mysqli_real_escape_string($conn, $e);

    if (!empty($n) && !empty($e)) {
        $q1 = "INSERT INTO posts (title, content) VALUES ('$n', '$e')";
        $result = mysqli_query($conn, $q1);

        if ($result) {
            echo "success";
        } else {
            echo "SQL Error: " . mysqli_error($conn); // Display SQL error if any
        }
    } else {
        echo "Incomplete data";
    }
} else {
    echo "Invalid request method";
}
?>
