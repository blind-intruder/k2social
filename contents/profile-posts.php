<?php
if (isset($_SESSION['c_u_id']) && isset($_SESSION['c_u_login'])) {
  $id_l=$_GET['profile-id'];
  

include("contents/conn.php");
$sql = "SELECT * from posts where post_author_id=$id_l order by post_id desc";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows(mysqli_query($conn, $sql));
  if ($rows>0) {
  	while ($rows= mysqli_fetch_assoc($result)) {
  		$media=$rows["media_path"];
  		$p_text=$rows["post_text"];
  		$p_time=$rows["post_date_time"];
  		$post_id=$rows["post_id"];

  		$sql1 = "SELECT * from users where u_id=$id_l";
  		$result1 = mysqli_query($conn, $sql1);
        $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
        if ($rows1>0) {
           while ($rows1= mysqli_fetch_assoc($result1)) {
               $fname=$rows1['u_fname'];
               $lname=$rows1['u_lname'];

               $sql2 = "SELECT * from user_setting where u_id=$id_l";
  		       $result2 = mysqli_query($conn, $sql2);
               $rows2 = mysqli_num_rows(mysqli_query($conn, $sql2));
               if ($rows2>0) {
               	  while ($rows2= mysqli_fetch_assoc($result2)) {
                      $profile=$rows2["u_profile_path"];
                      $path="posts/";
                      if ($media=="0") {
                     
                       $display_p_media="";
                     }
                    else{
                      
                      $display_p_media="<img src=".$path.$media." class='post-img' style='width:100%'>";
                    }
                      $profile_path="profile-pic/";
                      echo "
<!------------------------------------First Post--------------------------------------------------->
<div class='jumbotron jumbotron-fluid' href='#$post_id'>
  <div class='container'>
    
<!-------media tag start----------------->
<div class='media'>



<!------------profile pic with post ------------->
  <div class='media-left'>
    <img src=$profile_path$profile class='media-object profile-pic-post post-profile-img' style='width:60px'>
  </div>
<!------------profile pic with post ------------->




<!------------Name of person with post-------------->
<div class='media-body'>
    <h6 class='media-heading'><a href='profile.php?profile-id=$id_l'>$fname $lname</a></h6>
    <h6 class='post-time'>$p_time</h6>
  </div>
<!------------Name of person with post-------------->





<!-------------Drop down with post --------------->
  
<div class='media-right'>
    <div class='btn-group dropleft'>
<button class='btn btn-link btn-flat btn-flat-icon' type='button' data-toggle='dropdown' aria-expanded='false'>
<em class='fa fa-ellipsis-h'></em>
</button>
 <div class='dropdown-menu'>
    <a class='dropdown-item' href='#'>Edit</a>
    <a class='dropdown-item' href='#'>Delete</a>
    
  </div>
</div>
  </div>


<!-------------Drop down with post --------------->


</div>
<!-------------media tag end --------------->


<hr>

<!---------------------post image/text start-------------------->
<div class='media-body' style='overflow-wrap: break-word;'>
    <h5>$p_text</h5>
  </div>
$display_p_media
<!---------------------post image/text end------------------->

<!--------------like/comment/share start------------------>
<hr>
<div class='container'>
<div class='row'>
<div class='col-sm-4'><!-----likke column start----->";

                       $sql22 = "SELECT * FROM likes where post_id='$post_id' and liker_u_id='$id_l'";
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
<button type='button' class='btn btn-link btn-block' name='$post_id'><em class='fa fa-share' ></em></button>

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
else{
  header('location: http://localhost/k2/index.php');
}
?>