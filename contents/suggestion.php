<?php

if (!isset($_SESSION['c_u_login']) && !isset($_SESSION['c_u_id'])) {
  header('location: http://localhost/k2/index.php');
}
$id=$_SESSION['c_u_id'];

include("contents/conn.php");
///FOF suggestions start if has friends
//////
//////////
//////////////////
$sql = "SELECT u_id_two FROM friends where u_id_one=$id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows(mysqli_query($conn, $sql));
if ($rows>0) {
      while ($rows= mysqli_fetch_assoc($result)) {
          $f_id=$rows['u_id_two'];
          $sql1 = "SELECT u_id_two FROM friends where u_id_one=$f_id";
          $result1 = mysqli_query($conn, $sql1);
          $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
           if ($rows1>0) {
                 while ($rows1= mysqli_fetch_assoc($result1)) {
                       $fof_id=$rows1['u_id_two'];
                    $sql2 = "SELECT * FROM users where u_id=$fof_id";
                    $result2 = mysqli_query($conn, $sql2);
                    $rows2 = mysqli_num_rows(mysqli_query($conn, $sql2));
                    if ($rows2>0) {
                        while ($rows2= mysqli_fetch_assoc($result2)) {
                             $fname=$rows2['u_fname'];
                             $lname=$rows2['u_lname'];
                             $sql3 = "SELECT * FROM user_setting where u_id=$fof_id";
                             $result3 = mysqli_query($conn, $sql3);
                             $rows3 = mysqli_num_rows(mysqli_query($conn, $sql3));
                             if ($rows3>0) {
                                 while ($rows3= mysqli_fetch_assoc($result3)) {
                                       $path3="profile-pic/";
                                       $media3=$rows3['u_profile_path'];
                                       if ($fof_id!=$id) {
                                           
                                           $sql32 = "SELECT * from friends where u_id_one='$id' and u_id_two='$fof_id'";
                                           $result32 = mysqli_query($conn, $sql32);
                                           $rows32 = mysqli_num_rows(mysqli_query($conn, $sql32));
                                           if ($rows32>0) {
                                               
                                            }else{

                                              echo "<hr>
                                                               
                                                                      <div class='media suggestion'>
                                                                     <div class='media-left'>
                                                                     <img src=$path3$media3 class='media-object profile-pic-post' style='width:60px'>
                                                                     </div>
                                                                     <div class='media-body'>
                                                                     <h6 class='media-heading'><a href='profile.php?profile-id=$fof_id'>$fname $lname</a></h6>
                                                                     </div>
                                                                     <div class='media-right'>
                                                                         <form action='contents/add-friend.php' method='POST'>
                                                                     <button type='submit' class='btn btn-link'><span><i class='fa fa-plus'></i></span></button>
                                                                     <input name='add' value='$fof_id' style='display:none;'>
                                                                          </form>
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
                    
                }
           }
       }
      
  
  
}
///FOF suggestions End
/////////////
  /////////////
  //////////////
else{
echo "<h3>No suggestions</h3>";

}    







?>
