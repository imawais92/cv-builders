<?php
$title = "Preview";
include_once('./includes/db.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');

?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php
$id = 1;
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <div class="templete-preview">
        <a href="preview.php? pre=<?= $id; ?>">
          <div class="mt-3 temp position-relative">
            <img class="w-100" src="./image/cv-image.png" alt="">
            <h2 class="position-absolute">SELECT</h2>
          </div>
        </a>

        <a href="#">
          <div class="mt-3 temp position-relative">
            <img class="w-100" src="./image/cv-image-2.png" alt="">
            <h2 class="position-absolute">SELECT</h2>
          </div>
        </a>

      </div>
    </div>
    <div class="col-md-10">
      <div class="view-sec ">
        <embed style="width: 100%; height: 88vh;" src="preview.php" type="application/pdf">
      </div>
    </div>
  </div>
</div>


<?php
include_once('./includes/end_links.php');

?>