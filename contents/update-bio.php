<?php

if (isset($_SESSION['c_u_id'])) {
	$id=$_SESSION['c_u_id'];
	if (isset($_POST["bio"])) {
		$bio=$_POST["bio"];
        $bio=str_replace(".", "", $bio);
		if (preg_match ("/^[a-zA-Z\s]+$/",$bio)) {
       

		
	        include("conn.php");
	        $sql = "UPDATE user_setting SET u_bio='$bio' WHERE u_id='$id'";
     
     
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
}
else{
	header('location: http://localhost/k2/');
}
?>