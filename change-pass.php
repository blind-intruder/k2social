<?php

if (isset($_SESSION['c_u_id'])) {
	$id=$_SESSION['c_u_id'];
	if (isset($_POST["old_pass"]) && isset($_POST["new_pass"])) {
         include("conn.php");
		$old=md5($_POST["old_pass"]);
        $new=md5($_POST["new_pass"]);
        $sql = "SELECT * FROM users where u_id='$id'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows(mysqli_query($conn, $sql));
        if ($rows>0) {
             while ($rows= mysqli_fetch_assoc($result)){
                $old_pass=$rows['u_pass'];

                 if ($old_pass==$old) {
                     $sql = "UPDATE users SET u_pass='$new' WHERE u_id='$id'";
                     if (mysqli_query($conn, $sql)) {
                         header('location: http://localhost/k2/home1.php');
                     } else {
                         header('location: http://localhost/k2/home1.php');
                     }
                }
        
             }
        }	
    }
    else{
        header('location: http://localhost/k2/home1.php');
    }
}
else{
	header('location: http://localhost/k2/');
}
?>