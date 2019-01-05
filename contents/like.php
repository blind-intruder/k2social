<?php
if (isset($_SESSION['c_u_id']) && isset($_SESSION['c_u_login'])) {
    $id=$_SESSION['c_u_id'];

	$p_id=$_POST['p_like'];

    include("conn.php");
    $sql29 = "INSERT INTO likes (post_id, liker_u_id) values ('$p_id','$id')";
        $result29 = mysqli_query($conn, $sql29);
        $rows29 = mysqli_num_rows(mysqli_query($conn, $sql29));
        if (mysqli_query($conn, $sql29)) {
              header('location: http://localhost/k2/home1.php#'.$p_id);
        } else {
                header('location: http://localhost/k2/home1.php#'.$p_id);
        }


}
else{
	header('location: http://localhost/k2/index.php');
}
?>