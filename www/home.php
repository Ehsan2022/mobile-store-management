<?php
   include("user_authentication.php");
   include("dbConn.php");

   $selectBrand = "SELECT * FROM `mobile_brand`";
   $queryBrand = mysqli_query($Conn, $selectBrand);
   $brand_counter = 0;

   $selectMobile = "SELECT * FROM `mobile`";
   $queryMobile = mysqli_query($Conn, $selectMobile);
   $mobile_counter = 0;

   $selectUser = "SELECT * FROM `user`";
   $queryUser = mysqli_query($Conn, $selectUser);
   $user_counter = 0;

   while($rowBrand = mysqli_fetch_assoc($queryBrand))$brand_counter++;
   while($rowMobile = mysqli_fetch_assoc($queryMobile))$mobile_counter++;
   while($rowUser = mysqli_fetch_assoc($queryUser))$user_counter++;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - E-SMS</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/myLogo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <h1 class="breadcrumb-item active">Dashboard</h1>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12 d-block mx-auto">
                    <div class="row">

                        <!-- Phone Brands Card -->
                        <div class="col-xxl-3 col-md-4 col-6">
                            <div class="card info-card">
                                <div class="card-body">
                                    <h5 class="card-title">Brands <span>| Phone Brands</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div style="background-color:#4b434a55;"
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bookshelf "></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo  $brand_counter; ?> <small>Brand(s)</small></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Mobiles Card -->
                        <div class="col-xxl-3 col-md-4 col-6">
                            <div class="card info-card ">
                                <div class="card-body">
                                    <h5 class="card-title">Products <span>| Mobiles</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div style='background-color:#43f62755;'
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-phone"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo  $mobile_counter; ?> <small>Mobile(s)</small></h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Users Card -->
                        <div class="col-xxl-3 col-md-4 col-6">

                            <div class="card info-card">
                                <div class="card-body">
                                    <h5 class="card-title">Accounts <span>| Users</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div style='background-color:#e219b755;'
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php echo  $user_counter; ?> <small>User(s)</small></h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Views Card -->
                        <div class="col-xxl-3 col-md-4 col-6">
                            <div class="card info-card">
                                <div class="card-body">
                                    <h5 class="card-title">Views <span>| All </span></h5>

                                    <div class="d-flex align-items-center">
                                        <div style='background-color:#69e2ed55;'
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-eye"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6><?php include("viewCounter.php"); ?> <small>View(s)</small></h6>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div><!-- End Customers Card -->
                        <hr class="mb-3">

                    </div>

                    <div class="row">
                        <div class="pagetitle">
                            <ol class="breadcrumb">
                                <h1 class="breadcrumb-item active">Mobile Brands</h1>
                            </ol>
                        </div>

                        <?php
                        $sql = 'SELECT * FROM mobile_brand';
                        $selectQuery = mysqli_query($Conn, $sql);
                        // array bg color of cards
                        $index = 1;
                        $colors = array("","#e219b755","#43f62755","#69e2ed55","#f15d5d3d","#4b434a55");
                        while($row = mysqli_fetch_assoc($selectQuery)){
                          $brandName= $row['mb_name'];
                          $brandID= $row['mb_id'];
                          //number of books for each category
                          $sql_mobile = "SELECT count(*)as mobiles FROM `mobile` where `mobile_brand_mb_id` = '$brandID'";
                          $selectQueryMobile = mysqli_query($Conn, $sql_mobile);
                          $rowMobile= mysqli_fetch_assoc($selectQueryMobile);
                          $mobilesInEachCategory = $rowMobile['mobiles'];
                          // number of all books
                          $sqlAllMobiles = "SELECT count(*)as allBooks FROM `mobile` ";
                          $selectQueryAllMobile = mysqli_query($Conn, $sqlAllMobiles);
                          $rowAllMobiles = mysqli_fetch_assoc($selectQueryAllMobile);
                          $allMobiles = $rowAllMobiles['allBooks'];
                          try {
                            $mobile_percentage = round(((100 * $mobilesInEachCategory) / $allMobiles), 2);
                              echo"
                                <div class='col-xxl-3 col-md-4 col-6'>
                                  <div class='card info-card  '>
                                    <div class='card-body'>
                                      <h5 class='card-title'>$brandName | $mobilesInEachCategory</h5>
                                      <div class='d-flex align-items-center'>
                                        <div style='background-color:$colors[$index] ;' class='card-icon rounded-circle d-flex align-items-center justify-content-center '>
                                          <i class='bi bi-phone '></i>
                                        </div>
                                        <div class='ps-3'>
                                          <span class=' text-success small'> $mobile_percentage% </span><span class=' text-muted small pt-1'> of 100%</span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                ";
                          } catch (\Throwable $th) {
                            echo"
                              <div class='col-xxl-3 col-md-4 col-6'>
                                <div class='card info-card sales-card'>                
                                  <div class='card-body'>
                                    <div class='row'>
                                        <h5 class='col-lg-6 col-md-6 col-6 card-title ' style='letter-spacing:-2px;font-size:17px;'> $brandName</h5>
                                        <h6 class='col-lg-6 col-md-6 col-6 card-title text-end'>0</h6>
                                    </div>

                                    <div class='d-flex align-items-center'>
                                      <div class='card-icon rounded-circle d-flex align-items-center justify-content-center'>
                                        <i class='bi bi-phone'></i>
                                      </div>
                                      <div class='ps-3 d-flex align-items-center justify-content-center '>
                                        <span  class='text-success small pt-1  fw-bold'>0  </span> <span style='letter-spacing:-2px;font-size:12px;'  class='text-muted small pt-2 '> / 100%</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              ";
                          }
                          $index ++ ;
                        }
                      ?>
                    </div>
                </div><!-- End Left side columns -->



            </div>

        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    include("footer.php");
   ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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