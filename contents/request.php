<?php
if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];
  if (isset($_POST['add'])) {
  	$r_id=$_POST['add'];
  	include("conn.php");
     $sql = "INSERT INTO friends (u_id_one, u_id_two)
     VALUES ('$id', '$r_id')";
     
     if (mysqli_query($conn, $sql)) {
         $sql1 = "INSERT INTO friends (u_id_one, u_id_two)
         VALUES ('$r_id', '$id')";
         if (mysqli_query($conn, $sql1)) {
           $sql2 = "DELETE FROM add_friend WHERE request_reciever_id='$id' and request_sender_id='$r_id'";

           if (mysqli_query($conn, $sql2)) {
               header('location: http://localhost/k2/home1.php');
            } else {
               header('location: http://localhost/k2/home1.php');
            } 
             
         } else {
             header('location: http://localhost/k2/home1.php');
         }

     } else {
         header('location: http://localhost/k2/home1.php');
     } 
     
  




   }
   if (isset($_POST['reject'])) {
    $r_id=$_POST['reject'];
    include("conn.php");
     $sql = "DELETE FROM add_friend WHERE request_reciever_id='$id'";

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