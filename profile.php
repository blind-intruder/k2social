<?php
if (!isset($_SESSION['c_u_id']) && !isset($_SESSION['c_u_login'])) {

}
if (isset($_GET['post-id'])) {
	$post_id=$_GET['post-id'];
	echo "document.getElementsByTagName('$post_id').scrollIntoView();";
	
}
?>
<html>
<head>
  <?php 
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
  test_input($_GET['profile-id']);
  str_replace(".", "", $_GET['profile-id']);
  if (is_numeric($_GET['profile-id'])) {
    $u_id=$_GET['profile-id'];
  include("contents/conn.php");
  $sql = "SELECT * from users where u_id=$u_id";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_num_rows(mysqli_query($conn, $sql));
  if ($rows>0) {
    while ($rows= mysqli_fetch_assoc($result)) {
      $fname=$rows["u_fname"];
      $lname=$rows["u_lname"];
      echo "<title>".ucfirst($fname)." ".ucfirst($lname)." @ K2 Social Media</title>";
    }
  }else{
  include("404.php");
  die();
  }

  }
  else {
    include("404.php");
    die();
  }
  
  ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
include("contents/pass.php");
?>


<!---------------------------------------------------navbar------------------------------------------------------------>
<div class="container-fluid sticky-main-nav" >
<?php
include("contents/navbar.php");
?>
</div>
<!---------------------------------------------------navbar------------------------------------------------------------>
</div>
<div class="main-area-bg-color"><!---------------------------------main area start---------------------------->

<!--------------------------profile cover/profile photo-------------------------->
<div class="container-fluid">

  <?php 
  include("contents/conn.php");
  $sql = "SELECT * from user_setting where u_id=$u_id";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_num_rows(mysqli_query($conn, $sql));
  if ($rows>0) {
    while ($rows= mysqli_fetch_assoc($result)) {
      include("contents/paths.php");
      $profile_cover=$rows["u_cover_path"];
      $profile_photo=$rows["u_profile_path"];
      echo "<div class='parent'>
       <img class='image1' src='$profile_cover_path$profile_cover' >
       <img class='image2' src='$profile_photo_path$profile_photo'  >
       </div>";


      if (isset($_SESSION['c_u_id'])) {
        if ($_SESSION['c_u_id']==$u_id && isset($_SESSION['c_u_login'])) {
           
           echo "<!-- Button trigger modal -->
           <div class='edit-cover-pic edit-button'>
<button type='button' class='btn btn-link' data-toggle='modal' data-target='#upload-profile-pic'>
  <i class='fa fa-pencil-square-o edit-text'>Edit</i>
</button>
</div>
<!-- Modal -->
<div class='modal fade' id='upload-profile-pic' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Update Cover Photo</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form action='upload-cover-photo.php' method='post' enctype='multipart/form-data'>
    Select image to upload:
    <input type='file' name='cover_photo' id='cover_photo'></br>
    
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' value='Upload Image' name='submit'>Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>
";
        }
      }


    }
  }
  ?>
</div>
<!------------------------profile cover/profile photo end----------------------------->
<hr>

