<?php
$title = "Information";
include('includes/db.php');
if (isset($_POST['submit'])) {
  $company_names = $_POST['company_name'];
  $work_roles = $_POST['work_role'];
  $work_st_dates = $_POST['work_st_date'];
  $work_end_dates = $_POST['work_end_date'];
  $work_city_countries = $_POST['work_city_coun'];
  // $presents =  $_POST['present'];

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
        $present = isset($_POST['present'][$i]) ? 1 : 0;
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
      $present = isset($_POST['present'][$i]) ? 1 : 0;
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
include("includes/header.php");
include("./includes/navbar.php")
?>
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

<body style="background-color: white;">
  <!-- ============= personal-information-Form-Start============= -->
  <form action="#" method="post">
    <div class="container">
      <div class="form-bg mt-5" style="margin-bottom: 10rem; ">
        <div class="container">
          <div class="row">

            <div class="col-lg-7 ">
              <div class="personal-info-form ">

                <?php
                if ($getdata == true) {
                  while (@$work_det = mysqli_fetch_assoc($checkdata)) {
                ?>
                    <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px; ">
                      <div class="my-3 position-relative">
                        <h3 class="headinf">Working Experience</h3>
                        <a href="work-exp.php?del=<?= $work_det['work_exp_id'] ?>">
                          <h4 class="position-absolute" style="right: 20px; top:-10px; cursor: pointer; color:red"><i class="fa-solid fa-x"></i></h4>
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
                                <div class="input-field mt-5 ">
                                  <input name="company_name[]" id="com_name" type="text" value="<?= $work_det['company_name'] ?>">
                                  <label>Company Name</label>
                                </div>
                              </div>
                              <!-- ============Role============ -->
                              <div class="col-md-6">

                                <div class="input-field mt-5 ">
                                  <input name="work_role[]" id="role" type="text" value="<?= $work_det['role'] ?>">
                                  <label>Role </label>
                                </div>
                              </div>
                              <!-- ============Start-Date============ -->
                              <div class="col-md-6">
                                <div class="input-field mt-5 ">
                                  <input name="work_st_date[]" id="start_date" type="date" value="<?= $work_det['work_st_data'] ?>">
                                  <label class="date-lable">Start Date</label>
                                </div>
                              </div>
                              <!-- ============End-Date============ -->
                              <div class="col-md-6 ">
                                <div class="input-field mt-5 d-flex position-relative ">
                                  <input id="datainput" style="width: 80%;" name="work_end_date[]" id="end_date" type="date">
                                  <label class="date-lable" style="left:79%">Present</label>
                                  <input id="checkbox" type="checkbox" name="present[]" style="width: 20%;" value="">
                                  <label class="date-lable">End Date</label>
                                </div>
                              </div>
                              <!-- ============City============ -->
                              <div class="col-md-12">

                                <div class="input-field mt-5 ">
                                  <textarea maxlength="180" name="work_city_coun[]" class="form-control" id="Feild" rows="4"><?= $work_det['city_country'] ?></textarea>
                                  <label>Working Details</label>
                                  <div class="form-text about-us-txt">Enter yout work details in less than <b>180</b> Letters</div>
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
                      <h3 class="headinf">Working Experience</h3>
                    </div>
                    <div class="form-info">

                      <!-- ================user-work-ex-form-Start ====================== -->

                      <div id="add_work">
                        <div class="container">
                          <input type="hidden" name="worexp_id">
                          <div class="row">
                            <!-- ============Company Name============ -->
                            <div class="col-md-6">
                              <div class="input-field mt-5 ">
                                <input name="company_name[]" id="com_name" type="text">
                                <label>Company Name</label>
                              </div>
                            </div>
                            <!-- ============Role============ -->
                            <div class="col-md-6">

                              <div class="input-field mt-5 ">
                                <input name="work_role[]" id="role" type="text">
                                <label>Role </label>
                              </div>
                            </div>
                            <!-- ============Start-Date============ -->
                            <div class="col-md-6">
                              <div class="input-field mt-5 ">
                                <input name="work_st_date[]" id="start_date" type="date">
                                <label class="date-lable">Start Date</label>
                              </div>
                            </div>
                            <!-- ============End-Date============ -->
                            <div class="col-md-6 ">
                              <div class="input-field mt-5 d-flex position-relative ">
                                <input id="datainput" style="width: 80%;" name="work_end_date[]" id="end_date" type="date">
                                <label class="date-lable" style="left:79%">Present</label>
                                <input id="checkbox" type="checkbox" name="present[]" style="width: 20%;">
                                <label class="date-lable">End Date</label>
                              </div>
                            </div>
                            <!-- ============City============ -->
                            <div class="col-md-12">

                              <div class="input-field mt-5 ">
                                <textarea maxlength="180" name="work_city_coun[]" class="form-control" id="Feild" rows="4"></textarea>
                                <label>Working Details</label>
                                <div class="form-text about-us-txt">Enter yout work details in less than <b>180</b> Letters</div>
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
                    newel.innerHTML = `<div class="py-3 mt-5" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px; ">
                  <div class="my-3 position-relative">
                    <h3 class="headinf">Working Experience</h3>
                    <h4 onclick="remove_workexp('#workid_${wid}')" class="position-absolute" style="right: 20px; top:-10px; cursor: pointer;"><i class="fa-solid fa-x"></i></h4>
                  </div>
                  <div class="form-info">
                    <div id="add_work">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="input-field mt-5 ">
                              <input name="company_name[]" id="com_name" type="text">
                              <label>Company Name</label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-field mt-5 ">
                              <input name="work_role[]" id="role" type="text">
                              <label>Role </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="input-field mt-5 ">
                              <input name="work_st_date[]" id="start_date" type="date">
                              <label class="date-lable">Start Date</label>
                            </div>
                          </div>
                          <div class="col-md-6 ">
                                <div class="input-field mt-5 d-flex position-relative ">
                                  <input id="datainput" style="width: 80%;" name="work_end_date[]" id="end_date" type="date">
                                  <label class="date-lable" style="left:79%">Present</label>
                                  <input id="checkbox" type="checkbox" name="present[]" style="width: 20%;" value="">
                                  <label class="date-lable">End Date</label>
                                </div>
                              </div>
                          <div class="col-md-12">
                            <div class="input-field mt-5 ">
                              <textarea maxlength="180" name="work_city_coun[]" class="form-control" id="Feild" rows="4"></textarea>
                              <label>Working Details</label>
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
            <div class="col-lg-5" style=" box-shadow:5px 0px 20px 10px #E0E0E0; border-radius:20px;">
              <div class="Form-tip-sec">
                <h3>TIPS</h3>
                <div class="text mt-2">
                  <ul>
                    <li>Be Honest: Provide accurate and truthful information about your work experience. Avoid exaggeration or misrepresentation as it can be detrimental to your professional reputation.</li>
                    <li>Use Keywords: Incorporate industry-specific keywords and phrases throughout your work experience section to align your resume with the job description and optimize it for applicant tracking systems (ATS).</li>
                    <li>Reverse Chronological Order: Start with your most recent or current position and work backward chronologically. This format is the most common and helps employers quickly see your recent experience.</li>
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
          <p>Get connected with us on social networks:</p>
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



  <?php
  include('includes/end_links.php');
  ?>