<?php

if($_SERVER['SCRIPT_NAME']=="/k2/profile.php" || $_SERVER['SCRIPT_NAME']=="/k2/home1.php" ||$_SERVER['SCRIPT_NAME']=="/k2/404.php" ||$_SERVER['SCRIPT_NAME']=="/k2/upload.php" || $_SERVER['SCRIPT_NAME']=="/k2/explore.php" || $_SERVER['SCRIPT_NAME']=="/k2/request.php" || $_SERVER['SCRIPT_NAME']=="/k2/story.php"){

if (isset($_SESSION['c_u_id']) && isset($_SESSION['c_u_login'])) {
    $id=$_SESSION['c_u_id'];
    include("contents/conn.php");
$sql = "SELECT * FROM user_setting where u_id=$id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows(mysqli_query($conn, $sql));
  if ($rows>0) {
     $path4="profile-pic/";
      while ($rows= mysqli_fetch_assoc($result)) {
        $profilepic=$rows['u_profile_path'];
        $sql1 = "SELECT * FROM users where u_id=$id";
        $result1 = mysqli_query($conn, $sql1);
        $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
        if ($rows1>0) {
            while ($rows1= mysqli_fetch_assoc($result1)) {
                $fname=$rows1['u_fname'];



echo "
<div class='row second-nav'>
<div class='btn-dark nav-btn' id='btn-dark'>
<a class='nav-icon' href='home1.php'><em class='fa fa-home'></em>
    <span>Home</span>
     </a>
</div>
<div class='nav-btn btn-dark ' >
<a class='nav-icon' href='explore.php'><em class='fa fa-crosshairs'></em>
    <span>Explore</span>
     </a>
</div>
<div class='nav-btn btn-dark ' >
<a class='nav-icon' href='upload.php'><em class='fab fa-instagram'></em>
    <span>Upload</span>
     </a>
</div>
<div class='nav-btn btn-dark ' >
<a class='nav-icon' href='chat.php'><em class='fa fa-align-left'></em>
    <span>Chat</span>
     </a>
</div>
<div class='nav-btn btn-dark ' >
<a class='nav-icon' href='story.php'><em class='far fa-images'></em>
<span>Stories</span>
</a>
</div>
 <div class='nav-btn btn-dark' >
<a class='nav-icon' data-toggle='dropdown'><em class='fa fa-user'></em>

    <span ></span>

    <div class='dropdown-menu' >
    <div class='media-left'>
    <img src=$path4$profilepic class='media-object profile-pic-post post-profile-img' style='width:60px'>
    <a class='dropdown-item' href='profile.php?profile-id=$id' style='text-align:center;'>$fname</a>
    </div>
    <div class='dropdown-divider'></div>
    <!-- Button trigger modal -->
           <div class=''>
        <button type='button' class='dropdown-item' data-toggle='modal' data-target='#update-password'>
 Change Password
</button>
</div>

     <a class='dropdown-item' href='request.php'>Requests</a>
    <form action='contents/logout.php' method='POST'>
    
    <button class='dropdown-item' type='submit' class='btn-dark' name='logout'>Logout</button>
    </form>
    </div>
     </a>
</div>

</div>";


            }
        }
        
      }
  }


}

}
else{
    header('location: http://localhost/k2/index.php');
}

?>