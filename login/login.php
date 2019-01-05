<?php
session_start();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

$servername = 'localhost';
$username = 'root';
$password = '198273645';

// Create connection
$conn = new mysqli($servername, $username, $password,'k2');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 

$l_email=stripslashes($_POST['login-username']);
$l_email=htmlspecialchars($_POST['login-username']);
$l_email= mysqli_real_escape_string($conn,$l_email);
$l_pass=htmlspecialchars($_POST['login-pass']);
$l_pass=md5($l_pass);



 
$sql = "SELECT u_id FROM users where u_pass='$l_pass' and u_email='$l_email'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows(mysqli_query($conn, $sql));
    if ($rows==1) {
    	while ($rows= mysqli_fetch_assoc($result)){
    	 $u_id=$rows['u_id'];
    	}
      $_SESSION['c_u_login']="true";
      $_SESSION['c_u_id']=$u_id;
     header( "location: http://localhost/k2/home1.php");
    } 
///if email or password not correct
else{
    header( "location: http://localhost/k2/index.php?login-error='true'");
}

}
else{

	header( "location: http://localhost/k2/index.php");
}

?>