<!-----------------profile name and bio------------------------->
<div class="container">
<div class="jumbotron">
<div class="media">
  
  <div class="media-body profile-bio">

  <?php 
  include("contents/conn.php");
  $sql = "SELECT * from users where u_id=$u_id";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_num_rows(mysqli_query($conn, $sql));
  if ($rows>0) {
    while ($rows= mysqli_fetch_assoc($result)) {
      include("contents/paths.php");
      $fname=$rows["u_fname"];
      $lname=$rows["u_lname"];
      
      if (isset($_SESSION['c_u_id'])) {
        if ($_SESSION['c_u_id']==$u_id && isset($_SESSION['c_u_login'])) {
           echo "<h4 class='media-heading edit-setting'>".ucfirst($fname)." ".ucfirst($lname)."</h4>";
           echo "
<!-- Button trigger modal -->
           <div class='edit-setting edit-bio edit-button'>
<button type='button' class='btn' style='background-color:white;' data-toggle='modal' data-target='#edit-name'>
  <i class='fa fa-pencil-square-o'></i>
</button>
</div>
<!-- Modal -->
<div class='modal fade' id='edit-name' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Update Name</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form action='contents/update-name.php' method='post'>
        <label for='fname'>First Name:</label>
        <input type='text' name='fname' id='fname' value='$fname' onKeyDown='limitText(this.form.fname,this.form.countdown,20);' 
onKeyUp='limitText(this.form.fname,this.form.countdown,10);'></br>
        <label for='fname'>Last Name:</label>
        <input type='text' name='lname' id='lname' value='$lname' onKeyDown='limitText(this.form.lname,this.form.countdown,20);' 
onKeyUp='limitText(this.form.lname,this.form.countdown,10);'></br>
        <p style='font-size:10px;'>Only letters are allowed.(a-z,A-Z)</p>   
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' value='Update_bio' name='submit'>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
           <!-- Button trigger modal -->
           <div class='edit-profile-pic edit-button'>
<button type='button' class='btn btn-link' data-toggle='modal' data-target='#upload-cover-photo'>
  <i class='fa fa-pencil-square-o edit-text'>Edit</i>
</button>
</div>
<!-- Modal -->
<div class='modal fade' id='upload-cover-photo' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Update Profile Photo</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form action='profile-pic-upload.php' method='post' enctype='multipart/form-data'>
    Select image to upload:
    <input type='file' name='profile_photo' id='profile_photo'></br>
    
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' value='Upload Image' name='submit'>Upload</button>
        </form>
      </div>
    </div>
  </div>
</div>
</br>";
        }
        if ($_SESSION['c_u_id']!=$u_id) {
        	echo "<h4 class='media-heading edit-setting'>".ucfirst($fname)." ".ucfirst($lname)."</h4></br>";
        }
      }
      else{
      	echo "<h4 class='media-heading edit-setting'>".ucfirst($fname)." ".ucfirst($lname)."</h4></br>";
      }
      
    }
  }
  $sql1 = "SELECT * from user_setting where u_id=$u_id";
  $result1 = mysqli_query($conn, $sql1);
  $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
  if ($rows1>0) {
    while ($rows1= mysqli_fetch_assoc($result1)) {
      $bio=$rows1["u_bio"];
      echo "<p class='edit-setting'>".$bio."</p>";
      if (isset($_SESSION['c_u_id'])) {
          if ($_SESSION['c_u_id']==$u_id && isset($_SESSION['c_u_login'])) {
           
           echo " <!-- Button trigger modal -->
           <div class='edit-setting edit-bio edit-button'>
<button type='button' class='btn' style='background-color:white;' data-toggle='modal' data-target='#edit-bio'>
  <i class='fa fa-pencil-square-o'></i>
</button>
</div>
<!-- Modal -->
<div class='modal fade' id='edit-bio' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Update Bio</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form action='contents/update-bio.php' method='post'>
        <input type='text' name='bio' id='bio' value='$bio' style='width:70%; height:50px;' onKeyDown='limitText(this.form.bio,this.form.countdown,100);' 
onKeyUp='limitText(this.form.bio,this.form.countdown,100);' maxlength='100'></br>
<font size='1'>(Maximum characters: 100)<br>
You have <input readonly type='text' name='countdown' size='3' value='100' style='border: none; width:4%; color:red;'> characters left.</font>
        <p style='font-size:10px;'>Only letters are allowed.(a-z,A-Z)</p>   
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' value='Update_bio' name='submit'>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>";

          }
      }



    }
  }
  $sql1 = "SELECT * from users where u_id=$u_id";
  $result1 = mysqli_query($conn, $sql1);
  $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
  if ($rows1>0) {
    while ($rows1= mysqli_fetch_assoc($result1)) {
      $year=$rows1["u_b_year"];
      $age=date("Y")-$year;
      echo "<p><b>".$age."</b> Years Old.</p>";
    }
  }
  $sql1 = "SELECT * from user_setting where u_id=$u_id";
  $result1 = mysqli_query($conn, $sql1);
  $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
  if ($rows1>0) {
    while ($rows1= mysqli_fetch_assoc($result1)) {
      $city=$rows1["City"];
      $country=$rows1["Country"];
      
      if (isset($_SESSION['c_u_id'])) {
          if ($_SESSION['c_u_id']==$u_id && isset($_SESSION['c_u_login'])) {
          	echo "<p class='edit-setting'>From: <b>".$city."</b>, <b>".$country."</b></p>";
              echo "
<!-- Button trigger modal -->
           <div class='edit-setting edit-bio edit-button '>
<button type='button' class='btn' style='background-color:white;' data-toggle='modal' data-target='#edit-address'>
  <i class='fa fa-pencil-square-o'></i>
</button>
</div>
<!-- Modal -->
<div class='modal fade' id='edit-address' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Update Address</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <form action='contents/update-address.php' method='post'>
        <table class='edit-address'>
        <tr>
         <td><label for='city'>City:</label></td>
         <td><input type='text' name='city' id='city' value='$city'></td>
        </tr>
        <tr>
         <td><label for='country'>Country:</label></td>
         <td><input type='text' name='country' id='country' value='$country'></td>
        </tr>
        </table>
        <p style='font-size:10px;'>Only letters are allowed.(a-z,A-Z)</p>   
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' value='update-address' name='submit'>Update</button>
        </form>
      </div>
    </div>
  </div>
</div></br>";
          }
      if ($_SESSION['c_u_id']!=$u_id) {
      	echo "<p class='edit-setting'>From: <b>".$city."</b>, <b>".$country."</b></p></br>";
      }
  }
  else{
  	echo "<p class='edit-setting'>From: <b>".$city."</b>, <b>".$country."</b></p></br>";
  }
      
    }
  }
      if (isset($_SESSION['c_u_id']) && isset($_SESSION['c_u_login'])) {
          if ($_SESSION['c_u_id']!=$u_id && isset($_SESSION['c_u_login'])) {
             $l_id=$_SESSION['c_u_id'];
            $sql19 = "SELECT * FROM friends where u_id_one='$l_id' and u_id_two='$u_id'";
            $result19 = mysqli_query($conn, $sql19);
            $rows19 = mysqli_num_rows(mysqli_query($conn, $sql19));
            if ($rows19>0) {
            }else{

               echo "
              <form action='contents/add-friend.php' method='POST'>
            <button type='submit' class='btn btn-primary btn-lg'><i class='fa fa-check'></i>Add</button>
              <input name='add' value='$u_id' style='display:none;'>
             </form>
            ";
            }

            
          }
      }
  ?>

  </div>
