<?php
if (isset($_SESSION['c_u_id']) && isset($_SESSION['c_u_login'])) {
    $id=$_SESSION['c_u_id'];

	$p_id=$_POST['p_share'];

    include("conn.php");

       $sql33 = "SELECT * FROM posts where post_id='$p_id'";
        $result33 = mysqli_query($conn, $sql33);
        $rows33 = mysqli_num_rows(mysqli_query($conn, $sql33));
        if ($rows33>0) {
            
             while ($rows33= mysqli_fetch_assoc($result33)){
                 $media=$rows33['media_path'];
                 $text=$rows33['post_text'];
                 $ps_author_id=$rows33['post_author_id'];
                 $sql23 = "INSERT INTO posts (post_author_id, media_path, post_text, type, sharer_id) values ('$ps_author_id','$media','$text','shared', '$id')";
              
                 
             }
             
             $result23 = mysqli_query($conn, $sql23);    

        }

}
else{
	header('location: http://localhost/k2/index.php');
}
?>