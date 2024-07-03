<?php
  include("user_authentication.php");
  include("dbConn.php");
  //update
  $newBrandName = "";

  $mb_id=$_GET['id'];

  $select = "SELECT * from `mobile_brand` where mb_id = $mb_id";
  $selectQuery = mysqli_query($Conn, $select);
  $rowBrand = mysqli_fetch_assoc($selectQuery);

  $mbname_old = $rowBrand['mb_name'];

  if (isset($_POST['update'])) {

    $newBrandName = $_POST['mbname'];

    $update = "UPDATE `mobile_brand` SET `mb_name`='$newBrandName' WHERE mb_id='$mb_id'";
    $updateResult = mysqli_query($Conn, $update);

    // action 
    if($updateResult){
      header("location:add_mobile_brand.php?updated=1");
      die;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>edit book category</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/myLogo.png" rel="icon">
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

<body>

  <!-- ======= Header ======= -->
  <?php
    include("navbar.php");
   ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php
    include("sidebar.php");
   ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Mobile Brand</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Edit Mobile Brand</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Horizontal Form -->
              <form method="post" action="" class="mt-4">
                            <div class="row"> 
                              <label for="mbname" class="col-sm-2 col-form-label">Mobile Brand Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="mbname"  value="<?php echo $mbname_old;?>">                 
                              </div> 
                            </div>                 
                            <div class="text-center mt-3">
                              <button type="submit" name="update" class="btn btn-primary">Save Edit</button>
                              <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                           </form>
            </div>
          </div>

          </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
    include("footer.php");
   ?>
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