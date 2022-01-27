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
                <h1>Student Login Here</h1>
                <?php
                                    if(!empty($_POST['submit'])){
                                    if(!empty($_POST['userId']) && !empty($_POST['password'])){
                                      $userId=mysqli_real_escape_string($con,$_POST['userId']);
                                      $password=md5(mysqli_real_escape_string($con,$_POST['password']));

                                      $sel="select * from students where userId='$userId' and password='$password'";
                                      $rs=mysqli_query($con,$sel);
                                      if(mysqli_num_rows($rs)>0){
                                         /*while($row=mysqli_fetch_assoc($rs)){
                                          $_SESSION['first_name']=$row['first_name'];
                                          $_SESSION['last_name']=$row['last_name'];
                                          $_SESSION['email']=$row['email'];
                                          $_SESSION['id']=$row['id'];
                                          $_SESSION['image']=$row['image'];

                                        } 
*/
                                        header("Location:stu_dashboard.php");
                                      }else{

                                        echo "Your email or password is wrong";
                                      }
                                    }else{
                                      echo "please fill out both fields";
                                    }

                                    }


                                     ?>
                <form id="login" class="input-group" action="stu_dashboard.php" >         
                <input type="text" class="input-field" placeholder= "Your ID" required>
                <input type="text" class="input-field" placeholder= "Your Password" required>
                <input type="checkbox" class="check-box"><span>Remember me</span>
                <button type="submit" class="submit-btn">Login</button>
                 <a class="small" href="StudentRegister.php">Do not have an account? register!</a>

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