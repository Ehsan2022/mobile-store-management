<?php
  include("user_authentication.php");

  if(isset($_POST['save'])){

    $bname = $_POST['bname'];
    $blang = $_POST['blang'];
    $NOpage = $_POST['NOpage'];
    $fAuthor = $_POST['fAuthor'];    
    $sAuthor = $_POST['sAuthor'];    
    $bdesc = $_POST['bdesc'];    
    $bcategory = $_POST['cname'];    
    //1 connect to server
    $seConnect = mysqli_connect("localhost","root","","library");
    //2 write query (insert query)
    $query = "INSERT INTO `book`( `name`, `number_of_pages`, `first_author`, `second_author`, `language`, `description`, `book_category_id`) VALUES ('$bname','$NOpage','$fAuthor','$sAuthor','$blang','$bdesc','$bcategory')";
    $result = mysqli_query($seConnect, $query);
    // action 
    if($result){
      header("location:add_book.php?save=1");
    die;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Add Book</title>
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
          <h1 class="breadcrumb-item">Add Mobile</li>
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
              <form method="post" action="">
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
                            <select type="text" class="form-control" name="brand" id="brand" value="category">

                                <?php
                                    $seConnect = mysqli_connect("localhost","root","","library");

                                    $sql = "SELECT * FROM `book_category`";
                                
                                    $query = mysqli_query($seConnect, $sql);
                
                                    while($row = mysqli_fetch_assoc($query)){
            
                                    $category_book_name = $row['name'];
                                    $category_book_id = $row['id'];

                                    echo "
                                    <option value='$category_book_id'>$category_book_name</option>
                                        ";
                                    }
                                ?>
                            </select>
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label for="model" class="col-sm-5 col-form-label text-lg-end text-md-end">Model</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="model" id="model" value="" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="color" class="col-sm-5 col-form-label text-lg-end text-md-end">Color</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="color" id="color" value="" required>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="ram" class="col-sm-5 col-form-label text-lg-end text-md-end">Ram</label>
                          <div class="col-sm-7">
                            <input type="text" class="form-control" name="ram" id="ram" value="" required>
                          </div>
                        </div>
                      </div>
                
                      <div class="col-lg-6 col-md-6 col-12">
                          <div class="row mb-3">
                            <label for="rom" class="col-sm-5 col-form-label text-lg-end text-md-end">Rom</label>
                            <div class="col-sm-7 ">
                              <input type="text" class="form-control" name="rom" id="rom" value="">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="fcam" class="col-sm-5 col-form-label text-lg-end text-md-end">Fornt Cam</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="fcam" id="fcam" value="">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label for="rcam" class="col-sm-5 col-form-label text-lg-end text-md-end">Rear Cam</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="rcam" id="rcam" value="" required>
                            </div>
                          </div>

                          <div class="row d-flex justify-content-center  mb-3">
                            <button type="submit" name="save" class="col-lg-3 col-md-3 col-3 btn btn-primary ">Save</button>
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