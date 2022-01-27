<!DOCTYPE html> 
<html>
    <head>
        <title> Login Form</title>
        <link rel="stylesheet" href="log_reg_form.css">
        <link rel="stylesheet" href="index.css">

        
        
    </head>
    <body>
        <div class="container">
            <div class="login-container">
                <h1>Login Here</h1>
                <?php
                                    if(!empty($_POST['submit'])){
                                    if(!empty($_POST['adminId']) && !empty($_POST['password'])){
                                      $adminId=mysqli_real_escape_string($con,$_POST['adminId']);
                                      $password=md5(mysqli_real_escape_string($con,$_POST['password']));

                                      $sel="select * from admin where adminId='$adminId' and password='$password'";
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
                                        header("Location:admin_dashboard.php");
                                      }else{

                                        echo "Your email or password is wrong";
                                      }
                                    }else{
                                      echo "please fill out both fields";
                                    }

                                    }


                                     ?>
                <form id="login" class="input-group" action="admin_dashboard.php" method="POST" >         
                <input type="text" class="input-field" name="adminId" placeholder= "Your ID" required>
                <input type="text" class="input-field" name="password" placeholder= "Your Password" required>
                <input type="checkbox" class="check-box"><span>Remember me</span>
                <button type="submit" class="submit-btn">Login</button>

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