<?php
    include("user_authentication.php");
    //connect to server 
    include("dbConn.php");
    // Delete user
    if(isset($_GET['uID'])){
        $userID = $_GET['uID'];

        $delete = "DELETE FROM `user` WHERE id= '$userID'";
        $deleteQuery = mysqli_query($Conn, $delete);

        if($deleteQuery){
            header("location:list_of_users.php?Deleted=1");
            die;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>list of Users</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/myLogo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <?php include("navbar.php"); ?>
   <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("sidebar.php"); ?>
   <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <h1 class="breadcrumb-item">List OF Users</h1>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body table-responsive">
              <h5 class="card-title">All Users</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Profile Image</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    // Read from DB and displaying users
                    $select = "SELECT * FROM `user` order by id desc";
                    $selectQuery = mysqli_query($Conn, $select);

                    $num = 1;
                    while($row = mysqli_fetch_assoc($selectQuery)){
                        $id = $row['id'];
                        $fName = $row['first_name'];
                        $lName = $row['last_name'];
                        $uName = $row['user_name'];
                        $password = $row['password'];    
                        $status = $row['status'];    
                        $img = $row['profile_image_url'];    

                        echo "
                        <tr>
                            <th scope='row'>$num</th>
                            <th ><img style='max-height:40px;border:none;' class='img' src='assets/img/$img'></th>
                            <td>$fName</td>
                            <td>$lName</td>
                            <td>$uName</td>
                            <td>$password</td>
                            <td>$status</td>
                            <td>
                            <a href='edit_user.php?uID=$id' title='Edit User '>  <i class='bi bi-pencil-square' style='font-size:20px; color:green'></i> </a> 
                            <a style='color:transparent;'>----</a>
                            <a href='list_of_users.php?uID=$id' title='Delete User'>  <i class='bx bxs-trash' style='font-size:20px; color:red'></i> </a> 
                            </td>
                        </tr>
                        ";
                        $num++;
                    }
                ?> 
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php  include("footer.php"); ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>