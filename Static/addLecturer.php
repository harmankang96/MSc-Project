<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Lecturer</title>
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
                    <h1 class="h3 mb-4 text-gray-800">Add Lecturer</h1>
                    <div class="container rounded bg-white mt-5">
                      <?php
                      if(!empty($_POST['submit']) && !empty($_POST['lecturer_ID']) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['availability']) ){
                            $lecturer_ID=$_POST['lecturer_ID'];
                            $name=$_POST['name'];
                            $gender=$_POST['gender'];
                            $availability=$_POST['availability'];
                        $qry="insert into allLecturers(name, lecturer_ID, gender,availability) values('$name','$lecturer_ID','$gender','$availability')";
                        $rs=mysqli_query($con,$qry);
                        if($rs){
                          echo "successfully inserted";
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
   <div class="col-md-6"><input type="text" class="form-control" name="lecturer_ID" placeholder="Lecturer ID"  ></div>
   <div class="col-md-6"><input type="text" class="form-control" name="name" placeholder="Full name" ></div>
                </div>

                 <div class="row mt-3">
        <div class="col-md-6"><input type="text" class="form-control" name="gender" placeholder="gender" ></div>
         <div class="col-md-6"><input type="text" class="form-control" name="availability" placeholder="Availability" ></div>
                </div>


                <div class="mt-5 text-right"><input type="submit" name="submit" class="btn btn-primary profile-button" value="Save Profile"></div>
                <div class="mt-2 text-right"><a href="all_lecturers.php"><button class="btn btn-primary profile-button" type="button" data-toggle="tooltip" data-placement="top"> All Lecturers </button></a></div>

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