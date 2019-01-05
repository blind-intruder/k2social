<?php
if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];

  include("conn.php");
    if (isset($_POST["comment"])){
    	$post_id=$_POST["id"];
        $text=$_POST["comment"];
        if ( preg_match ("/^[a-zA-Z0-9\s]+$/",$text)) 
        {
                   $sql = "INSERT INTO comment (post_id, u_id, c_text)
                    VALUES ('$post_id', '$id', '$text')";
                  if (mysqli_query($conn, $sql)) {

                      header('location: http://localhost/k2/home1.php#'.$post_id);
                  } else {
                     
                  }
        }
        else{
        	header('location: http://localhost/k2/home1.php');
        }
    }
    
}
else{
        	header('location: http://localhost/k2/home1.php');
}
?>