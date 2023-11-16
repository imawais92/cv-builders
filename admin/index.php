<?php
$title = "Add";
include('../includes/header.php');
include('../includes/db.php');
if ($_SESSION['loginadmin']) {
} else {
  header("Location: login.php");
}



if (isset($_POST['submit'])) {
  $templete_name = $_POST['templete_name'];

  $templete_img = $_FILES['templete_img']['name'];
  $temp_image = $_FILES['templete_img']['tmp_name'];
  $target_dir = "../templates/tem-img/";
  $targetf = $target_dir . basename($templete_img);
  if (move_uploaded_file($temp_image, $targetf)) {
  }


  $templete_file = $_FILES['templete_file']['name'];
  $temp_file = $_FILES['templete_file']['tmp_name'];
  $target_dir = "../templates/";

  $target_file = $target_dir . basename($templete_file);
  if (move_uploaded_file($temp_file, $target_file)) {
  }


  $sql = "INSERT INTO `templetes` ( `templete_name`, `templete_img`, `templete_file`) VALUES ( '$templete_name', '$templete_img', '$templete_file')";
  $result = mysqli_query($conn, $sql);
}

$sql_cv = "SELECT * FROM `templetes`";
$result_cv = mysqli_query($conn, $sql_cv);


?>


<nav class="navbar navbar-expand-lg shadow-sm ">
  <div class="container-fluid">
    <div class="logo">
      <a href="#"><img style="width:150px ;" src="../image/Cv-Builder-Logo.svg" alt="dsf"></a>
    </div>

  </div>
  </div>
  </div>
</nav>

<div class="container mt-5 bg-white rounded shadow-sm pt-5 pb-5">
  <div class="add-templete-form">
    <div class="">
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-4">
              <label class="form-label" for=""><b>Templete Name</b></label>
              <input name="templete_name" class=" form-control" type="text">
            </div>
            <div class="col-md-4">
              <label class="form-label" for=""><b>Templete image</b></label>
              <input name="templete_img" class=" form-control" type="file">
            </div>
            <div class="col-md-4">
              <label class="form-label" for=""><b>Templete code</b></label>
              <input name="templete_file" class=" form-control" type="file">
            </div>
            <div> <button class="btn btn-danger float-end mt-4 " type="submit" name="submit">ADD Templete</button></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <div class="row my-5">
    <div class="col-12 mt-5">

      <table class="table bg-white rounded shadow-sm  table-hover text-center">
        <thead>
          <tr>
            <th scope="col" width="50">#</th>
            <th scope="col">Templete Name </th>
            <th scope="col">Templte Image</th>
            <th scope="col">Templte File</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $id =  1;
          while ($cv_tem = mysqli_fetch_assoc($result_cv)) {
            $id = $id++;

          ?>
            <tr>
              <th scope="row"><?= $id++ ?></th>
              <td><?= $cv_tem['templete_name'] ?></td>
              <td> <img style="height: 70px;" src="../templates/tem-img/<?= $cv_tem['templete_img'] ?>" alt="tem_img"></td>
              <td><?= $cv_tem['templete_file'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>



<?php
include('../includes/end_links.php');
?>