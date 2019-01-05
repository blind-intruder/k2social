<?php
if (!isset($_SESSION['u_id']) ||isset($_SESSION['u_login'])) 
{
  header( "location: http://localhost/k2/index.php");
}

?>