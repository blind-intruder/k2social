<?php

if (isset($_SESSION['c_u_id'])) {
	$id=$_SESSION['c_u_id'];
	if (isset($_POST["fname"]) && isset($_POST["lname"])) {
		$fname=$_POST["fname"];
        $lname=$_POST["lname"];
		if (preg_match ("/^[a-zA-Z\s]+$/",$fname) && preg_match ("/^[a-zA-Z\s]+$/",$lname) && ctype_alpha($fname) && ctype_alpha($lname)) {
       

		
	        include("conn.php");
	        $sql = "UPDATE users SET u_fname='$fname', u_lname='$lname' WHERE u_id='$id'";
     
     
             if (mysqli_query($conn, $sql)) {
                header('location: http://localhost/k2/profile.php?profile-id='.$id);
             } else {
                 header('location: http://localhost/k2/profile.php?profile-id='.$id);
             }
        }
        else{
          header('location: http://localhost/k2/profile.php?profile-id='.$id);
        }
     }
     else{
        header('location: http://localhost/k2/profile.php?profile-id='.$id);
     }
}
else{
	header('location: http://localhost/k2/');
}
?>