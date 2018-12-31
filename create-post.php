<?php

if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];
  if (isset($_POST["post_text"]) || isset($_FILES["post_img"])) {
    
      ///if post only include image///
      if (empty($_POST["post_text"]) && isset($_FILES["post_img"]['name'])) {
         ///upload image////
                $target_dir = "posts/";
                $target_file = $target_dir . basename($_FILES["post_img"]["name"]);
                $filename = basename($_FILES["post_img"]["name"]);
                $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                $file_ext = substr($filename, strripos($filename, '.')); // get file name
                $newfilename = $file_basename.rand(0,200). $file_ext;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image

                $check = getimagesize($_FILES["post_img"]["tmp_name"]);
               if($check !== false) {
        
                 $uploadOk = 1;
               } else {
                  header('location: http://localhost/k2/profile.php?profile-id='.$id);
                  die();
                  $uploadOk = 0;
               }


               // Check file size
               if ($_FILES["post_img"]["size"] > 600000) {
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
                } else 
                {
                  $file_upload=rand(0,200).$filename;
                  if (move_uploaded_file($_FILES["post_img"]["tmp_name"], $target_dir.$file_upload)) {
                       include("contents/conn.php");
       
                       $sql = "INSERT INTO posts (post_author_id, post_text, media_path)
                       VALUES ('$id', '', '$file_upload')";
                       if (mysqli_query($conn, $sql)) {
                          header('location: http://localhost/k2/profile.php?profile-id='.$id);
                       } else {
                          header('location: http://localhost/k2/profile.php?profile-id='.$id);
                       }
                  }
                }
      }


       ///if post include only text///
      if (isset($_POST["post_text"]) && empty($_FILES["post_img"]['name'])) {
        $text=$_POST["post_text"];
        if ( preg_match ("/^[a-zA-Z0-9\s]+$/",$text)) {
                  include("contents/conn.php");
       
                  $sql = "INSERT INTO posts (post_author_id, post_text)
                    VALUES ('$id', '$text')";
                  if (mysqli_query($conn, $sql)) {
                      header('location: http://localhost/k2/profile.php?profile-id='.$id);
                  } else {
                      header('location: http://localhost/k2/profile.php?profile-id='.$id);
                  }
        }

      }


      ///if post include text and image both///
      if (isset($_FILES["post_img"]) && isset($_POST["post_text"])) {
           $text=$_POST["post_text"];
            if ( preg_match ("/^[a-zA-Z0-9\s]+$/",$text)) {

    
                ///upload image////
                $target_dir = "posts/";
                $target_file = $target_dir . basename($_FILES["post_img"]["name"]);
                $filename = basename($_FILES["post_img"]["name"]);
                $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                $file_ext = substr($filename, strripos($filename, '.')); // get file name
                $newfilename = $file_basename.rand(0,200). $file_ext;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image

                $check = getimagesize($_FILES["post_img"]["tmp_name"]);
               if($check !== false) {
        
                 $uploadOk = 1;
               } else {
                  header('location: http://localhost/k2/profile.php?profile-id='.$id);
                  die();
                  $uploadOk = 0;
               }


               // Check file size
               if ($_FILES["post_img"]["size"] > 600000) {
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
                } else 
                {
                  $file_upload=rand(0,200).$filename;
                  if (move_uploaded_file($_FILES["post_img"]["tmp_name"], $target_dir.$file_upload)) {
                       include("contents/conn.php");
       
                       $sql = "INSERT INTO posts (post_author_id, post_text, media_path)
                       VALUES ('$id', '$text', '$file_upload')";
                       if (mysqli_query($conn, $sql)) {
                          header('location: http://localhost/k2/profile.php?profile-id='.$id);
                       } else {
                          header('location: http://localhost/k2/profile.php?profile-id='.$id);
                       }
                  }
                }
            }
            else{
          header('location: http://localhost/k2/profile.php?profile-id='.$id);
            }
      } 
 }
///upload image///
    
else{
        header('location: http://localhost/k2/profile.php?profile-id='.$id);
  }
}
else{
  header('location: http://localhost/k2/');
}
?>