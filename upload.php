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
<title>Upload</title>

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

<div class="main-area-bg-color" style="height: 100%;"><!---------------------------------main area start---------------------------->




<!-----------------profile name and bio------------------------->
<div class="container" style="padding-top: 20px;">
<div class="jumbotron">
<div class="container">
   <div class="row">
      <div class="col-sm-12 text-center">
        <h4>Want to share something with friends?</h4>
         <form action="create-post.php" method="post" enctype="multipart/form-data">
              <textarea type="text"  class="post_text" name="post_text" id="post_text"  onKeyDown='limitText(this.form.post_text,this.form.countdown,300);' 
onKeyUp='limitText(this.form.post_text,this.form.countdown,300);' placeholder="Whats on your mind?"></textarea></br></br>
              <input type="file" name="post_img" id="post_img" class="btn btn-outline-secondary "></br></br>

              <input type="submit" value="Upload" name="submit" class="btn btn-success">
         </form>
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
<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
  if (limitField.value.length > limitNum) {
    limitField.value = limitField.value.substring(0, limitNum);
  } else {
    limitCount.value = limitNum - limitField.value.length;
  }
}
</script>
</body>
</html>