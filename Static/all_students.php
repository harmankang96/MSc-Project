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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    </head>
    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">All students</h1>
                    <div class="mb-4 text-right"><a href="addstudent.php"><button class="btn btn-primary profile-button" type="button" data-toggle="tooltip" data-placement="top"> Add students </button></a></div>
                    <?php
                    if(!empty($_GET['delete'])){
                      $id=$_GET['delete'];
                      $del="delete from allstudents where ID=$id";
                      mysqli_query($con,$del);

                    }


                     ?>
                    <table id="mytable">
                      <thead>
                        <tr>
                          <th>Student ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>DOB</th>
                          <th>Gender</th>
                          <th>Course</th>
                          <th>Result</th>
                          <th>options</th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php
                      $sel="select * from allstudents";
                      $rs=mysqli_query($con,$sel);
                      while($row=mysqli_fetch_assoc($rs)){
                     ?>
                     <tr>
                       <td><?php echo $row['student_ID']; ?></td>
                       <td><?php echo $row['first_name']; ?></td>
                       <td><?php echo $row['last_name']; ?></td>
                       <td><?php echo $row['dob']; ?></td>
                       <td><?php echo $row['gender']; ?></td>
                       <td><?php echo $row['course']; ?></td>
                       <td><?php echo $row['result']; ?></td>
                      <td> 

                       <a href="?delete=<?php echo $row['ID']; ?>" onclick="return confirm('are you sure you want to delete?');"><li class="list-inline-item">
                                                    <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                                </li></a>
                       <a href="editStudent.php?id=<?php echo $row['ID']; ?>"><li class="list-inline-item">
                                                    <button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                                </li></a></td>
                     </tr>


                   <?php } ?>
                 </tbody>
                     </table>
                     <div class="mb-4 mt-5 text-right"><a href="admin_login.php"><button class="btn btn-primary profile-button" type="button" data-toggle="tooltip" data-placement="top"> Admin Dashboard </button></a>
                     <a href="lecturer_login.php"><button class="btn btn-primary profile-button" type="button" data-toggle="tooltip" data-placement="top"> Lecturer Dashboard </button></a>
                     <a href="index.php"><button class="btn btn-primary profile-button" type="button" data-toggle="tooltip" data-placement="top"> Logout </button></a></div>
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
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
  $('#mytable').DataTable();
} );
</script>
</body>
</html>