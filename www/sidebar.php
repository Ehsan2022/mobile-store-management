<?php
    include("dbConn.php");
    if(!$Conn){
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM user";
    $result = mysqli_query($Conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      if ($_SESSION["userID"] == $row['id']) {
        echo "<br><br><br>";
        echo $user_status = $row['status'];
      }
    }

    if($user_status == "active"){
      $visible=null;
    } 
    else{
      $visible="hidden";
    }
?>
<aside id="sidebar" class="sidebar ">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item ">
        <a class="nav-link sideLink" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
      <a class="nav-link "  href="add_mobile_brand.php">
      <i class="bi bi-phone"></i><span>Mobile Brands</span>
        </a>
      </li><!-- End Tables Nav -->
      <li class="nav-item">
      <a class="nav-link "  href="add_mobile.php">
      <i class="bi bi-phone"></i><span>Mobiles</span>
        </a>
      </li><!-- End Tables Nav -->

      <li class="nav-item" <?php echo $visible ?> >
      <a class="nav-link "  href="add_user.php" >
      <i class="bi bi-person"></i><span>Add User</span>
        </a>
      </li><!-- End Tables Nav -->

      </li><!-- End Tables Nav -->
      <li class="nav-item" <?php echo $visible ?> >
      <a class="nav-link "  href="list_of_users.php">
      <i class="bi bi-people"></i><span>List of Users</span>
        </a>
      </li><!-- End Tables Nav -->
 
      <li class="nav-item " title="Click To Log Out">
        <a href="" id="logOut"  class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-current="page">
          <i  class="bi bi-box-arrow-right text-danger"></i>
          <span>Log Out</span>
        </a>
      </li>
     
    </ul>

  </aside>

          <!-- log out Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog   modal-dialog-centered">
    <div class="modal-content bg-dark p-5">
      <h3 class="text-white text-center">Do you want to Log Out?</h3>
      <div class="modal-footer d-block mx-auto ">
      <a type="button" class="btn btn-outline-primary" href="logout.php" >Yes</a>
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>