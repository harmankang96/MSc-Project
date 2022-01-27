<?php include 'db.php'; ?>
<!DOCTYPE html> 
<html>
    <head>
        <title> Login/Registration Forms</title>
        <link rel="stylesheet" href="log_reg_form.css">
        <link rel="stylesheet" href="index.css">
        <a href="all_lecturers.html"></a>
    </head>
    <body>
        <div class="container">
            <div class="login-container">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="tuggle-btn" onclick="login()">Login</button>
                    <button type="button" class="tuggle-btn" onclick="register()">Register</button>
                </div>
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

                <form id="login" class="input-group" action="#"  method="POST">
                <input type="text" class="input-field" placeholder= "Your ID" required>
                <input type="text" class="input-field" placeholder= "Your Password" required>
                <input type="checkbox" class="check-box"><span>Remember me</span>
                <button type="submit" class="submit-btn">Login</button>
                </form>

                 <?php

    if(!empty($_POST['submit'])){
       if(!empty($_POST['userId'])){
     $lecturerId=mysqli_real_escape_string($con,$_POST['lecturerId']);
   }else{
     echo "please enter User ID <br>";
   } 
      if(!empty($_POST['first_name'])){
     $full_name=mysqli_real_escape_string($con,$_POST['full_name']);
   }else{
     echo "please enter first name <br>";
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
     }else{
       echo mysqli_error($con);
     }
   }else{
     echo "passwords didnt match <br>";
   }
    }
     ?>
     
                <form id="register" class="input-group"  method="POST">
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
                var log = document.getElementById("login")
                var reg = document.getElementById("register")
                var but = document.getElementById("btn")

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