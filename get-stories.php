<?php

if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];
 include("conn.php");
 
    $sql = "SELECT * FROM friends where u_id_one='$id'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows(mysqli_query($conn, $sql));
    if ($rows>0) {
         while ($rows= mysqli_fetch_assoc($result)){
         	$f_id1=$rows['u_id_two'];
         	$sql1 = "SELECT * FROM stories where story_author_id='$f_id1'";
            $result1 = mysqli_query($conn, $sql1);
            $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
            if ($rows1>0) {
                while ($rows1= mysqli_fetch_assoc($result1)){
                     $today_date=date('Y-m-d');
                     $story_date=$rows1['story_date'];
                     $story_media=$rows1['media_path'];

                     $sql2 = "SELECT * FROM users where u_id='$f_id1'";
                     $result2 = mysqli_query($conn, $sql2);
                     $rows2 = mysqli_num_rows(mysqli_query($conn, $sql2));
                     if ($rows2>0) {
                        while ($rows2= mysqli_fetch_assoc($result2)){

                            $fname=$rows2['u_fname'];
                            $lname=$rows2['u_lname'];

                        	if ($today_date==$story_date) {
                        		$s_path="stories/";
                     	echo "<hr>
<!---story start---->
<div class='card profile-story-card-radius' style='width: 100%;'>
  <img class='card-img-top profile-story-image-radius' src='$s_path$story_media' alt='Card image cap'>
  <div class='card-body'>
    <h6 class='card-title profile-story-title-centered'><a href='profile.php?profile-id=$f_id1'>$fname $lname</a></h6>
  </div>
</div>
<!---story end---->
<hr>";
                     }

                        }
                    }



                     

                }
            }


         }
     }



}
?>