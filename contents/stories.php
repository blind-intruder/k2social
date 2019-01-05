<?php
$servername = 'localhost';
$username = 'root';
$password = '198273645';

// Create connection
$conn = new mysqli($servername, $username, $password,'k2');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 

$sql = "SELECT u_id_one, u_id_two FROM friends where u_pass='$l_pass' and u_email='$l_email'";
<div class="card profile-story-card-radius" style="width: 100%;">
  <img class="card-img-top profile-story-image-radius" src="st1.gif" alt="Card image cap">
  <div class="card-body">
    <h6 class="card-title profile-story-title-centered"><a href="#">Faizan Ahmed</a></h6>
    <p class="card-text profile-story-title-centered">2 hours ago</p>
    
  </div>
</div>

<hr>
?>