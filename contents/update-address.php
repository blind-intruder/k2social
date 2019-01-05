<?php

if (isset($_SESSION['c_u_id'])) {
	$id=$_SESSION['c_u_id'];
	if (isset($_POST["city"]) && isset($_POST["country"])) {
		$city=$_POST["city"];
        $country=$_POST["country"];
		if (preg_match ("/^[a-zA-Z\s]+$/",$city) && preg_match ("/^[a-zA-Z\s]+$/",$country) && ctype_alpha($city) && ctype_alpha($country)) {
       

		
	        include("conn.php");
	        $sql = "UPDATE user_setting SET City='$city', Country='$country' WHERE u_id='$id'";
     
     
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