<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
if (isset($_POST['logout'])) {
	session_unset();
	session_destroy();
    header("location: http://localhost/k2/index.php");
}
}
else{
	header("location: http://localhost/k2/index.php");
}


?>