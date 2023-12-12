<?php
$title = "Information";
include("./includes/db.php");

if (@!$_SESSION['user_id']) {
  header("location: index.php");
}


$userid =  $_SESSION['user_id'];
if (isset($_POST['submit'])) {
  $fname = $conn->real_escape_string($_POST['fname']);
  $lname = $conn->real_escape_string($_POST['lname']);
  $father_name = $conn->real_escape_string($_POST['father_name']);
  $gender = $conn->real_escape_string($_POST['gender']);
  $dob = $conn->real_escape_string($_POST['dob']);
  $profession = $conn->real_escape_string($_POST['profession']);
  $website = $conn->real_escape_string($_POST['website']);
  $personal_no = $conn->real_escape_string($_POST['personal_no']);
  $tel_no = $conn->real_escape_string($_POST['tel_no']);
  $email = $conn->real_escape_string($_POST['email']);
  $country = $conn->real_escape_string($_POST['country']);
  $city = $conn->real_escape_string($_POST['city']);
  $about_us = $conn->real_escape_string($_POST['about_us']);
  $img = $_FILES['imgupload']['name'];
  if (!empty($_REQUEST['upd_id'])) {
    $upd_id = $_REQUEST['upd_id'];
    $tmp_image = $_FILES['imgupload']['tmp_name'];
    $target_dir = "uploads/images/";
    $target_file = $target_dir . basename($img);
    if (move_uploaded_file($tmp_image, $target_file)) {
      $sql = "UPDATE `per_info` SET `fname`='$fname',`lname`='$lname',`father_name`='$father_name',`gender`='$gender',`profession`='$profession',`dob`='$dob',`website`='$website',`per_no`= '$personal_no',`tel_no`='$tel_no',`email`='$email' ,`user_img`='$img', `country`='$country',`city`='$city',`about_us`='$about_us' WHERE user_id =  $upd_id";
    } else {
      $sql = "UPDATE `per_info` SET `fname`='$fname',`lname`='$lname',`father_name`='$father_name',`gender`='$gender',`profession`='$profession',`dob`='$dob',`website`='$website',`per_no`= '$personal_no',`tel_no`='$tel_no',`email`='$email' , `country`='$country',`city`='$city',`about_us`='$about_us' WHERE user_id =  $upd_id";
    }
  } else {
    $tmp_image = $_FILES['imgupload']['tmp_name'];
    $target_dir = "uploads/images/";
    $target_file = $target_dir . basename($img);
    if (move_uploaded_file($tmp_image, $target_file)) {
    }
    $sql = "INSERT INTO `per_info`(`user_id`, `fname`, `lname`, `father_name`, `gender`, `profession`, `dob`, `website`, `per_no`, `tel_no`, `email`, `user_img`, `country`, `city`, `about_us`) VALUES ('" . $_SESSION['user_id'] . "', '$fname', '$lname', '$father_name', '$gender', '$profession', '$dob', '$website', '$personal_no', '$tel_no', '$email', '$img', '$country', '$city', '$about_us')";
    echo $sql;
  }
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header("location: edu_skill.php");
  }
}

$checkdata = mysqli_query($conn, "SELECT * FROM per_info WHERE user_id = '" . $_SESSION['user_id'] . "' ");
if (mysqli_num_rows($checkdata) == 1) {
  $per_det = mysqli_fetch_assoc($checkdata);
  $buttontext = "Update";
  $db_img = "<label for='files'><i class='bx bxs-user'></i><span id='imagePreview'></span> <img id='upd_img' style='width: 150px; height:150px; border-radius: 50%;' src='./uploads/images/" . $per_det['user_img'] . "'></label>";
} else {
  $buttontext = "Save";
  $db_img = "<label  for='files'><i class='bx bxs-user'></i><span id='imagePreview'></span></label>";
}

include("./includes/header.php");
include("./includes/navbar.php");
?>
<style>
  body {
    background-color: white;
  }
