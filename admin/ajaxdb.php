<center>
<table border="1">
  <tbody>
<?php


$conn= mysqli_connect("localhost","root","","mydatabase");
$q1 = "SELECT * FROM student";
$result = mysqli_query($conn, $q1);
//--

//--
while($row = mysqli_fetch_assoc($result)){
echo "<tr>";
echo "<td>" . $row["RollNo"] . "</td>" ; 
echo "<td>" . $row["MyName"] . "</td>" ; 
echo "<td>" . $row["Marks"] . "</td>" ; 
echo "</tr>";
}

?>
</tbody>
</table>
</center>