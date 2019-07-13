

<html>
<body>


<form action="" method="post">
First Name: <input type="text" name="f_name" value="<?php  echo trim($_GET['fname']); ?>"><br>
Last Name: <input type="text" name="l_name" value="<?php  echo trim($_GET['lname']); ?>"><br>
E-mail: <input type="text" name="email" value="<?php  echo trim($_GET['emai']); ?>"><br>
<input type="submit" name="submit" value="Update">
<input type="button" value="View" onClick="document.location.href='view.php'" />
</form>
</body>
</html>
<?php
if(isset($_POST['submit'])) {
if(isset($_POST['f_name']) && $_POST['f_name'] !='' && preg_match("/^[a-zA-Z ]*$/",$_POST['f_name'])){
	
	$firstname=$_POST['f_name'];

}
else{
	$error[]='Invalid Frist Name';

}

if(isset($_POST['l_name']) && $_POST['l_name'] !='' && preg_match("/^[a-zA-Z ]*$/",$_POST['l_name']) ){
	$lastname=$_POST['l_name'];
}
else{
$error[]='Invalid Last Name';
}

if(isset($_POST['email']) && $_POST['email'] !=''&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$email=$_POST['email'];
}
else{
$error[]='Invalid Email';
}


if(isset($error) && count($error) >0 )
{
// we will see

foreach ($error as $value) {
	# code...
	echo $value;
	echo '<br>';
}
}
else{

$conn = new mysqli('localhost','root','','data');



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else {



 $sql = "UPDATE test SET firstname='$firstname', lastname='$lastname', email='$email'  WHERE firstname = '$firstname'";

	if ($conn->query($sql) === TRUE) {
    echo " record Updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
}

}

 ?>




