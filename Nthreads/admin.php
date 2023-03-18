<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>Thread Details</h2>

<table border="4">
  <tr>
    <td>Thread ID</td>
    <td>Title</td>
    <td>Description</td>
    <td>Category ID</td>
    <td>User ID</td>
    <td>Timestamp</td>
  </tr>

<?php

include "config.php"; // Using database connection file here

$sql= mysqli_query($conn,"select * from threads"); // fetch data from database

while($data = mysqli_fetch_array($sql))
{
?>
  <tr>
    <td><?php echo $data['thread_id']; ?></td>
    <td><?php echo $data['thread_title']; ?></td>
    <td><?php echo $data['thread_desc']; ?></td>
	<td><?php echo $data['thread_cat_id']; ?></td> 
	<td><?php echo $data['thread_user_id']; ?></td>   
    <td><?php echo $data['timestamp']; ?></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>
