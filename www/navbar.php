<?php
    include("dbConn.php");
    if(!$Conn){
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM user";
    $result = mysqli_query($Conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      if ($_SESSION["userID"] == $row['id']) {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $user_name = $row['user_name'];
        $profile_image = $row['profile_image_url'];
      }
    }
?>

<style>
  .img{
    border:1px solid grey;
  }
</style>
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/myLogo.png" alt="My Logo">
      <span class="d-none d-lg-block ">E-SMS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn "></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img class="img" style="border-radius:50%;max-height:35px;" src="<?php echo "assets/img/$profile_image" ?>" alt="Profile" >
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user_name ?></span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6> <?php echo "$first_name $last_name" ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="edit_profile.php">
                <i class="bi bi-person"></i>
                <span>Edit Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a href="" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="page">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header>

        <!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog   modal-dialog-centered">
    <div class="modal-content bg-dark p-5">
      <h3 class="text-warning text-center">Do you want to Log Out?</h3>
      <div class="modal-footer d-block mx-auto ">
      <a type="button" class="btn btn-outline-primary" href="logout.php" >Yes</a>
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>

