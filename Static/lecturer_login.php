<?php
session_start();
if(empty($_POST['submit'])){
session_destroy();
}
include 'db.php';
?>
<!DOCTYPE 
html> 
<html>
    <head>
        <title> Managers Login Form</title>
        <link rel="stylesheet" href="log_reg_form.css">
        <link rel="stylesheet" href="index.css">

        
        
    </head>
    <body>
        <img src="background.jpg" alt="Student Support image">
        <div class="container">
            <div class="login-container">
                <h1>lecturer Login Here</h1>
                <?php
                                    if(!empty($_POST['submit'])){
                                    if(!empty($_POST['lecturerId']) && !empty($_POST['password'])){
                                      $lecturerId=mysqli_real_escape_string($con,$_POST['lecturerId']);
                                      $password=md5(mysqli_real_escape_string($con,$_POST['password']));

                                      $sel="select * from lecturer where lecturerId='$lecturerId' and password='$password'";
                                      $rs=mysqli_query($con,$sel);
                                      if(mysqli_num_rows($rs)>0){

                                        header("Location:lec_dashboard.php");
                                      }else{

                                        echo "Your email or password is wrong";
                                      }
                                    }else{
                                      echo "please fill out both fields";
                                    }

                                    }


                                     ?>

                <form id="login" class="input-group" action="lec_dashboard.php" method="POST">
                <input type="text" class="input-field" placeholder= "Your ID" required>
                <input type="text" class="input-field" placeholder= "Your Password" required>
                <input type="checkbox" class="check-box"><span>Remember me</span>
                <button type="submit" class="submit-btn">Login</button>
                <a class="small mt-2 small" href="lecturerRegister.php">Do not have an account? register!</a>

                </form>
            </div>
        </div>
            
            <script>
                var log = document.getElementById("login")
                function login(){
                    log.style.left = "50px"
                }  
                
                

            </script>
    </body>
</html>