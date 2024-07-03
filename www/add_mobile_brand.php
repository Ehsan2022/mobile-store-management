<?php
  include("user_authentication.php");
  include("dbConn.php");

  $mbname = null;

  // insert
  if(isset($_POST['save'])){
    $mbname = $_POST['mbname'];
    // insert into database tables
    $insert = "insert into mobile_brand(mb_name) values('$mbname')";
    $result = mysqli_query($Conn, $insert);
    // action 
    if($result){
      header("location:add_mobile_brand.php?save=1");
      die;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EN-SMS/Mobile Brands</title>
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

  <main id="main" class="main mb-5">
    <div class="pagetitle ">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <h1 class="breadcrumb-item">Mobile Brands</h1>
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
                    <?php
                        if(isset($_GET['save'])){
                          echo "<h2 class='text-success'>Successfully Inserted!</h2>";
                        }
                    ?>
                <div class="row"> 
                  <label for="mbname" class="col-sm-3 text-center col-form-label">Add Mobile Brand Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="mbname" id="mbname" placeholder="Brand Name" required value="<?php echo $mbname;?>">              
                  </div> 
                </div>                 
                <div class="text-center mt-3">
                  <button type="submit" name="save" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
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
            <div class="card-body">
              <h5 class="card-title">List Of Mobile Brands</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable table-hover table-responsive">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mobile Brand Name</th>
                    <th scope="col" class='text-center'>Action</th>
                  </tr>
                </thead>

                <tbody>

               <?php 
                      //connect to database
                      include("dbConn.php");
                      //read data from database
                      $select = "SELECT * FROM `mobile_brand` order by mb_id desc";
                      $query = mysqli_query($Conn, $select);

                        if(isset($_GET['mb_id'])){
                          $mb_id = $_GET['mb_id'];
                          
                          $delete = "DELETE FROM `mobile_brand` WHERE mb_id= '$mb_id'";
                          $query = mysqli_query($Conn, $delete);
                          
                          if($query){
                            header("location:add_mobile_brand.php?Deleted=1");
                            die;
                          }
                        }
                      $num = 1;

                      while($row = mysqli_fetch_assoc($query)){

                        $mb_id = $row['mb_id'];
                        $mb_name = $row['mb_name'];

                        echo "
                        <tr>
                          <th scope='row'>$num</th>
                          <td>$mb_name</td>
                          <td class='text-center'>
                          <a href='edit_mobile_brand.php?id=$mb_id' title='Edit Mobile Brand'>  <i class='bi bi-pencil-square ' style='font-size:20px; color:green; '></i> </a> 
                          <a style='color:transparent;'>-----</a>
                          <a href='add_mobile_brand.php?mb_id=$mb_id' title='Delete Mobile Brand'>  <i class='bx bxs-trash ' style='font-size:20px; color:red'></i> </a> 
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