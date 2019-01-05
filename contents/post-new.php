<?php

if (isset($_SESSION['c_u_id'])) {
  $id=$_SESSION['c_u_id'];
 include("conn.php");
 
    $sql = "SELECT * FROM posts ORDER BY post_id desc";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows(mysqli_query($conn, $sql));
    if ($rows>0) {
         while ($rows= mysqli_fetch_assoc($result)){
            $type=$rows['type'];
         
            $f_id=$rows['post_author_id'];
         	  $post_time=$rows['post_date_time'];
            $post_text=$rows['post_text'];
            $post_id=$rows['post_id'];
            $sharer_id=$rows['sharer_id'];
            if ($rows['media_path']=="0") {
                     
                $display_p_media="";
            }
            else{
            	$path="posts/";
                $media_path=$rows['media_path'];
                $display_p_media="<img src=".$path.$media_path." class='post-img' style='width:100%'>";
            }
         	  $sql1 = "SELECT * FROM friends where u_id_one='$id'";
            $result1 = mysqli_query($conn, $sql1);
            $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
            if ($rows1>0) {
                while ($rows1= mysqli_fetch_assoc($result1)){
                	$c_u_id=$rows1['u_id_two'];
                	if ($f_id==$c_u_id || $sharer_id==$c_u_id) {
                		    $sql2 = "SELECT * FROM users where u_id='$f_id'";
                        $result2 = mysqli_query($conn, $sql2);
                        $rows2 = mysqli_num_rows(mysqli_query($conn, $sql2));
                        if ($rows2>0) {
                            while ($rows2= mysqli_fetch_assoc($result2)){
                            	  $friend_fname=$rows2['u_fname'];
                                $friend_lname=$rows2['u_lname'];
                                $sql3 = "SELECT * FROM user_setting where u_id='$f_id'";
                                $result3 = mysqli_query($conn, $sql3);
                                $rows3 = mysqli_num_rows(mysqli_query($conn, $sql3));
                                if ($rows3>0) {
                                     while ($rows3= mysqli_fetch_assoc($result3)){
                                     	$profile_pic="profile-pic/".$rows3['u_profile_path'];
                                         if ($type=="shared") {

                                            $sql5 = "SELECT * FROM users where u_id='$sharer_id'";
                                            $result5 = mysqli_query($conn, $sql5);
                                            $rows5 = mysqli_num_rows(mysqli_query($conn, $sql5));
                                            if ($rows5>0) {
                                                while ($rows5= mysqli_fetch_assoc($result5)){
                                                  $fname1=$rows5['u_fname'];
                                                  $lname1=$rows5['u_lname'];
                                                  $s_id=$rows5['u_id'];
                                                  $sql4 = "SELECT * FROM user_setting where u_id='$sharer_id'";
                                            $result4 = mysqli_query($conn, $sql4);
                                            $rows4 = mysqli_num_rows(mysqli_query($conn, $sql4));
                                            if ($rows4>0) {
                                                while ($rows4= mysqli_fetch_assoc($result4)){
                                                   $profile_pic1="profile-pic/".$rows4['u_profile_path'];
                                                }
                                            }
                                                
                                          echo "
<!------------------------------------First Post--------------------------------------------------->
<div class='jumbotron jumbotron-fluid' id='$post_id'>

  <div class='container'>
    
<!-------media tag start----------------->
<div class='media'>



<!------------profile pic with post ------------->
  <div class='media-left'>
    <img src=$profile_pic1 class='media-object profile-pic-post post-profile-img' style='width:60px'>
  </div>
<!------------profile pic with post ------------->




<!------------Name of person with post-------------->
<div class='media-body'>
    <h6 class='media-heading'><a href='profile.php?profile-id=$s_id'>$fname1 $lname1 </a><span>shared </span><a href='profile.php?profile-id=$f_id'>$friend_fname $friend_lname&apos;s</a><span> Post </span></h6>
    <h6 class='post-time'>$post_time</h6>
  </div>
<!------------Name of person with post-------------->





<!-------------Drop down with post --------------->
  
<div class='media-right'>
    <div class='btn-group dropleft'>
<button class='btn btn-link btn-flat btn-flat-icon' type='button' data-toggle='dropdown' aria-expanded='false'>
<em class='fa fa-ellipsis-h'></em>
</button>
 <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>Hide Post</a>
    <a class='dropdown-item' href='#'>Unfreind</a>
    <a class='dropdown-item' href='#'>Report Post</a>
    
  </div>
</div>
  </div>


<!-------------Drop down with post --------------->


</div>
<!-------------media tag end --------------->


<hr>

<!---------------------post image/text start-------------------->
<div class='media-body' style='overflow-wrap: break-word;'>
    <h5>$post_text</h5>
  </div>
$display_p_media
<!---------------------post image/text end------------------->

<!--------------like/comment/share start------------------>
<hr>
<div class='container'>
<div class='row'>
<div class='col-sm-4'><!-----likke column start----->";

                        $sql22 = "SELECT * FROM likes where post_id='$post_id' and liker_u_id='$id'";
                        $result22 = mysqli_query($conn, $sql22);
                        $rows22 = mysqli_num_rows(mysqli_query($conn, $sql22));
                        if ($rows22>0) {
                           echo "<button type='submit' style='color:red;' class='btn btn-link btn-block ' id='like$post_id' name='like'><em class='fa fa-heart' ></em></button>";
                         }
                         else{
                          echo "
                          <button type='button' onclick=\"$(function like() {
$.ajax({
    type: 'POST',
    url: 'contents/like.php',
    dataType: 'json',
    data:({'p_like': $post_id }),
    success: function (msg) {

        
    }

});
});\" class='btn btn-link btn-block like' id='$post_id' name='like'><em class='fa fa-heart' ></em></button>
                          ";
                         }



echo "
</div><!---like column end--->


<div class='col-sm-4'><!-----comment start------>
<button type='button' class='btn btn-link btn-block' data-toggle='collapse' data-target='#comment-area$post_id'><em class='fa fa-comment' ></em></button>

</div><!------comment end------->





</div><!---row end--->
</div><!---container end--->


 ";



echo "<!----------------------------collapse comment area------------------------------>
<div class='collapse' id='comment-area$post_id'>
  <div class='card card-body' style='overflow-wrap:break-word;'>";



include("contents/show-comments.php");



echo "
<form action='contents/post-comment.php' method='POST'>
<div class='input-group mb-3'>

  <input type='text' id='$post_id' name='comment' class='form-control' placeholder='Type Comment' aria-describedby='button-addon2'>
  <div class='input-group-append'>
  <input type='text' style='display:none;' name='id' value='$post_id'>
    <button class='btn btn-outline-secondary' type='submit' name='submit' value='$post_id' id='button-addon2'>Comment</button>
  </div>

 </div>
 </form>
</div>
</div>

<!-----------------------------collapse comment area end------------------------------->";

echo " </div>
</div>
<!------------------------------------First Post End--------------------------------------------------->";

}
                                            }

                                           
                                         }else{
                                         

                                     	echo "
<!------------------------------------First Post--------------------------------------------------->
<div class='jumbotron jumbotron-fluid' id='$post_id'>

  <div class='container'>
    
<!-------media tag start----------------->
<div class='media'>



<!------------profile pic with post ------------->
  <div class='media-left'>
    <img src=$profile_pic class='media-object profile-pic-post post-profile-img' style='width:60px'>
  </div>
<!------------profile pic with post ------------->




<!------------Name of person with post-------------->
<div class='media-body'>
    <h6 class='media-heading'><a href='profile.php?profile-id=$f_id'>$friend_fname $friend_lname</a></h6>
    <h6 class='post-time'>$post_time</h6>
  </div>
<!------------Name of person with post-------------->





<!-------------Drop down with post --------------->
  
<div class='media-right'>
    <div class='btn-group dropleft'>
<button class='btn btn-link btn-flat btn-flat-icon' type='button' data-toggle='dropdown' aria-expanded='false'>
<em class='fa fa-ellipsis-h'></em>
</button>
 <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>Hide Post</a>
    <a class='dropdown-item' href='#'>Unfreind</a>
    <a class='dropdown-item' href='#'>Report Post</a>
    
  </div>
</div>
  </div>


<!-------------Drop down with post --------------->


</div>
<!-------------media tag end --------------->


<hr>

<!---------------------post image/text start-------------------->
<div class='media-body' style='overflow-wrap: break-word;'>
    <h5>$post_text</h5>
  </div>
$display_p_media
<!---------------------post image/text end------------------->

<!--------------like/comment/share start------------------>
<hr>
<div class='container'>
<div class='row'>
<div class='col-sm-4'><!-----likke column start----->";

                        $sql22 = "SELECT * FROM likes where post_id='$post_id' and liker_u_id='$id'";
                        $result22 = mysqli_query($conn, $sql22);
                        $rows22 = mysqli_num_rows(mysqli_query($conn, $sql22));
                        if ($rows22>0) {
                           echo "<button type='submit' style='color:red;' class='btn btn-link btn-block ' id='like$post_id' name='like'><em class='fa fa-heart' ></em></button>";
                         }
                         else{
                          echo "
                          <button type='button' onclick=\"$(function like() {
$.ajax({
    type: 'POST',
    url: 'contents/like.php',
    dataType: 'json',
    data:({'p_like': $post_id }),
    success: function (msg) {

        
    }

});
});\" class='btn btn-link btn-block like' id='$post_id' name='like'><em class='fa fa-heart' ></em></button>
                          ";
                         }



echo "
</div><!---like column end--->


<div class='col-sm-4'><!-----comment start------>
<button type='button' class='btn btn-link btn-block' data-toggle='collapse' data-target='#comment-area$post_id'><em class='fa fa-comment' ></em></button>

</div><!------comment end------->


<div class='col-sm-4'><!------share start------>
        <button type='submit' onclick=\"$(function like() {
    $.ajax({
    type: 'POST',
    url: 'contents/share.php',
    dataType: 'json',
    data:({'p_share': $post_id }),
    success: function (msg) {

        
    }

});
});\" class='btn btn-link btn-block share'>
        <em class='fa fa-share' ></em>
        </button>
</div><!---share end---->


</div><!---row end--->
</div><!---container end--->


 ";



echo "<!----------------------------collapse comment area------------------------------>
<div class='collapse' id='comment-area$post_id'>
  <div class='card card-body' style='overflow-wrap:break-word;'>";



include("contents/show-comments.php");



echo "
<form action='contents/post-comment.php' method='POST'>
<div class='input-group mb-3'>

  <input type='text' id='$post_id' name='comment' class='form-control' placeholder='Type Comment' aria-describedby='button-addon2'>
  <div class='input-group-append'>
  <input type='text' style='display:none;' name='id' value='$post_id'>
    <button class='btn btn-outline-secondary' type='submit' name='submit' value='$post_id' id='button-addon2'>Comment</button>
  </div>

 </div>
 </form>
</div>
</div>

<!-----------------------------collapse comment area end------------------------------->";

echo " </div>
</div>
<!------------------------------------First Post End--------------------------------------------------->";
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

}

?>