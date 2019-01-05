<?php
if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];
  if (isset($_POST['add'])) {
  	$r_id=$_POST['add'];
  	include("conn.php");
     $sql = "INSERT INTO add_friend (request_sender_id, request_reciever_id)
     VALUES ('$id', '$r_id')";

     if (mysqli_query($conn, $sql)) {
         header('location: http://localhost/k2/home1.php');
     } else {
         header('location: http://localhost/k2/home1.php');
     } 
   } 
}
else{
	header('location: http://localhost/k2/home1.php');
}
?>