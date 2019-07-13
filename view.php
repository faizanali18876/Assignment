
<!DOCTYPE html>
<html>
<head>
 <title></title>
 <style>
  table {
   border-collapse: collapse;
   width: 100%;
   color: #588c7e;
   font-family: monospace;
   font-size: 25px;
   text-align: left;
     } 
  th {
   background-color: #588c7e;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 <table>
 <tr>
  
  <th>First name</th> 
  <th>Last Name</th>
  <th>Email</th>
  <th>Edit</th>
  <th>Delete</th>
 
 </tr>
 <?php
$conn = mysqli_connect("localhost", "root", "", "data");
  // Check connection
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM test";
  // $sql = "SELECT * FROM task1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>". $row["firstname"] . "</td><td>"
. $row["lastname"]."</td><td>" . $row["email"] . "</td>
<td><a href ='update.php?fname=$row[firstname]&lname=$row[lastname]&emai=$row[email]'>Edit</a></td>
<td><a href= 'delete.php?fname=$row[firstname]&lname=$row[lastname]&emai=$row[email] '>Delete</a></td>
</tr>";

}
echo "</table>";
} else { echo "0 results"; }
echo "<br><a href='home.php'>Home</a>";
$conn->close();
?>
</table>
</body>
</html>