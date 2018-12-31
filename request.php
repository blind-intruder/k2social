<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Chat</title>
<style>
*{
font-family: 'Abhaya Libre', serif;
}
.nav-icon{
    display: block;
    min-height: 10px;
    margin-top: 10px;
    padding: 10px 6px 10px 6px;
    border-bottom: 2px solid transparent;
    font-size: 1.5rem;
    text-align: center;
    color: #fff !important;
    height: 100%;
    line-height: 1;
    text-decoration: none !important;
    flex-basis: 0;
    flex-grow: 1;
    color: #90a4ae;

}
a:hover, a:focus, a:active, a.active {
    text-decoration: none;
    outline: 0;
    color: #1abc9c !important;
    -webkit-transition: 0.5s all ease;
    -moz-transition: 0.5s all ease;
    -o-transition: 0.5s all ease;
    -ms-transition: 0.5s all ease;
    transition: 0.5s all ease;
}
.nav-btn{
    width: 16.65% !important;
}
.second-nav{
  height: 10% !important;
}
.profile-story-title-centered{
text-align: center;
}
.profile-story-image-radius{
border-radius: 20px 20px 0px 0px !important;
}
.profile-story-card-radius{
border-radius: 20px 20px 20px 0px !important;
}
.jumbotron{
border-radius: 10px 10px 10px 10px !important;
background-color: white !important;

}
.sticy-suggestion{
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 100;
}
.sticky-main-nav{
position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  z-index:1;
}

.main-area-bg-color{
background-color:  #ebedef !important;
}
.post-padding{
padding-top: 30px !important;
}
.post-profile-img{
margin-top:-5px !important;
}
.profile-pic-post{
border-radius: 30px 30px 30px 30px !important;


}
.media-body{
margin-left:10px !important;
}
.media-heading{
margin-left: 5px !important;

}
.post-time{
margin-left:5px !important;
}
.post-img{
margin-top: 0px !important;
}
.noti{
  margin-top: 10px;
}
.person-profile-pic{
  margin-top: 20px;
}
.logout{
      background-color: transparent;
    border: none;
}
 .suggestion{
  margin-top: 5px;
 }
 
 .top-nav{
  margin-left: 450px;
 }
 .nav{
  display: inline;
  float: right;
  margin-left: 10px;
 }

 .profile-pic{
border-radius: 40px 40px 40px 40px;
}
.parent {
  position: relative;
  top: 0;
  left: 0;
}
.image1 {
  position: relative;
  top: 0;
  left: 0;
  width:100%; 
  height:70%;
}
.image2 {
  position: absolute;
top: 60%;
left: 43%;
border-radius: 100px 100px 100px 100px;
width: 15%;
height:45%;
}
.media-body{
text-align: center !important;
}
.profile-post{
width: 350px;
height: 300px;
margin: 9px 10px 10px 10px;
}
.profile-posts{
  width:50%;
}
.edit-profile-pic{
position: absolute;
top: 85%;
left: 48%;
}
.edit-button{
  background-color: black !important;
  opacity: 0.7 !important;
    border-radius: 10px !important;
}
.edit-text{
  color: white !important;
  font-size:16px
}
.edit-cover-pic{
  position: absolute;
top: 80%;
left: 5%;
}
.error-img{
 width: 10%;
 height: 20%;
}

@media only screen and (max-width:950px){
.edit-profile-pic{
position: absolute;
top: 87%;
left: 47.5%;
}font-size:16px
.edit-button{
  background-color: black !important;
  opacity: 0.7 !important;
    border-radius: 10px !important;
}
.edit-text{
  color: white !important;
  font-size:10px
}
.second-nav {
    height: 20% !important;
}
.image2 {
   height: 60%;
   width: 20%;
   position: absolute;
   top: 50%;
   left: 40%;
  
}
.edit-profile-pic{
position: absolute;
top: 100%;
left: 47.5%;
}
}