</style>
<!-- ====================contact-page-progrss-bar-start==================== -->
<div class="container-fluid ">
  <div class="progres-bar">
    <div class="progress-sec mt-4 ">
      <div class="progressbarss">
        <a style="color: black;" href="./personal_info.php">
          <p class="text-dark"><span style="color:white;     background:#C21010;">1</span> <bdo class="form_progress_txt">Persanal Information</bdo></p>
        </a>
        <a href="./edu_skill.php">
          <p><span>2</span> <bdo class="form_progress_txt">Education/Skill</bdo> </p>
        </a>
        <a href="./work-exp.php">
          <p><span>3</span> <bdo class="form_progress_txt">Working Experience</bdo></p>
        </a>
        <a href="./hob_lan_ref.php">
          <p><span>4</span> <bdo class="form_progress_txt">Languages/Reference </bdo></p>
        </a>
        
      </div>
    </div>
  </div>
</div>
<!-- ====================contact-page-progrss-bar-End==================== -->
<!-- ============= personal-information-Form-Start============= -->
<form action="#" method="post" enctype="multipart/form-data">
  <input type="hidden" name="upd_id" value="<?= @$per_det['user_id'] ?>">
  <div class="container">
    <div class="row">
      <!-- ============ ==form-start============== -->
      <div class="col-lg-7">


        <div class="personal-info-form py-3 mt-5" style=" box-shadow:0px 0px 15px 10px #E0E0E0; border-radius:20px;">
          <div style="display:flex;  align-items: center; justify-content: space-between;">
            <div class="my-3 position-relative">
              <h5 class="headinf"><?=  $translations['per_info']?></h5>
            </div>

          </div>
          <!-- ================user-info-form-Start================== -->

          <div class="form-info">

            <div class="container">
              <div class="row">
                <!-- =============================================withimage-form================================== -->

                <!-- ============First Name============ -->
                <div class="row" id="withimag">
                  <div class="row">
                    <div class="col-lg-9 col-md-8 col-7 ">
                      <div class="input-field ">
                        <label><?=  $translations['per_name1']?></label>
                        <input id="fnamev" name="fname" class="w-100" type="text" value="<?= @$per_det['fname'] ?>">
                        <!-- ============Last Name============ -->
                        <div class="input-field">
                          <label><?=  $translations['per_name2']?></label>
                          <input id="lnamev" name="lname" class="w-100" type="text" value="<?= @$per_det['lname'] ?>">
                        </div>
                      </div>
                    </div>
                    <!-- ============image============ -->
                    <div class="col-lg-3 col-md-4 col-5">
                      <div class="input-field mt-5">
                        <div class="image_input">
                          <?php
                          echo "$db_img";
                          ?>
                          <input name="imgupload" id="files" style="visibility:hidden;" type="file" accept=".png , .jpg , .jpeg">
                          <p id="imagetxt" style="color: #C21010; font-weight:600; position:absolute; top:140px; ">Select Image</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ============Father Name============ -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label><?=  $translations['per_name3']?></label>
                    <input name="father_name" type="text" required value="<?= @$per_det['father_name'] ?>">
                  </div>
                </div>
                <!-- ===============Gender=================== -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label>Gender</label>
                    <select name="gender" class="form-select gender-option">
                      <option <?= (@$per_det['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                      <option <?= (@$per_det['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                      <option <?= (@$per_det['gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
                    </select>
                  </div>
                </div>

                <!-- ============DOB============ -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label><?=  $translations['per_name5']?></label>
                    <input name="dob" type="date" required value="<?= @$per_det['dob'] ?>">
                  </div>
                </div>
                <!-- ============Professional============ -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label><?=  $translations['per_name6']?></label>
                    <input name="profession" type="text" required value="<?= @$per_det['profession'] ?>">
                  </div>
                </div>
                <!-- ============Website============ -->
                <div class="col-md-12">
                  <div class="input-field">
                    <label><?=  $translations['per_name7']?></label>
                    <input name="website" class="email_width" type=" email" value="<?= @$per_det['website'] ?>">
                  </div>
                </div>
                <!-- ============Contact no============ -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label><?=  $translations['per_name8']?></label>
                    <input name="personal_no" type="number" required value="<?= @$per_det['per_no'] ?>">
                  </div>
                </div>
                <!-- ============Telephone No============ -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label><?=  $translations['per_name9']?></label>
                    <input name="tel_no" type="number" value="<?= @$per_det['tel_no'] ?>">
                  </div>
                </div>
                <!-- ============Email============ -->
                <div class="col-md-12">
                  <div class="input-field">
                    <label><?=  $translations['per_name10']?></label>
                    <input name="email" class="email_width" type=" email" required value="<?= @$per_det['email'] ?>">
                  </div>
                </div>
                <!-- ============Country============ -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label><?=  $translations['per_name11']?></label>
                    <select class="country form-control " name="country" id="country" value="<?= @$per_det['country'] ?>">
                      <?php
                      include_once('others/countrylist.php')
                      ?>
                    </select>
                  </div>
                </div>
                <!-- ============Contact no============ -->
                <div class="col-md-6">
                  <div class="input-field">
                    <label><?=  $translations['per_name12']?></label>
                    <input name="city" type="text" required value="<?= @$per_det['city'] ?>">
                  </div>
                </div>
                <!-- ============about us ============ -->
                <div class="col-md-12">
                  <div class="input-field">
                    <label><?=  $translations['per_name13']?></label>
                    <textarea maxlength="180" name="about_us" class="email_width form-control" rows="4"><?= @$per_det['about_us'] ?> </textarea>
                    <div class="form-text about-us-txt"><?=  $translations['per_name14']?></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ============Save and Next============ -->
            <div class="form-buttons mt-4 d-flex justify-content-end me-4 ">
              <a href="./edu_skill.php"><button type="submit" name="submit" class="btn   "><?= $buttontext ?></button></a>
            </div>
          </div>
        </div>
      </div>
</form>
<!-- ================user-info-form-End==================== -->
<!-- ==============form-End================ -->

<!-- ==============form-tips-sec-start============== -->
<div class="col-lg-5 mt-4 mt-lg-0 " style=" box-shadow:0px 0px 20px 10px #E0E0E0; border-radius:20px; margin-top:46px !important ;">
  <div class="Form-tip-sec">
    <h3>TIPS</h3>
    <div class="text mt-2">
      <ul>
        <li><?=  $translations['per_name15']?></li>
        <li><?=  $translations['per_name16']?></li>
        <li><?=  $translations['per_name17']?></li>
        <li><?=  $translations['per_name18']?></li>
        <li><?=  $translations['per_name19']?></li>
      </ul>
    </div>
  </div>
</div>
<!-- ==============form-tips-sec-End============== -->
</div>
</div>


<!-- ============= personal-information-Form-End============== -->

<!-- ================ Footer-Start ======================= -->

<footer class="text-center text-lg-start text-white " style="background-color: black; margin-top:4rem">
  <section style="background-color: #C21010">
    <div class=" d-flex justify-content-between pe-3  ps-3">
      <div class="social-icon-heading">
        <p>Our social media handles:</p>
      </div>
      <div class="icons pt-1">
        <a href="#"><i class='bx bxl-facebook'></i></a>
        <a href="#"><i class='bx bxl-instagram'></i></a>
        <a href="#"><i class='bx bxl-twitter'></i></a>
        <a href="#"><i class='bx bxl-google'></i></a>
      </div>
    </div>
  </section>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 Copyright:The Product By
    <a class="text-white" href="https://thewebconcept.com/">thewebconcept.com</a>
  </div>
</footer>
<!-- ================ Footer-End ======================= -->




<script>
  const imageUpload = document.getElementById('files');
  const imagePreview = document.getElementById('imagePreview');
  const imagetxt = document.getElementById('imagetxt');
  imageUpload.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const image = document.createElement('img');
        image.src = e.target.result;
        imagePreview.innerHTML = '';

        imagePreview.appendChild(image);
      };

      reader.readAsDataURL(file);
    }
    imagetxt.style.display = "none"
  });
  let img = document.getElementById('upd_img');
  img.addEventListener('click', () => {
    img.remove()
  })
  if (imageUpload.value == '') {
    imagetxt.style.display = "none"
  }
</script>
<?php
include('./includes/end_links.php');
?>
<script>
  var $disabledResults = $(".country");
  $disabledResults.select2();
</script>