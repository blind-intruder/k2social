<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){


$s_email=htmlspecialchars($_POST['signup-email']);
$s_fname=htmlspecialchars($_POST['signup-first-name']);
$s_lname=htmlspecialchars($_POST['signup-last-name']);
$s_pass=md5($_POST['signup-pass']);
$s_gender=htmlspecialchars($_POST['inlineRadioOptions']);
$s_b_day=htmlspecialchars($_POST['signup-birthday-date']);
$s_b_month=htmlspecialchars($_POST['signup-birthday-month']);
$s_b_year=htmlspecialchars($_POST['signup-birthday-year']);

   if ( ctype_alpha($s_fname) && ctype_alpha($s_lname) ) 
   {
        

     $servername = 'localhost';
$username = 'root';
$password = '198273645';

// Create connection
$conn = new mysqli($servername, $username, $password,'k2');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} 

        if (empty($s_email) || empty($s_fname) || empty($s_lname) || empty($s_pass) || empty($s_gender) || empty($s_b_day) || empty($s_b_month) || empty($s_b_year) )
        {
    	 header( "location: http://localhost/k2/index.php?empty='true'");
        }
        else
        {

            


         ///check if email already exits
         $sql = "SELECT u_email FROM users where u_email='$s_email'";
         $result = mysqli_query($conn, $sql);
         $rows = mysqli_num_rows(mysqli_query($conn, $sql));
         if ($rows>0) {
             header( "location: http://localhost/k2/index.php?email-error='true'");
         }
         else
             {

             	 ///check email is real or not
                  $s_email = filter_var($s_email, FILTER_SANITIZE_EMAIL);

             // Validate e-mail
                 if (filter_var($s_email, FILTER_VALIDATE_EMAIL)) 
                 {


                       $sql = "INSERT INTO users (u_email, u_pass, u_lname, u_fname, u_gender, u_b_date, u_b_month, u_b_year)
                        VALUES ('$s_email', '$s_pass', '$s_lname', '$s_fname', '$s_gender', '$s_b_day', '$s_b_month', '$s_b_year')";
                        $result = mysqli_query($conn, $sql);
    
                          if ($result) 
                         {
                             $sql1 = "SELECT u_id from users where u_email='$s_email'";
                             $result1 = mysqli_query($conn, $sql1);
                              $rows1 = mysqli_num_rows(mysqli_query($conn, $sql1));
                             if ($rows1>0) {
                                 while ($rows1= mysqli_fetch_assoc($result1)) {
                                     $id=$rows1["u_id"];
                                     $sql2 = "INSERT INTO user_setting (u_id) VALUES ('$id')";
                                     $result2 = mysqli_query($conn, $sql2);
                                     if ($result2) 
                                        {
                                              header( "location: http://localhost/k2/index.php?signup-success='true'");
                                        }
                                 }
                             }
                             header( "location: http://localhost/k2/index.php?signup-success='true'");
                         } 
                       ///if email or password not correct
                         else
                         {
                             header( "location: http://localhost/k2/index.php?error='true'");
                         }

                 }    
                 else
                 {
                   header( "location: http://localhost/k2/index.php?fake-email='true'");
                 }   
             }
        }
     }

     ///if not letters in  fname and lname
     else{
      header( "location: http://localhost/k2/index.php?fname-error='true'");
     }   
}
else{
	header( "location: http://localhost/k2/index.php");
}
?>