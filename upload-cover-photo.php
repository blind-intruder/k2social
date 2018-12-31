<?php

if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];
$target_dir = "profile-cover/";
$target_file = $target_dir . basename($_FILES["cover_photo"]["name"]);
$filename = basename($_FILES["cover_photo"]["name"]);
$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
$file_ext = substr($filename, strripos($filename, '.')); // get file name
$newfilename = $file_basename.rand(0,200). $file_ext;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
 
    $check = getimagesize($_FILES["cover_photo"]["tmp_name"]);
    if($check !== false) {
       
        $uploadOk = 1;
    } else {
        header('location: http://localhost/k2/profile.php?profile-id='.$id);
    die();
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["cover_photo"]["size"] > 500000) {
    header('location: http://localhost/k2/profile.php?profile-id='.$id);
    die();
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    header('location: http://localhost/k2/profile.php?profile-id='.$id);
    die();
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    header('location: http://localhost/k2/profile.php?profile-id='.$id);
    die();
// if everything is ok, try to upload file
} else {
    $file_upload=rand(0,200).$filename;
    if (move_uploaded_file($_FILES["cover_photo"]["tmp_name"], $target_dir.$file_upload)) {
        include("contents/conn.php");
       $sql = "UPDATE user_setting SET u_cover_path='$file_upload' WHERE u_id='$id'";
       if (mysqli_query($conn, $sql)) {
          header('location: http://localhost/k2/profile.php?profile-id='.$id);
         } 
         else {
          header('location: http://localhost/k2/profile.php?profile-id='.$id);
         }
         
    } else {
        header('location: http://localhost/k2/profile.php?profile-id='.$id);
        
    }
}

}
else{
    header('location: http://localhost/k2/profile.php?profile-id='.$id);
}
?>