@media only screen and (max-width:700px){ 
.nav-icon{
    
    min height: 10px;
    margin-top: 10px;
    padding: 0px 0px 0px 0px;
    border-bottom: 1px solid transparent;
    font-size: 1rem;
    text-align: center;
    color: #fff !important;
    height: 50%;
    
    text-decoration: none !important;
    flex-basis: 0;
    flex-grow: 1;
    color: #90a4ae;
    display: inline-grid;
    float: left;
}
.stories{
    visibility: hidden !important;
    position: absolute !important;
}
.btn-block{
 display: inline !important;
 float: left !important;
}
.m-view{
    display: inline !important;
    float: left !important;
    width: 33.3%;
}

.second-nav{
  height: 8% !important;
}

.post-profile-img{
margin-top:-10px !important;
margin-left:-10px !important;
}
.trending-area{
 visibility: hidden !important;
  position: absolute !important;
 }
 
 .mb-suggestion{
height: 50%;
 }
 .top-nav{
  margin-left: 100px;
 }
 .image1 {
  height: 30%;
  width:100%;
}
.image2 {
   height: 60%;
   width: 30%;
   position: absolute;
   top: 50%;
   left: 35%;
  
}
.profile-posts{
  width:100%;
}
.edit-profile-pic{
position: absolute;
top: 45%;
left: 43%;
}
.edit-cover-pic{
  position: absolute;
top: 40%;
left: 5%;
}
}


</style>
</head>
<body>
<!---------------------------------------------------header------------------------------------------------------------>
<div class="container-fluid">
  <nav class="navbar sticky-top navbar-light bg-light">
  <a class="navbar-brand" href="#">K2 Social Media</a>
</nav>
</div>
<!---------------------------------------------------header------------------------------------------------------------>



<!---------------------------------------------------navbar------------------------------------------------------------>
<div class="container-fluid sticky-main-nav" >
<?php
include("contents/navbar.php");
?>
</div>
<!---------------------------------------------------navbar------------------------------------------------------------>

<div class="main-area-bg-color" style="height: 100%;"><!---------------------------------main area start---------------------------->




<!-----------------profile name and bio------------------------->
<div class="container" style="padding-top: 20px;">
<div class="jumbotron">
<div class="container">
   <div class="row">
      <div class="col-sm-6">
         <?php
         if (isset($_SESSION['c_u_login']) && isset($_SESSION['c_u_id'])) {
               $id=$_SESSION['c_u_id'];
               $sql = "SELECT * FROM add_friend where request_reciever_id=$id";
               $result = mysqli_query($conn, $sql);
               $rows = mysqli_num_rows(mysqli_query($conn, $sql));
               if ($rows>0) {
                   while ($rows= mysqli_fetch_assoc($result)) {
                     $s_id=$rows['request_sender_id'];
                     $sql1 = "SELECT * FROM users where u_id=$s_id";
                     $result1 = mysqli_query($conn, $sql1);
                     $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
                     if ($rows1>0) {
                        while ($rows1= mysqli_fetch_assoc($result1)) {
                            $fname=$rows1['u_fname'];
                            $lname=$rows1['u_lname'];
                            $sql2 = "SELECT * FROM user_setting where u_id=$s_id";
                            $result2 = mysqli_query($conn, $sql2);
                            $rows2 = mysqli_num_rows(mysqli_query($conn, $sql2));
                              if ($rows2>0) {
                                  while ($rows2= mysqli_fetch_assoc($result2)) {
                                    $path4="profile-pic/";
                                    $media4=$rows2['u_profile_path'];
                                    echo "<hr>
                                                               
                                                                      <div class='media suggestion'>
                                                                     <div class='media-left'>
                                                                     <img src=$path4$media4 class='media-object profile-pic-post' style='width:60px'>
                                                                     </div>
                                                                     <div class='media-body'>
                                                                     <h6 class='media-heading'><a href='profile.php?profile-id=$s_id'>$fname $lname</a></h6>
                                                                     </div>
                                                                     <div class='media-right'>
                                                                         <form action='contents/request.php' method='POST'>
                                                                     <button type='submit' class='btn btn-link'><span><i class='fa fa-close' style='color:red; font-size:25px;'></i></span></button>
                                                                        <input name='reject' value='$s_id' style='display:none;'>
                                                                         </form>
                                                                         <form action='contents/request.php' method='POST'>
                                                                     <button type='submit' class='btn btn-link'><span><i class='fa fa-check-circle' style='color:green; font-size:25px;'></i></span></button>
                                                                     <input name='add' value='$s_id' style='display:none;'>
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
          else {
           header('location: http://localhost/k2/index.php');
          
          }
              

         ?>
      </div>
   </div>
</div>

</div>
</div>
<!----------------profile name and bio end-------------------------->
</div><!-------------------------------------main area end------------------------------->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>