<?php
    include("user_authentication.php");
    include("dbConn.php");
    $id_from_session = $_SESSION["userID"];
    //connect to DB
    // Read old data from DB and displaying users
    $select = "SELECT * FROM `user` where id ='$id_from_session'";
    $selectQuery = mysqli_query($Conn, $select);
    $row = mysqli_fetch_assoc($selectQuery);

    $fName_old = $row['first_name'];
    $lName_old = $row['last_name'];
    $uName_old = $row['user_name'];
    $password_old = $row['password'];
    $img_old = $row['profile_image_url'];

    $flag=0;

    if(isset($_POST['update'])){
        $fName_new = $_POST['fname'];
        $lName_new = $_POST['lname'];
        $uName_new = $_POST['uname'];
        $password_current = $_POST['currpass'];
        $password_new = $_POST['newpass'];
        $img_new = $_POST['img'];
        //update user
        if ($password_current== $password_old) {
            $update = " UPDATE `user` SET `first_name`='$fName_new',`last_name`='$lName_new',`user_name`='$uName_new',`password`='$password_new', `profile_image_url`='$img_new' where `id`='$id_from_session' ";
            $updateResult = mysqli_query($Conn, $update);
            $flag = 1;
        }else{
            $flag = 2;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Edit Profile</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        <!-- Google Fonts -->
        <!-- <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
        <!-- Vendor CSS Files -->
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
    <style>
        .form-control{
            background-color:rgba(200,200,255,0.2);
        }
    </style>
    <body>
        <!-- ======= Header ======= -->
        <?php include("navbar.php"); ?>
        <!-- End Header -->
        <!-- ======= Sidebar ======= -->
        <?php include("sidebar.php"); ?>
        <!-- End Sidebar-->
        <main id="main" class="main">

            <div class="pagetitle">
            <h1>Edit Profile</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Edit Profile</li>
                </ol>
            </nav>
            </div><!-- End Page Title -->
            <section class="section">
                <div class="row ">
                    <div class="col-lg-8 d-block mx-auto">
                        <div class="card ">
                            <div class="card-body">
                            <h4 class="text-center mt-3 mb-5">Edit your profile</h4>
                            <?php
                            if ($flag == 1) {
                                echo "<h5 class='text-success text-center pb-3'>Profile changes updated successfully! </h5>";
                            }
                            if ($flag == 2) {
                                echo "<h5 class='text-danger text-center pb-3'>Oops! Current Password is incorrect. Try again! </h5>";
                            }
                            else{
                                echo "<h5 class='text-danger text-center pb-3'></h5>";
                            }
                            ?>
                            <!-- Horizontal Form -->
                            <form method="post" action="">
                                <?php
                                    if(isset($_GET['save'])){
                                        echo "<h2 class='text-success'>Successfully Inserted!</h2>";
                                    }
                                ?>
                                <div class="row mb-3">
                                    <label for="img" class="col-sm-3 col-form-label ">Profile Image</label>
                                    <div class="col-sm-9">
                                        <input style="width:100px;" type="file" class="form-control" name="img" id="inputText" value="<?php echo $img_old ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="fname" id="inputText" required value="<?php echo $fName_old ?>" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lname" id="inputText" required value="<?php echo $lName_old ?>" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="uname" class="col-sm-3 col-form-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="uname" id="inputText" required value="<?php echo $uName_old ?>" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="currpass" class="col-sm-3 col-form-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="currpass" id="inputText" required placeholder="Enter your current password!">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newpass" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="newpass" id="inputText" required placeholder="Enter your new password!">
                                    </div>
                                </div>
        
                                <div class="text-center">   
                                    <button type="submit" name="update" class="btn btn-primary">Save</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main><!-- End #main -->
        <!-- ======= Footer ======= -->
        <?php include("footer.php"); ?>
        <!-- End Footer -->
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