</div>
</div>
<div>
</div>
<!----------------profile name and bio end-------------------------->

<?php
if (isset($_SESSION['c_u_id'])) {
          if ($_SESSION['c_u_id']==$u_id && isset($_SESSION['c_u_login'])) {

          }
          echo "<div class='container' style='padding-top: 20px;'>
<div class='jumbotron'>
<div class='container'>
   <div class='row'>
      <div class='col-sm-12 text-center'>
         <form action='create-post.php' method='post' enctype='multipart/form-data'>
              <textarea type='text'  class='post_text_profile' name='post_text' id='post_text'  onKeyDown='limitText(this.form.post_text,this.form.countdown,300);' 
onKeyUp='limitText(this.form.post_text,this.form.countdown,300);' placeholder='Whats on your mind?'></textarea></br></br>
              <input type='file' name='post_img' id='post_img' class='btn btn-outline-secondary'></br></br>
              <input type='submit' value='Upload' name='submit' class='btn btn-success'>
         </form>
      </div>
   </div>
</div>

</div>
</div>";

}

?>


<!------------------------------profile posts start------------------------------->
<div class="container ">
<div class="row">
<div class="col-sm-4">
  <div class="jumbotron">
  	<h4 style="text-align:center;">Friends</h4>
  	   <?php
include("contents/friends.php");
?>
  </div>	
</div>

  <div class="col-sm-8">
    <?php
include("contents/profile-posts.php");
?>
  
  </div>
</div>

</div><!-------------------------------------main area end------------------------------->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}


  $(document).ready(function(){
          $(".like").on({

            click: function(){
              $(this).css("color", "red");
                            $(this).css("font-size", "24px");
            }  
          });
        });

</script>

</body>
</html>