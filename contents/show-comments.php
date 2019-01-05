<?php

if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];

  include("conn.php");

  $sql7 = "SELECT * FROM comment where post_id='$post_id' order by comment_id desc";
  $result7 = mysqli_query($conn, $sql7);
 $rows7 = mysqli_num_rows(mysqli_query($conn, $sql7));
  if ($rows7>0) {
      while ($rows7= mysqli_fetch_assoc($result7)) {
        $c_u_id=$rows7['u_id'];
        $c_text=$rows7['c_text'];

            $sql17 = "SELECT * FROM users where u_id='$c_u_id'";
            $result17 = mysqli_query($conn, $sql17);
            $rows17 = mysqli_num_rows(mysqli_query($conn, $sql17));
              if ($rows17>0) {
                 while ($rows17= mysqli_fetch_assoc($result17)) {
                  $fname=$rows17['u_fname'];
                  $lname=$rows17['u_lname'];
                  $sql27 = "SELECT * FROM user_setting where u_id='$c_u_id'";
                  $result27 = mysqli_query($conn, $sql27);
                   $rows27 = mysqli_num_rows(mysqli_query($conn, $sql27));
                   if ($rows27>0) {
                      while ($rows27= mysqli_fetch_assoc($result27)) {
                        $path1="profile-pic/";
                        $media=$rows27['u_profile_path'];
                           
                              $display_p_media="<img src=".$path1.$media." class='post-img' style='width:60px;'>";

                         echo "</hr><div class='media' style='overflow-wrap:break-word;'><!-------------------first comment----------------------------->
                                  <div class='media-left'>
                                    $display_p_media
                                  </div>
                                  <div class='media-body' style='overflow-wrap:break-word; width:80%;'>
                                     <h6 class='media-heading' ><a href='profile.php?profile-id=$c_u_id'>$fname $lname</a></h6>
                                     <p style='padding-left: 10px; padding-right: 10px; border:1px solid grey; overflow-wrap:break-word;'>$c_text</p>
                                  </div>
                               </div><!------------------------first comment end--------------------------------></hr>";
                      }
                    }

                    
                 }
              }

      }
    }


}


?>



