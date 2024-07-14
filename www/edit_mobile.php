<?php
  include("user_authentication.php");
  // connection to database
  include("dbConn.php");

  $mobileID=$_GET['mobile_id'];
  $select = "SELECT * FROM `mobile` INNER JOIN `mobile_brand` ON  mobile_brand_mb_id = mb_id where mobile_id = $mobileID";
  $result = mysqli_query($Conn, $select);
  while($row = mysqli_fetch_assoc($result)){
    $mobile_id_old = $row['mobile_id'];
    $model_old = $row['mobile_model'];
    $color_old = $row['mobile_color'];
    $ram_old = $row['mobile_ram'];
    $rom_old = $row['mobile_rom'];    
    $fcam_old = $row['mobile_front_cam'];    
    $rcam_old = $row['mobile_back_cam'];    
    $fimg_old = $row['fimg'];    
    $bimg_old = $row['bimg'];    
    $price_old = $row['price'];    
    $brand_id_old = $row['mb_id'];    
}

if(isset($_POST['update'])){
   
    $model_new = $_POST['model'];
    $color_new = $_POST['color'];
    $ram_new = $_POST['ram'];
    $rom_new = $_POST['rom'];
    $fcam_new = $_POST['fcam'];
    $rcam_new = $_POST['rcam'];
    $price_new = $_POST['price'];
    $brand_new = $_POST['brand'];

    $fImg_new= $_FILES['fimg']['name'];
    $source = $_FILES['fimg']['tmp_name'];
    $_FILES['fimg']['type'];
    $allowed = array('image/jpeg', 'image/jpg','image/png');
    $extFimg = substr($fImg_new, strrpos($fImg_new, '.') + 1);
    $time = time();
    $fImg_new = $model."_".$time.".".$extFimg;

    $bImg_new= $_FILES['bimg']['name'];
    $source = $_FILES['bimg']['tmp_name'];
    $_FILES['bimg']['type'];
    $allowed = array('image/jpeg', 'image/jpg','image/png');
    $extBimg = substr($bImg_new, strrpos($bImg_new, '.') + 1);
    $time = time();
    $bImg_new = $model."_".$time.".".$extBimg;

   if(in_array($_FILES['fimg']['type'], $allowed) && in_array($_FILES['bimg']['type'], $allowed)){
       $destination = "assets/img/";
       move_uploaded_file($source, $destination.$fImg_new);
       move_uploaded_file($source, $destination.$bImg_new);
   }else{

     echo   $msgErr = "this type of file is not allowed!";
   }
       
    $update_sql = "update `mobile` set `mobile_model`='$model_new', `mobile_color`='$color_new', `mobile_ram`='$ram_new', `mobile_rom`='$rom_new', `mobile_front_cam`='$fcam_new', `mobile_back_cam`='$rcam_new', `mobile_brand_mb_id`='$brand_new', `fimg`='$fImg_new', `bimg`='$bImg_new' where mobile_id='$mobileID'";
    $updateResult = mysqli_query($Conn, $update_sql);
    if($updateResult){
        header("location:add_mobile.php?Updated=1");
    die;
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit Mobile</title>
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

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <h1 class="breadcrumb-item">Edit Mobile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <hr>
              <!-- Horizontal Form -->
              <form method="post" enctype="multipart/form-data">
                <?php
                if(isset($_GET['save'])){
                 echo "<h2 class='text-success'>Successfully Inserted!</h2>";
                }
                ?>
                <div class="row">
                      <div class="col-lg-6 col-md-6 col-12">
                        <div class="row mb-3">
                          <label for="brand" class="col-sm-5 col-form-label text-lg-end text-md-end">Brand</label>
                          <div class="col-sm-7">
                            <select type="text" class="form-control" name="brand" id="brand" value="brand">

                                <?php
                                    $sql = "SELECT * FROM `mobile_brand`";
                                    $query = mysqli_query($Conn, $sql);               
                                    while($row = mysqli_fetch_assoc($query)){
            
                                    $brand_id = $row['mb_id'];
                                    $brand_name = $row['mb_name'];

                                    if ($brand_id == $brand_id_old) {
                                        echo "
                                            <option value='$brand_id' selected>$brand_name</option>
                                        ";
                                    }
                                    else {
                                        echo "
                                            <option value='$brand_id'>$brand_name</option>
                                        ";
                                    }
                                    }
                                ?>
                            </select>
                          </div>
                        </div>

                        <div class="row justify-content-end mb-3">
                          <div class="col-lg-5 ">
                          <label for="fimg" class=" col-form-label text-lg-end offset-4">Front Image</label>
                          <input style="width:100px;" type="file" class="form-control offset-4" name="fimg" id="fimg" value="<?php echo $fimg_old ?>" required>

                          </div>
                          <div class="col-lg-5 ">
                          <label for="fimg" class=" col-form-label text-lg-end text-md-end offset-5">Back Image</label>
                          <input style="width:100px;" type="file" class="form-control offset-5" name="fimg" id="fimg" value="<?php echo $bimg_old ?>" required>

                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label for="model" class="col-sm-5 col-form-label text-lg-end text-md-end">Model</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="model" id="model" value="<?php echo $model_old ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="color" class="col-sm-5 col-form-label text-lg-end text-md-end">Color</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="color" id="color" value="<?php echo $color_old ?>" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="ram" class="col-sm-5 col-form-label text-lg-end text-md-end">Ram</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="ram" id="ram" value="<?php echo $ram_old ?>" required>
                          </div>
                        </div>
                      </div>
                
                      <div class="col-lg-6 col-md-6 col-12">
                          <div class="row mb-3">
                            <label for="rom" class="col-sm-5 col-form-label text-lg-end text-md-end">Rom</label>
                            <div class="col-sm-7 ">
                              <input type="text" class="form-control" name="rom" id="rom" value="<?php echo $rom_old ?>">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="fcam" class="col-sm-5 col-form-label text-lg-end text-md-end">Fornt Cam</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="fcam" id="fcam" value="<?php echo $fcam_old ?>">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="rcam" class="col-sm-5 col-form-label text-lg-end text-md-end">Rear Cam</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="rcam" id="rcam" value="<?php echo $rcam_old ?>" required>
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="price" class="col-sm-5 col-form-label text-lg-end text-md-end">Price/$</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="price" id="price" value="<?php echo $price_old ?>" required>
                            </div>
                          </div>

                          <div class="row d-flex justify-content-center  mb-3">
                            <button type="submit" name="update" class="col-lg-3 col-md-3 col-3 btn btn-primary ">save</button>
                            <button type="reset" class="col-lg-3 col-md-3 col-3 ms-2 btn btn-secondary">Reset</button>
                          </div>
                      </div>
                </div>                
                
              </form><!-- End Horizontal Form -->

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short">
  </i></a>

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