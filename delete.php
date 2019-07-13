<?php

$fname= $_GET['fname'];

$conn = new mysqli('localhost','root','','data');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else {



 $sql = "DELETE FROM test WHERE firstname = '$fname'";

	if ($conn->query($sql) === TRUE) {
    echo " Record Deleted successfully";
    echo "<br><a href='view.php'>Go Back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}



?>