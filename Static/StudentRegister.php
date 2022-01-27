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
       if(!empty($_POST['userId'])){
     $userId=mysqli_real_escape_string($con,$_POST['userId']);
   }else{
     echo "please enter User ID <br>";
   } 
      if(!empty($_POST['first_name'])){
     $firstname=mysqli_real_escape_string($con,$_POST['first_name']);
   }else{
     echo "please enter first name <br>";
   }
     if(!empty($_POST['last_name'])){
     $lastname=mysqli_real_escape_string($con,$_POST['last_name']);
   }else{

     echo "please enter last name <br>";
   }
  
   if(!empty($_POST['email'])){
     $email=mysqli_real_escape_string($con,$_POST['email']);
   }else{
     echo "enter email <br>";
   }

     $password=mysqli_real_escape_string($con,$_POST['password']);
     if(!empty($_POST['password']) && !empty($_POST['userId']) && !empty($_POST['first_name']) && !empty($_POST['last_name'])  && !empty($_POST['email'])){
       $password=md5($password);
     $query="insert into students(userId,first_name,last_name,email,password) values('$userId','$firstname','$lastname','$email','$password')";
     $rs=mysqli_query($con,$query);
     if($rs){
       ?>
       <script type="text/javascript">
         alert("succssfully registered");
         
       </script>
       <?php header("Location:login_form_student.php"); 
     }else{
       echo mysqli_error($con);
     }
   }else{
     echo "passwords didnt match <br>";
   }
    }
     ?>
                <form  class="input-group" style="margin-left: 45px" method="POST">
                <input type="text" class="input-field" name="userId" placeholder= "User ID" required>
                <input type="text" class="input-field" name="first_name" placeholder= "first name" required>
                <input type="text" class="input-field" name="last_name" placeholder= "last name"required>
                <input type="email" class="input-field" name="email" placeholder= "Email" required>
                <input type="text" class="input-field" name="password" placeholder= "Password" required>
                 <input type="submit" name="submit" value="Register" class="submit-btn btn btn-primary btn-user btn-block">
                </form>
            </div>
        </div>
            
             <script>
                var log = document.getElementById("login")
                var reg = document.getElementById("register")
                
                function register(){
                    log.style.left = "-400px"
                    reg.style.left = "50px"
                   
                }
                
                function login(){
                    log.style.left = "100px"
                    reg.style.left = "450px"
                    but.style.left = "0"
                }   
            </script> 
    </body>
</html>