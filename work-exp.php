<?php
$title = "Information";
include('includes/db.php');

if (!$_SESSION['user_id']) {
  header("location: index.php");
}

if (isset($_POST['submit'])) {
  $company_names = $_POST['company_name'];
  $work_roles = $_POST['work_role'];
  $work_st_dates = $_POST['work_st_date'];
  $work_end_dates = $_POST['work_end_date'];
  $work_city_countries = $_POST['work_city_coun'];
  $presents =  $_POST['present'];

  if (!empty($_REQUEST['worexp_id'])) {
    $sql_del = "DELETE FROM `work_exp` WHERE  user_id = '" . $_SESSION['user_id'] . "'";
    $r = mysqli_query($conn, $sql_del);
    if ($r) {
      for ($i = 0; $i < count($company_names); $i++) {
        $company_name = $conn->real_escape_string($company_names[$i]);
        $work_role = $conn->real_escape_string($work_roles[$i]);
        $work_st_date = $conn->real_escape_string($work_st_dates[$i]);
        $work_end_date = $conn->real_escape_string($work_end_dates[$i]);
        $work_city_coun = $conn->real_escape_string($work_city_countries[$i]);
        $present = $conn->real_escape_string($presents[$i]);
        $sql = "INSERT INTO `work_exp` (`user_id` ,`company_name`, `role`, `work_st_data`, `work_end_date`, `city_country` , `present`) VALUES ('" . $_SESSION['user_id'] . "','$company_name', '$work_role', '$work_st_date', '$work_end_date', '$work_city_coun' , '$present')";
        $result = mysqli_query($conn, $sql);
      }
    }
  } else {
    for ($i = 0; $i < count($company_names); $i++) {
      $company_name = $conn->real_escape_string($company_names[$i]);
      $work_role = $conn->real_escape_string($work_roles[$i]);
      $work_st_date = $conn->real_escape_string($work_st_dates[$i]);
      $work_end_date = $conn->real_escape_string($work_end_dates[$i]);
      $work_city_coun = $conn->real_escape_string($work_city_countries[$i]);
      $present = $conn->real_escape_string($presents[$i]);
      $sql = "INSERT INTO `work_exp` (`user_id` ,`company_name`, `role`, `work_st_data`, `work_end_date`, `city_country` , `present`) VALUES ('" . $_SESSION['user_id'] . "','$company_name', '$work_role', '$work_st_date', '$work_end_date', '$work_city_coun' , '$present')";
      $result = mysqli_query($conn, $sql);
    }
  }
  if ($result) {
    header("location: hob_lan_ref.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

$checkdata = mysqli_query($conn, "SELECT * FROM work_exp WHERE user_id = '" . $_SESSION['user_id'] . "' ");
if (mysqli_num_rows($checkdata)  >=  1) {
  $getdata = true;
  $buttontext = "Update";
} else {
  $buttontext = "Next";
  $getdata = false;
}


if (@$_REQUEST['del']) {
  $del_works = $_REQUEST['del'];
  $sql_del = "DELETE FROM `work_exp` WHERE work_exp_id = $del_works";
  $result = mysqli_query($conn, $sql_del);
  if ($result) {
    header("location: work-exp.php");
  }
}
?>

<?php
include("./includes/header.php");
include("./includes/navbar.php")
?>
<style>
  body {
    background-color: white;
  }
</style>
<!-- ====================contact-page-progrss-bar-start==================== -->
<div class="container-fluid">
  <div class="progres-bar">
    <div class="progress-sec mt-4">
      <div class="progressbarss">
        <a style="color: black;" href="./personal_info.php">
          <p><span style="color:white; border-color:green;     background:green;">1</span> <bdo class="form_progress_txt">Persanal Information</bdo></p>
        </a>
        <a style="color: black;" href="./edu_skill.php">
          <p><span style="color:white; border-color:green;     background:green;">2</span><bdo class="form_progress_txt">Education/Skills</bdo> </p>
        </a>
        <a style="color: black;" href="./work-exp.php">
          <p><span style="color:white;     background:#C21010;">3</span><bdo class="form_progress_txt">Working Experience</bdo> </p>
        </a>
        <a href="./hob_lan_ref.php">
          <p><span>4</span><bdo class="form_progress_txt">Languages/Reference</bdo> </p>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- ====================contact-page-progrss-bar-End==================== -->
<!-- ============= personal-information-Form-Start============= -->
<form action="#" method="post">
  <div class="container">
    <div class="form-bg mt-4" style="margin-bottom: 10rem; ">
      <div class="container">
        <div class="row">

          <div class="col-lg-7 ">
            <div class="personal-info-form ">

              <?php
              if ($getdata == true) {
                $a = 1;
                while (@$work_det = mysqli_fetch_assoc($checkdata)) {
                  $a++;
              ?>
                  <div class="py-3 mt-4" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px; ">
                    <div class="my-3 position-relative">
                      <h5 class="headinf"><?=  $translations['work_heding']?></h5>
                      <a href="work-exp.php?del=<?= $work_det['work_exp_id'] ?>">
                        <h5 class="position-absolute" style="right: 20px; top:-8px; cursor: pointer; color:red"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                      </a>
                    </div>
                    <div class="form-info">

                      <!-- ================user-work-ex-form-Start ====================== -->

                      <div id="add_work">
                        <div class="container">
                          <input type="hidden" name="worexp_id" value="<?= $work_det['work_exp_id'] ?>">
                          <div class="row">
                            <!-- ============Company Name============ -->
                            <div class="col-md-6">
                              <div class="input-field mt-4 ">
                                <label><?=  $translations['workexp_name1']?></label>
                                <input name="company_name[]" id="com_name" type="text" value="<?= $work_det['company_name'] ?>">
                              </div>
                            </div>
                            <!-- ============Role============ -->
                            <div class="col-md-6">

                              <div class="input-field mt-4 ">
                                <label><?=  $translations['workexp_name2']?></label>
                                <input name="work_role[]" id="role" type="text" value="<?= $work_det['role'] ?>">
                              </div>
                            </div>
                            <!-- ============Start-Date============ -->
                            <div class="col-md-6">
                              <div class="input-field mt-4 ">
                                <label>Start Date</label>
                                <input name="work_st_date[]" id="start_date" type="month" value="<?= $work_det['work_st_data'] ?>">
                              </div>
                            </div>
                            <!-- ============End-Date============ -->
                            <div class="col-md-6 ">
                              <div class="input-field mt-4 d-flex position-relative ">
                                <div>
                                  <label>End Date</label>
                                  <input style="width: 100%;" name="work_end_date[]" id="end_date" type="month" value="<?= $work_det['work_end_date'] ?>">
                                </div>
                                <?php
                                if ($work_det['present'] == '1') {
                                  $checked = 'checked';
                                  $val = '1';
                                } else {
                                  $checked = '';
                                  $val = '0';
                                }
                                ?>
                                <div>
                                  <label>Present</label>
                                  <input <?= $checked ?> type="checkbox" style="width: 100%;" id="checkbox<?= $a ?>" onchange="updateInputField(this)">
                                  <input type="hidden" id="inputField<?= $a ?>" name="present[]" value="<?= $work_det['present'] ?>" readonly>
                                </div>
                              </div>
                            </div>
                            <!-- ============City============ -->
                            <div class="col-md-12">

                              <div class="input-field mt-4 ">
                                <label><?=  $translations['workexp_name3']?></label>
                                <textarea maxlength="180" name="work_city_coun[]" class="form-control" id="Feild" rows="4"><?= $work_det['city_country'] ?></textarea>
                                <div class="form-text about-us-txt"><?=  $translations['workexp_name4']?></div>
                              </div>
                            </div>
                            <!-- ============Country============ -->
                          </div>
                        </div>
                      </div>
                      <!-- ================user-work-ex-form-End---====================== -->

                    </div>
                  </div>
                <?php
                }
              } else {
                ?>
                <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px; ">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">Working Experience</h5>
                  </div>
                  <div class="form-info">

                    <!-- ================user-work-ex-form-Start ====================== -->

                    <div id="add_work">
                      <div class="container">
                        <input type="hidden" name="worexp_id">
                        <div class="row">
                          <!-- ============Company Name============ -->
                          <div class="col-md-6">
                            <div class="input-field mt-4 ">
                              <label><?=  $translations['workexp_name1']?></label>
                              <input name="company_name[]" id="com_name" type="text">
                            </div>
                          </div>
                          <!-- ============Role============ -->
                          <div class="col-md-6">

                            <div class="input-field mt-4 ">
                              <label><?=  $translations['workexp_name2']?> </label>
                              <input name="work_role[]" id="role" type="text">
                            </div>
                          </div>
                          <!-- ============Start-Date============ -->
                          <div class="col-md-6">
                            <div class="input-field mt-4 ">
                              <label><?=  $translations['workexp_name9']?></label>
                              <input name="work_st_date[]" id="start_date" type="month">
                            </div>
                          </div>
                          <!-- ============End-Date============ -->
                          <div class="col-md-6 ">
                            <div class="input-field mt-4 d-flex position-relative ">
                              <div>
                                <label><?=  $translations['workexp_name10']?></label>
                                <input style="width: 100%;" name="work_end_date[]" id="end_date" type="month">
                              </div>
                              <div>
                                <label><?=  $translations['edu_name7']?></label>
                                <input type="checkbox" style="width: 100%;" id="checkbox2" onchange="updateInputField(this)">
                                <input type="hidden" id="inputField2" name="present[]" value="0" readonly>
                              </div>

                            </div>
                          </div>
                          <!-- ============City============ -->
                          <div class="col-md-12">

                            <div class="input-field mt-4 ">
                              <label><?=  $translations['workexp_name3']?></label>
                              <textarea maxlength="180" name="work_city_coun[]" class="form-control" id="Feild" rows="4"></textarea>
                              <div class="form-text about-us-txt"><?=  $translations['workexp_name4']?></div>
                            </div>
                          </div>
                          <!-- ============Country============ -->
                        </div>
                      </div>
                    </div>
                    <!-- ================user-work-ex-form-End---====================== -->

                  </div>
                </div>

              <?php

              }
              ?>
              <!-- =====virtual data====== -->

              <div id="work_exp_sec">
              </div>

              <!-- =====virtual data====== -->
              <div class="form-buttons">
                <button id="add_word_btn" style="padding:8px 12px; border-radius:40px;" class="btn btn-danger  float-end mt-4  me-2" type="button"> <i class="fa-solid fa-plus"></i> Add work Experience</button>
              </div>


              <script>
                function remove_workexp(e) {
                  var sec_remove = document.querySelector(e);
                  if (sec_remove) {
                    sec_remove.remove();
                  }

                }

                let addsec = document.getElementById('work_exp_sec');
                let adbtn = document.getElementById('add_word_btn')
                adbtn.addEventListener('click', () => {
                  var wid = Math.floor(Math.random() * 999 + 1)

                  let newel = document.createElement('div');
                  newel.classList.add('col-12');
                  newel.id = 'workid_' + wid;
                  newel.innerHTML = `<div class="py-3 mt-4" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px; ">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">Working Experience</h5>
                    <h5 onclick="remove_workexp('#workid_${wid}')" class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                  </div>
                  <div class="form-info">
                    <div id="add_work">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="input-field mt-4 ">
                            <label>Company Name</label>
                              <input name="company_name[]" id="com_name" type="text">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-field mt-4 ">
                            <label>Role </label>
                              <input name="work_role[]" id="role" type="text">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-field mt-4 ">
                            <label>Start Date</label>
                              <input name="work_st_date[]" id="start_date" type="month">
                            </div>
                          </div>
                          <div class="col-md-6 ">
                                <div class="input-field mt-4 d-flex position-relative ">
                                <div>
                                <label>End Date</label>
                                <input style="width: 100%;" name="work_end_date[]" id="end_date" type="month">
                                </div>
                                <div>
                                <label>Present</label>
                                <input type="checkbox" style="width: 100%;" id="checkbox${wid}" onchange="updateInputField(this)">
                                <input type="hidden" id="inputField${wid}" name="present[]" value="0" readonly>
                              </div>
                                </div>
                              </div>
                          <div class="col-md-12">
                            <div class="input-field mt-4 ">
                            <label>Working Details</label>
                              <textarea maxlength="180" name="work_city_coun[]" class="form-control" id="Feild" rows="4"></textarea>
                                  <div class="form-text about-us-txt">Enter yout work details in less than <b>180</b> Letters</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>`;

                  addsec.append(newel);

                })
              </script>
              <div class="form-buttons mb-5 " style="margin-top: 100px;">

                <a href="./edu_skill.php"> <button type="button" class="btn btn-danger  save-btn  add-det-btn"> Previous</button></a>
                <button name="submit" type="submit" class="btn btn-danger float-end save-btn  add-det-btn"> <?= $buttontext ?></button>
              </div>
            </div>
          </div>


          <!-- ==============form-tips-sec-start============== -->
          <div class="col-lg-5 mt-4" style=" box-shadow:5px 0px 20px 10px #E0E0E0; border-radius:20px;">
            <div class="Form-tip-sec">
              <h3>TIPS</h3>
              <div class="text mt-2">
                <ul>
                 <li><?=  $translations['workexp_name6']?></li>
                 <li><?=  $translations['workexp_name7']?></li>
                 <li><?=  $translations['workexp_name8']?></li>
                </ul>
              </div>
            </div>
          </div>
          <!-- ==============form-tips-sec-End============== -->
        </div>
      </div>
    </div>
  </div>




  <!-- ============= personal-information-Form-End============== -->
</form>
<!-- ================ Footer-Start ======================= -->

<footer class="text-center text-lg-start text-white " style="background-color: black; margin-top:8rem">
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
  function updateInputField(checkbox) {
    // Get the corresponding input field
    var inputFieldId = checkbox.id.replace("checkbox", "inputField");
    var inputField = document.getElementById(inputFieldId);

    // Update the input field value based on checkbox state
    if (checkbox.checked) {
      inputField.value = "1";
    } else {
      inputField.value = "0";
    }
  }
</script>
<?php
include('includes/end_links.php');
?>