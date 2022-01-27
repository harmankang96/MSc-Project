<?php include 'db.php'; ?>
<!DOCTYPE html> 
<html>
    <head>
        <title> Registration Forms</title>
        <link rel="stylesheet" href="log_reg_form.css">
        <link rel="stylesheet" href="index.css">
        <a href="all_lecturers.html"></a>
    </head>
    <body>
        <div class="container">
        <img src="background.jpg" alt="Student Support image">
            <div class="login-container">
            <h1>Register</h1>
     <?php

    if(!empty($_POST['submit'])){
       if(!empty($_POST['lecturerId'])){
     $lecturerId=mysqli_real_escape_string($con,$_POST['lecturerId']);
   }else{
     echo "please enter User ID <br>";
   } 
      if(!empty($_POST['full_name'])){
     $full_name=mysqli_real_escape_string($con,$_POST['full_name']);
   }else{
     echo "please enter full name <br>";
   }
  
   if(!empty($_POST['email'])){
     $email=mysqli_real_escape_string($con,$_POST['email']);
   }else{
     echo "enter email <br>";
   }

     $password=mysqli_real_escape_string($con,$_POST['password']);
     if(!empty($_POST['password']) && !empty($_POST['lecturerId']) && !empty($_POST['full_name'])   && !empty($_POST['email'])){
       $password=md5($password);
     $query="insert into lecturer(lecturerId,full_name, email,password) values('$lecturerId','$full_name','$email','$password')";
     $rs=mysqli_query($con,$query);
     if($rs){
       ?>
       <script type="text/javascript">
         alert("succssfully registered");
         
       </script>
       <?php
       header("Location:lecturer_login.php");
     }else{
       echo mysqli_error($con);
     }
   }else{
     echo "passwords didnt match <br>";
   }
    }
     ?>
     
                <form  class="input-group" style="margin-left: 45px" method="POST">
                <input type="text" class="input-field" name="lecturerId" placeholder= " ID" required>
                <input type="text" class="input-field" name="full_name" placeholder= "Full name" required>
                <input type="email" class="input-field" name="email" placeholder= "Email" required>
                <input type="text" class="input-field" name="password" placeholder= "Password" required>
                <!-- /*<button type="submit" class="submit-btn">Register</button>*/ -->
                 <input type="submit" name="submit" value="Register" class="submit-btn btn btn-primary btn-user btn-block">
                </form>
            </div>
        </div>
            
             <script>
               
                
                function register(){
                    log.style.left = "-400px"
                    reg.style.left = "50px"
                   
                }
                
                  
            </script> 
    </body>
</html>