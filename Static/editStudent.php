<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Diagnostics</title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.0/angular.js"></script>
        <script src="studentsupport.js"></script>
        <script src="all_students.js"></script>
        <link rel="stylesheet" href="data_style.css">

         <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit Student</h1>
                    <div class="container rounded bg-white mt-5">
                        <?php
                        if(!empty($_GET['id'])){
                          $id=$_GET['id'];
                          $sel="select * from allstudents where ID=$id";
                          $rsel=mysqli_query($con,$sel);
                          while($row=mysqli_fetch_assoc($rsel)){
                            $student_ID=$row['student_ID'];
                            $first_name=$row['first_name'];
                            $last_name=$row['last_name'];
                            $dob=$row['dob'];
                            $gender=$row['gender'];
                            $course=$row['course'];
                            $result=$row['result'];
                          }



                        }

                      if(!empty($_POST['submit'])){
                         $student_ID=$_POST['student_ID'];
                            $first_name=$_POST['first_name'];
                            $last_name=$_POST['last_name'];
                            $dob=$_POST['dob'];
                            $gender=$_POST['gender'];
                            $course=$_POST['course'];
                            $result=$_POST['result'];
                        $qry="update allstudents set student_ID='$student_ID', first_name='$first_name',last_name='$last_name', dob='$dob',gender='$gender',course='$course',result='$result' where ID=".$_GET['id'];
                        $rs=mysqli_query($con,$qry);

                        if($rs){
                          // ob_start();
                          // header("Location:allstudents.php");
                          // ob_end_clean();
                          echo "successfully updated";
                        }else{
                          echo mysqli_error($con);
                        }
                      }



                       ?>


                      <form  method="post">


    <div class="row">

        <div class="col-md-8">
            <div class="p-3 py-5">

                <div class="row mt-2">
   <div class="col-md-6"><input type="text" class="form-control" name="student_ID" placeholder="student ID"  value="<?php echo $student_ID; ?>"></div>
   <div class="col-md-6"><input type="text" class="form-control" name="first_name" placeholder="first_name" value="<?php echo $first_name; ?>"></div>
                </div>

                <div class="row mt-3">
        <div class="col-md-6"><input type="text" class="form-control" name="last_name" placeholder="last_name" value="<?php echo $last_name; ?>"></div>
        <div class="col-md-6"><input type="date" class="form-control" name="dob" placeholder="Date of birth" value="<?php echo $dob; ?>"></div>
                </div>

                 <div class="row mt-3">
        <div class="col-md-6"><input type="text" class="form-control" name="gender" placeholder="gender" value="<?php echo $gender; ?>"></div>
         <div class="col-md-6"><input type="text" class="form-control" name="course" placeholder="course" value="<?php echo $course; ?>"></div>
                </div>
                <div class="row mt-3">
         <div class="col-md-6"> <input type="text" class="form-control" name="result" placeholder="result" value="<?php echo $result; ?>"> </div>
                </div>


                <div class="mt-5 ">
                    <input type="submit" name="submit" class="btn btn-primary profile-button" value="Save Profile">
                <a href="all_students.php"><button class="btn btn-primary profile-button" type="button" data-toggle="tooltip" data-placement="top"> All students </button></a></div>
            </div>
              </form>
        </div>
    </div>
</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>