<?php
  include("user_authentication.php");
  // connection to database
  include("dbConn.php");
  // insert mobile
  if(isset($_POST['save'])){
     $brand = $_POST['brand'];
     $model = $_POST['model'];
     $color = $_POST['color'];
     $ram = $_POST['ram'];    
     $rom = $_POST['rom'];    
     $fcam = $_POST['fcam'];    
     $rcam = $_POST['rcam'];    
    //1 connect to server
    //2 write query (insert query)
    $query = "INSERT INTO `mobile`( `mobile_model`, `mobile_color`, `mobile_ram`, `mobile_rom`, `mobile_front_cam`, `mobile_back_cam`, `mobile_brand_mb_id`) VALUES ('$model','$color','$ram','$rom','$fcam','$rcam','$brand')";
    $result = mysqli_query($Conn, $query);
    // action 
    if($result){
      header("location:add_mobile.php?add=1");
    die;
    }
  }

  // Delete user
  if(isset($_GET['mobile_id'])){
    $mobileID = $_GET['mobile_id'];

    $delete = "DELETE FROM `mobile` WHERE mobile_id= '$mobileID'";
    $deleteQuery = mysqli_query($Conn, $delete);

    if($deleteQuery){
        header("location:add_mobile.php?Deleted=1");
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
                            <select type="text" class="form-control" name="brand" id="brand" value="brand">

                                <?php
                                    $sql = "SELECT * FROM `mobile_brand`";
                                    $query = mysqli_query($Conn, $sql);               
                                    while($row = mysqli_fetch_assoc($query)){
            
                                    $brand_id = $row['mb_id'];
                                    $brand_name = $row['mb_name'];

                                    echo "
                                    <option value='$brand_id'>$brand_name</option>
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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body table-responsive">
              <h5 class="card-title">List Of Mobiles</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable table-hover ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Model</th>
                    <th scope="col">Color</th>
                    <th scope="col">Ram</th>
                    <th scope="col">Rom </th>
                    <th scope="col">Front Camera</th>
                    <th scope="col">Rear Camera</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    // Read from DB and displaying users
                    $select = "SELECT * FROM `mobile` INNER JOIN `mobile_brand` ON  mobile_brand_mb_id = mb_id";
                    $selectQuery = mysqli_query($Conn, $select);

                    $num = 1;
                    while($row = mysqli_fetch_assoc($selectQuery)){
                        $mobile_id = $row['mobile_id'];
                        echo $model = $row['mobile_model'];
                        $color = $row['mobile_color'];
                        $ram = $row['mobile_ram'];
                        $rom = $row['mobile_rom'];    
                        $fcam = $row['mobile_front_cam'];    
                        $rcam = $row['mobile_back_cam'];    
                        $brand = $row['mb_name'];    

                        echo "
                        <tr>
                            <th scope='row'>$num</th>
                            <th >$model</th>
                            <td>$color</td>
                            <td>$ram</td>
                            <td>$rom</td>
                            <td>$fcam</td>
                            <td>$rcam</td>
                            <td>$brand</td>
                            <td>
                            <a href='edit_mobile.php?mobile_id=$mobile_id' title='Edit Mobile '>  <i class='bi bi-pencil-square' style='font-size:20px; color:green'></i> </a> 
                            <a style='color:transparent;'>----</a>
                            <a href='add_mobile.php?mobile_id=$mobile_id' title='Delete Mobile'>  <i class='bx bxs-trash' style='font-size:20px; color:red'></i> </a> 
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