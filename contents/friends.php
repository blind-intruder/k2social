<?php

$id=$_GET['profile-id'];
$f_id=array();
include("conn.php");
$sql8 = "SELECT u_id_two FROM friends where u_id_one='$id'";
$result8 = mysqli_query($conn, $sql8);
$rows8 = mysqli_num_rows(mysqli_query($conn, $sql8));
if ($rows8>0) {
     while ($rows8= mysqli_fetch_assoc($result8)) {
          $f_id=$rows8['u_id_two'];
       $sql9 = "SELECT * FROM users where u_id='$f_id'";
       $result9 = mysqli_query($conn, $sql9);
       $rows9 = mysqli_num_rows(mysqli_query($conn, $sql9));
       if ($rows9>0) {
            while ($rows9= mysqli_fetch_assoc($result9)) {
            	$fname=$rows9['u_fname'];
            	$lname=$rows9['u_lname'];
            	 $sql10 = "SELECT * FROM user_setting where u_id='$f_id'";
                 $result10 = mysqli_query($conn, $sql10);
                 $rows10 = mysqli_num_rows(mysqli_query($conn, $sql10));
                 if ($rows10>0) {
                     while ($rows10= mysqli_fetch_assoc($result10)) {
                           $path2="profile-pic/";
                           $media1=$rows10['u_profile_path'];
                           echo "<hr>
                                                               
                                                                      <div class='media suggestion'>
                                                                     <div class='media-left'>
                                                                     <img src=$path2$media1 class='media-object profile-pic-post' style='width:60px'>
                                                                     </div>
                                                                     <div class='media-body'>
                                                                     <h6 class='media-heading'><a href='profile.php?profile-id=$f_id'>$fname $lname</a></h6>
                                                                     </div>
                                                                     <div class='media-right'>
                                                               
                                                                     </div>
                                                                     </div>
                                                                     <hr>
                                                                     ";
                     }
                 }
                                  
            }
        }

     }

 }
?>