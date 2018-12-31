<?php
if (!isset($_SESSION['c_u_login']) && !isset($_SESSION['c_u_id'])) {
  header('location: http://localhost/k2/index.php');
}
?>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<title>Explore</title>

</head>
<body>




<!---------------------------------------------------navbar------------------------------------------------------------>
<div class="container-fluid sticky-main-nav" >
<?php
include("contents/navbar.php");
?>
</div>
<!---------------------------------------------------navbar------------------------------------------------------------>

<div class="main-area-bg-color" style="min-height: 100%;"><!---------------------------------main area start---------------------------->




<!-----------------profile name and bio------------------------->
<div class="container" style="padding-top: 20px;">
<div class="jumbotron">
<div class="container">
   <div class="row">
      <div class="col-sm-12 text-center">
        <form action="#" method="GET">
              <div class="input-group mb-3">
                 <input type="text" name="search" id="search" class="form-control" placeholder="Type something..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit" id="search">Search</button>
                </div>
            </div>
        </form>
      </div>
   </div>
</div>

</div>
</div>
<!----------------profile name and bio end-------------------------->
<?php
include("contents/pass.php");
?>


<div class="container" style="padding-top: 20px;">
   <div class="row">
    <div class="col-sm-3"> 
      <div class="jumbotron">
        <h5 style="text-align:center;">Suggested</h5>
        <?php
          include("contents/suggestion.php");
        ?>
      </div>  
    </div>
      
        <?php

if (!isset($_SESSION['c_u_login']) && !isset($_SESSION['c_u_id'])) {
  header('location: http://localhost/k2/index.php');
}
$id=$_SESSION['c_u_id'];



if (isset($_GET['search'])) {
  $search="%".$_GET['search']."%";

  echo "<div class='col-sm-3'> 
        <div class='jumbotron' id='show-profiles'>
          <h5 style='text-align:center;'>Profiles</h5>";
     include("contents/conn.php");

     $sql = "SELECT * FROM users where u_fname like '$search' or u_lname like '$search'";
     $result = mysqli_query($conn, $sql);
     $rows = mysqli_num_rows(mysqli_query($conn, $sql));
     if ($rows>0) {
         while ($rows= mysqli_fetch_assoc($result)) {
            $u_id=$rows['u_id'];
            $path="profile-pic/";
            $fname=$rows['u_fname'];
            $lname=$rows['u_lname'];
            $sql1 = "SELECT * FROM user_setting where u_id='$u_id'";
            $result1 = mysqli_query($conn, $sql1);
            $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
            if ($rows1>0) {
                while ($rows1= mysqli_fetch_assoc($result1)) {
                  $dp=$rows1['u_profile_path'];
                  if ($u_id!=$id) {
                    
                  
                   echo "<hr>
                                                               
                                                                      <div class='media suggestion'>
                                                                     <div class='media-left'>
                                                                     <img src=$path$dp class='media-object profile-pic-post' style='width:60px'>
                                                                     </div>
                                                                     <div class='media-body'>
                                                                     <h6 class='media-heading'><a href='profile.php?profile-id=$u_id'>$fname $lname</a></h6>
                                                                     </div>
                                                                     
                                                                     </div>
                                                                     <hr>
                                                                     ";
                                                                     
                  }                                                   
                }
            }
         }

     

}
else{
echo "<p style='text-align:center;'>Nothing Found</p>";
}
echo " </div>
    </div>";
}
?>
     


    <div class="col-sm-6"> 
        
          
     <?php
     
     $id=$_SESSION['c_u_id'];
     if (isset($_GET['search'])) {
        $search="%".$_GET['search']."%";
        include("contents/conn.php");
        $sql = "SELECT * FROM posts where post_text like '$search'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows(mysqli_query($conn, $sql));
        if ($rows>0) {
            while ($rows= mysqli_fetch_assoc($result)) {
              $media=$rows['media_path'];
              $u_id=$rows['post_author_id'];
              $post_text=$rows['post_text'];
              $post_id=$rows['post_id'];
              $post_time=$rows['post_date_time'];
              $sql1 = "SELECT * FROM users where u_id='$u_id'";
              $result1 = mysqli_query($conn, $sql1);
              $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
              if ($rows1>0) {
                  while ($rows1= mysqli_fetch_assoc($result1)) {
                    $fname=$rows1['u_fname'];
                    $lname=$rows1['u_lname'];
                    $sql2 = "SELECT * FROM user_setting where u_id='$u_id'";
                    $result2 = mysqli_query($conn, $sql2);
                    $rows2 = mysqli_num_rows(mysqli_query($conn, $sql2));
                    if ($rows2>0) {
                       while ($rows2= mysqli_fetch_assoc($result2)) {
                        $path="profile-pic/";
                        $profile=$rows2['u_profile_path'];
                        ///check if post contain media
                      if ($media=="0") {
                     
                           $display_p_media="";
                      }
                      else{
                         $path1="posts/";
                         $display_p_media="<img src=".$path1.$media." class='post-img' style='width:100%'>";
                      }
                        echo "
<!------------------------------------First Post--------------------------------------------------->
<div class='jumbotron jumbotron-fluid' href='#$post_id'>
  <div class='container'>
    
<!-------media tag start----------------->
<div class='media'>



<!------------profile pic with post ------------->
  <div class='media-left'>
    <img src=$path$profile class='media-object profile-pic-post post-profile-img' style='width:60px'>
  </div>
<!------------profile pic with post ------------->




<!------------Name of person with post-------------->
<div class='media-body'>
    <h6 class='media-heading'><a href='profile.php?profile-id=$u_id'>$fname $lname</a></h6>
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
                           echo "<button type='submit' style='color:red;' class='btn btn-link btn-block' id='$post_id' name='like'><em class='fa fa-heart' ></em></button>";
                         }
                         else{
                          echo "<form action='contents/like.php' method='POST'>
<button type='submit' class='btn btn-link btn-block' id='$post_id' name='like'><em class='fa fa-heart' ></em></button>
<input name='p_like' value='$post_id' style='display:none;'>
</form>";
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
     ?>

     
  
</div>



</div><!-------------------------------------main area end------------------------------->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>