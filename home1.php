<?php
if (!isset($_SESSION['c_u_login']) && !isset($_SESSION['c_u_id'])) {
  header('location: http://localhost/k2/index.php');
}
if (isset($_GET['post-id'])) {
	$post_id=$_GET['post-id'];
	echo "document.getElementsByTagName('$post_id').scrollIntoView();";
	
}

?>
<html>
<head>
<title>K2 Social Media</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript">
	$(function like(id1) {
		var pid=""+id;
$.ajax({
    type: 'POST',
    url: 'contents/like.php',
    dataType: "json",
    data:({"p_id": id1 }),
    success: function (msg) {

        console.log(msg);
    }
});
});
</script>
<link rel="stylesheet" href="css/style.css">


</head>

<body>




<!---------------------------------------------------navbar------------------------------------------------------------>
<div class="container-fluid sticky-main-nav">
  
<?php
include("contents/navbar.php");
?>

</div>
<!---------------------------------------------------navbar------------------------------------------------------------>



<!---------------------------------------------------main body------------------------------------------------------------>
<div class="main-area-bg-color">
<div class="container-fluid " style="padding-top: 20px;"><!-------container start------->
<div class="row"><!-----------main row start--------------->
<!--------------------------------Story Column------------------------------------------->
<div class="col-sm-3 stories">

<h4 style="text-align:center;"> Latest Stories</h4>

<?php
include("get-stories.php");
?>

</div>


<!--------------------------------Story Column------------------------------------------->



<!--------------------------------Post area Column------------------------------------------->
<div class="col-sm-6 post-padding">

<div class="jumbotron">
<div class="container">
   <div class="row">
      <div class="col-sm-12 text-center">
         <form action="create-post.php" method="post" enctype="multipart/form-data">
              <textarea type="text"  class="post_text_home" name="post_text" id="post_text"  onKeyDown='limitText(this.form.post_text,this.form.countdown,300);' 
onKeyUp='limitText(this.form.post_text,this.form.countdown,300);' placeholder="Whats on your mind?"></textarea></br></br>
              <input type="file" name="post_img" id="post_img" class="btn btn-outline-secondary"></br></br>
              <input type="submit" value="Share" name="submit" class="btn btn-success">
         </form>
      </div>
   </div>
</div>

</div>
<?php
include("contents/post-new.php");
?>


</div>
<!--------------------------------Post area Column End------------------------------------------->


<?php
include("contents/pass.php");
?>

<!---------------------------------side bar start-------------------------->
<div class="col-sm-3 mb-suggestion" >

<div class=" sticy-suggestion">

<h4 Style="text-align:center;">Suggestions</h4>
<hr>
<!----------------------suggestion start------------------------------>
<div class='jumbotron'><!----jumbotron start----->
<?php
include("contents/suggestion.php");
?>
</div>
<!--------------------------suggestion end------------------------------->


<hr>
</div>
</div>
<!-----------------side bar end-------------------------->



</div><!-----------------main row end------------->
</div><!-------------main container end---------------------->
</div>
<!---------------------------------------------------main body------------------------------------------------------------>




<script type="text/javascript">
	$(document).ready(function(){
					$(".like").on({

						click: function(){
							$(this).css("color", "red");
                            $(this).css("font-size", "24px");
						}  
					});
				});
	$(document).ready(function(){
					$(".share").on({

						click: function(){
							$(this).css("color", "red");
                            $(this).css("font-size", "24px");
						}  
					});
				});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>