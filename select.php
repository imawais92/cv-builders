<?php
$title = "Preview";
include_once('./includes/db.php');
include_once('./includes/header.php');
include_once('./includes/navbar.php');
$res = mysqli_query($conn, "SELECT * FROM `templetes`");
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container-fluid">
  <div class="row flex-wrap-reverse">
    <div class="col-md-2">
      <div class="templete-preview">
        <?php
        $a = 0;
        while ($row = mysqli_fetch_assoc($res)) :
          $a++;
        ?>
          <a href="preview.php? pre=<?= $a ?>">
            <div class="mt-3 temp position-relative">
              <img class="w-100" src="./templates/tem-img/<?= $row['templete_img'] ?>" alt="templates">
              <h2 class="position-absolute">SELECT</h2>
            </div>
          </a>
        <?php
        endwhile;
        ?>

      </div>
    </div>
    <div class="col-md-10">
      <div class="view-sec ">
        <!-- <embed style="width: 100%; height: 88vh;" src="preview.php" type="application/pdf"> -->
        <iframe style="width: 100%; height: 88vh;" src="preview.php" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>


<?php
include_once('./includes/end_links.php');

?>