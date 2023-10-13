<?php
$title = "Information";
include("includes/db.php");
if (isset($_POST['submit'])) {
  $institute_names = $_POST['institute_name'];
  $degrees = $_POST['degree'];
  $total_marks = $_POST['total_marks'];
  $ob_marks = $_POST['ob_marks'];
  $edu_st_dates = $_POST['edu_st_date'];
  $edu_end_dates = $_POST['edu_end_date'];
  $edu_fields = $_POST['edu_field'];
  $skills = $_POST['skill'];
  $skill_ranges = $_POST['skill_range'];
  if (!empty($_REQUEST['edu_id'])) {
    $sql_del = "DELETE FROM `education` WHERE  user_id = '" . $_SESSION['user_id'] . "'";
    $r = mysqli_query($conn, $sql_del);
    if ($r) {
      for ($a = 0; $a < count($institute_names); $a++) {
        $institute_name = $institute_names[$a];
        $degree = $degrees[$a];
        $total_mark = $total_marks[$a];
        $ob_mark = $ob_marks[$a];
        $edu_st_date = $edu_st_dates[$a];
        $edu_end_date = $edu_end_dates[$a];
        $edu_field = $edu_fields[$a];;
        $sql = "INSERT INTO `education`(`user_id`,`instutute_name`, `dagree`, `total_marks`, `obtain_marks`,  `deg_st_date`, `deg_end_date`, `field`) VALUES ('" . $_SESSION['user_id'] . "', '$institute_name','$degree','$total_mark','$ob_mark','$edu_st_date','$edu_end_date','$edu_field')";
        $result = mysqli_query($conn, $sql);
      }
    }
  } else {
    for ($a = 0; $a < count($institute_names); $a++) {
      $institute_name = $institute_names[$a];
      $degree = $degrees[$a];
      $total_mark = $total_marks[$a];
      $ob_mark = $ob_marks[$a];
      $edu_st_date = $edu_st_dates[$a];
      $edu_end_date = $edu_end_dates[$a];
      $edu_field = $edu_fields[$a];;
      $sql = "INSERT INTO `education`(`user_id`,`instutute_name`, `dagree`, `total_marks`, `obtain_marks`,  `deg_st_date`, `deg_end_date`, `field`) VALUES ('" . $_SESSION['user_id'] . "', '$institute_name','$degree','$total_mark','$ob_mark','$edu_st_date','$edu_end_date','$edu_field')";
      $result = mysqli_query($conn, $sql);
    }

    if ($result) {
      header('location: work-exp.php');
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }

  if (!empty($_REQUEST['sk_id'])) {
    $sql_de = "DELETE FROM `skills` WHERE  user_id = '" . $_SESSION['user_id'] . "'";
    $res = mysqli_query($conn, $sql_de);
    for ($i = 0; $i < count($skills); $i++) {
      $skill = $skills[$i];
      $skill_range = $skill_ranges[$i];


      $sql1 = "INSERT INTO `skills` (`user_id`, `skill`, `skill_per`) VALUES ('" . $_SESSION['user_id'] . "','$skill', '$skill_range')";
      $result1 = mysqli_query($conn, $sql1);
    }
  } else {
    for ($i = 0; $i < count($skills); $i++) {
      $skill = $skills[$i];
      $skill_range = $skill_ranges[$i];


      $sql1 = "INSERT INTO `skills` (`user_id`, `skill`, `skill_per`) VALUES ('" . $_SESSION['user_id'] . "','$skill', '$skill_range')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
}

  
$checkedu = mysqli_query($conn, "SELECT * FROM education WHERE user_id = '" . $_SESSION['user_id'] . "' ");
$checkskill = mysqli_query($conn, "SELECT * FROM skills WHERE user_id = '" . $_SESSION['user_id'] . "' ");
if (mysqli_num_rows($checkedu) or mysqli_num_rows($checkskill)  >=  1) {
  $getdata = true;
  $buttontext = "Update";
} else {
  $buttontext = "Next";
  $getdata = false;
}

if (@$_REQUEST['del']) {
  $del_id  = $_REQUEST['del'];
  $re = mysqli_query($conn, "DELETE FROM `education` WHERE  edu_id =  $del_id");
  if ($re) {
    header('location:edu_skill.php ');
  }
}

if (@$_REQUEST['delete']) {
  $del_id  = $_REQUEST['delete'];
  $re = mysqli_query($conn, "DELETE FROM `skills` WHERE  skill_id =  $del_id");
  if ($re) {
    header('location:edu_skill.php ');
  }
}

?>

<?php
include("./includes/header.php");
include("./includes/navbar.php");
?>

<body style="background-color: white;">
  <div class="container-fluid">
    <div class="progres-bar">
      <div class="progress-sec mt-4">
        <div class="progressbarss">
          <a style="color: black;" href="./personal_info.php">
            <p><span style="color:white; border-color:green;     background:green;">1</span> <bdo class="form_progress_txt">Persanal Information</bdo></p>
          </a>
          <a style="color: black;" href="./edu_skill.php">
            <p><span style="color:white;     background:#C21010;">2</span> <bdo class="form_progress_txt">Education/Skills</bdo></p>
          </a>

          <a href="./work-exp.php">
            <p><span>3</span><bdo class="form_progress_txt">Working Experience</bdo> </p>
          </a>
          <a href="./hob_lan_ref.php">
            <p><span>4</span><bdo class="form_progress_txt">Languages/Reference </bdo></p>
          </a>

        </div>
      </div>
    </div>
  </div>
  <form action="#" method="post">
    <div class="container">
      <div class="form-bg mt-4">
        <div class="container">

          <div class="row">
            <!-- ==============form-start============== -->
            <div class="col-lg-7">

              <div class="personal-info-form pb-4">
                <div class="form-info">
                  <?php
                  if ($getdata == true) {
                    while ($dta = mysqli_fetch_assoc($checkedu)) {
                  ?>
                      <!-- ================user-Education-form-Start==================== -->
                      <div class=" py-2 mt-3" id="addeduction" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                        <div class="my-3 position-relative">
                          <h3 class="headinf">Education</h3>
                          <a href="edu_skill.php?del=<?= $dta['edu_id'] ?>">
                            <h4 class="position-absolute" style="right: 20px; top:-10px; cursor: pointer; color:red"><i class="fa-solid fa-x"></i></h4>
                          </a>
                        </div>
                        <div class="container">
                          <input type="hidden" name="edu_id" value="<?= $dta['edu_id'] ?>">
                          <div class="row">
                            <!-- ============institue Name============ -->
                            <div class="col-md-6">
                              <div class="input-field ">
                                <input class="rem_value hide" name="institute_name[]" id="Institute" type="text" value="<?= $dta['instutute_name'] ?>">
                                <label>Institute Name</label>
                              </div>
                            </div>
                            <!-- ============Dagree Name============ -->
                            <div class="col-md-6">

                              <div class="input-field ">
                                <input name="degree[]" class="hide" id="Dagree" type="text" value="<?= $dta['dagree'] ?>">
                                <label>Degree</label>
                              </div>
                            </div>
                            <!-- ============Total Marks============ -->
                            <div class="col-md-6">

                              <div class="input-field mt-5">
                                <input name="total_marks[]" class="hide" id="tmarks" type="number" value="<?= $dta['total_marks'] ?>">
                                <label>Total Marks / CGPA</label>
                              </div>
                            </div>
                            <!-- ============Obtains Marks============ -->
                            <div class="col-md-6">
                              <div class="input-field mt-5">
                                <input name="ob_marks[]" class="hide" id="obmarks" type="number" value="<?= $dta['obtain_marks'] ?>">
                                <label>Obtains Marks / CGPA</label>
                              </div>
                            </div>
                            <!-- ============Start-Date============ -->
                            <div class="col-md-6">
                              <div class="input-field mt-5 ">
                                <input name="edu_st_date[]" class="hide" id="sdate" type="date" value="<?= $dta['deg_st_date'] ?>">
                                <label class="date-lable">Start Date</label>
                              </div>
                            </div>
                            <!-- ============End-Date============ -->
                            <div class="col-md-6 ">
                              <div class="input-field mt-5 ">
                                <input name="edu_end_date[]" id="edate" class="hide" type="date" value="<?= $dta['deg_end_date'] ?>">
                                <label class="date-lable">End Date</label>
                              </div>
                            </div>
                            <!-- ============Feild============ -->
                            <div class="col-md-12">
                              <div class="input-field mt-5  ">
                                <textarea name="edu_field[]" class="form-control" id="Feild" rows="4"> <?= $dta['field'] ?></textarea>
                                <label>Education Details</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php
                    }
                  } else {
                    ?>

                    <!-- ================user-Education-form-Start==================== -->
                    <div class=" py-2 mt-3" id="addeduction" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                      <div class="my-3 position-relative">
                        <h3 class="headinf">Education</h3>
                      </div>
                      <div class="container">
                        <div class="row">
                          <!-- ============institue Name============ -->
                          <div class="col-md-6">
                            <div class="input-field ">
                              <input class="rem_value hide" name="institute_name[]" id="Institute" type="text">
                              <label>Institute Name</label>
                            </div>
                          </div>
                          <!-- ============Dagree Name============ -->
                          <div class="col-md-6">

                            <div class="input-field ">
                              <input name="degree[]" class="hide" id="Dagree" type="text">
                              <label>Degree</label>
                            </div>
                          </div>
                          <!-- ============Total Marks============ -->
                          <div class="col-md-6">

                            <div class="input-field mt-5">
                              <input name="total_marks[]" class="hide" id="tmarks" type="number">
                              <label>Total Marks / CGPA</label>
                            </div>
                          </div>
                          <!-- ============Obtains Marks============ -->
                          <div class="col-md-6">
                            <div class="input-field mt-5">
                              <input name="ob_marks[]" class="hide" id="obmarks" type="number">
                              <label>Obtains Marks / CGPA</label>
                            </div>
                          </div>
                          <!-- ============Start-Date============ -->
                          <div class="col-md-6">
                            <div class="input-field mt-5 ">
                              <input name="edu_st_date[]" class="hide" id="sdate" type="date">
                              <label class="date-lable">Start Date</label>
                            </div>
                          </div>
                          <!-- ============End-Date============ -->
                          <div class="col-md-6 ">
                            <div class="input-field mt-5 ">
                              <input name="edu_end_date[]" id="edate" class="hide" type="date">
                              <label class="date-lable">End Date</label>
                            </div>
                          </div>
                          <!-- ============Feild============ -->
                          <div class="col-md-12">
                            <div class="input-field mt-5  ">
                              <textarea name="edu_field[]" class="form-control" id="Feild" rows="4"></textarea>
                              <label>Education Details</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php

                  }
                  ?>
                  <!-- ======================details-table================ -->
                  <div class="container-fluid">
                    <div id="education_table">
                    </div>
                  </div>
                  <!-- ======================details-table-End================ -->
                  <div class="form-buttons d-flex justify-content-end">
                    <button style="padding:8px 12px; border-radius:40px;" class="btn btn-danger educationbtn  mt-4  me-2" type="button"> <i class="fa-solid fa-plus"></i> Add Education</button>
                  </div>

                  <script>
                    function removeById(elementId) {
                      var element = document.querySelector(elementId);
                      if (element) {
                        element.remove();
                      }
                    }

                    let add_edu = document.querySelectorAll('.educationbtn');
                    add_edu.forEach((e) => {
                      var id = Math.floor(Math.random() * 999999) + 1;
                      var edu_id = Math.floor(Math.random() * 999999) + 1;
                      e.addEventListener('click', () => {
                        e.classList.remove('educationbtn');

                        let education_divs = document.getElementById('education_table');
                        let newdivs = document.createElement('div');
                        newdivs.classList.add('row');
                        newdivs.id = 'education_table_id_' + id;
                        newdivs.innerHTML = `
                        <div class=" py-2 mt-3 id="addeduction" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                    <div class="my-3 position-relative">
                      <h3 class="headinf">Education</h3>
                      <h4  onclick="removeById('#education_table_id_${id}')" class="position-absolute" style="right: 20px; top:-10px; cursor: pointer;"><i class="fa-solid fa-x"></i></h4>
                    </div>
                    <div class="row">
          <div class="col-md-6">
           <div class="input-field mt-5">
          <input class="rem_value hide" name="institute_name[]" type="text"> <label> Institute Name </label>
             </div>
        </div>
       <div class="col-md-6">
          <div class="input-field mt-5">
            <input class="hide" name="degree[]" type="text"> <label> Degree </label>
         </div>
       </div>
        <div class="col-md-6">
          <div class="input-field mt-5">
           <input class="hide" name="total_marks[]" type="number"> <label> Total Marks / CGPA</label>
         </div>
        </div>
      <div class="col-md-6">
        <div class="input-field mt-5">
          <input name="ob_marks[]" class="hide" id="obmarks" type="number">
          <label>Obtains Marks / CGPA</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-field mt-5">
          <input name="edu_st_date[]" class="hide" id="sdate" type="date">
          <label class="date-lable">Start Date</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-field mt-5">
          <input name="edu_end_date[]" id="edate" class="hide" type="date">
          <label class="date-lable">End Date</label>
        </div>
      </div>
      <div class="col-md-12">
        <div class="input-field mt-5">
        <textarea name="edu_field[]" class="form-control" id="Feild" rows="4" ></textarea>
          <label>Education Details</label>
        </div>
              </div>
            </div>
          </div> `;

                        education_divs.appendChild(newdivs);
                        del_edu.addEventListener('click', () => {
                          newdivs.remove();
                          del_edu.style.display = "none"

                        })
                      })
                    });
                  </script>
                  <?php
                  if ($getdata == true) {
                    while ($row = mysqli_fetch_assoc($checkskill)) {
                  ?>
                      <div style=" box-shadow:0px 0px 15px 10px #E0E0E0; border-radius:20px; margin-top:2rem">
                        <div class="personal-info-form  py-3 ">
                          <div class="my-3 position-relative">
                            <h3 class="headinf">Skill</h3>
                            <a href="edu_skill.php?delete=<?= $row['skill_id'] ?>">
                              <h4 class="position-absolute" style="right: 20px; top:-10px; cursor: pointer; color:red"><i class="fa-solid fa-x"></i></h4>
                            </a>
                          </div>
                        </div>
                        <!-- ==================Skill-section-Start========================== -->
                        <!-- ============Skill 1============ -->
                        <div class="container-fluid">
                          <div class="row">
                            <input type="hidden" name="sk_id" value="<?= $row['skill_id'] ?>">
                            <!-- ================user-Skills-form-Start====================== -->
                            <div id="add_iteee" class="mt-3">
                              <div class="input-field">
                                <input name="skill[]" id="skill_" style="width:100%" type="text" value="<?= $row['skill'] ?>">
                                <label>Skill </label>
                              </div>
                            </div>
                            <!-- ================user-Skills-form-End  ====================== -->
                            <div class="input-field mt-5 mb-4">
                              <label class="ms-2">Skill level</label>
                              <select name="skill_range[]" class="form-select gender-option">
                                <option value="Beginner" <?= ($row['skill_per'] == 'Beginner') ? 'selected' : '' ?>>Beginner</option>
                                <option value="Skillful" <?= ($row['skill_per'] == 'Skillful') ? 'selected' : '' ?>>Skillful</option>
                                <option value="Experienced" <?= ($row['skill_per'] == 'Experienced') ? 'selected' : '' ?>>Experienced</option>
                                <option value="Expert" <?= ($row['skill_per'] == 'Expert') ? 'selected' : '' ?>>Expert</option>
                              </select>
                            </div>

                          </div>

                        </div>

                      </div>
                    <?php
                    }
                  } else {
                    ?>
                    <div style=" box-shadow:0px 0px 15px 10px #E0E0E0; border-radius:20px; margin-top:5rem">
                      <div class="personal-info-form  py-3 ">
                        <div class="my-3 position-relative">
                          <h3 class="headinf">Skill</h3>
                        </div>
                      </div>
                      <!-- ==================Skill-section-Start========================== -->
                      <!-- ============Skill 1============ -->
                      <div class="container-fluid">
                        <div class="row">
                          <!-- ================user-Skills-form-Start====================== -->
                          <div id="add_iteee" class="mt-3">
                            <div class="input-field">
                              <input name="skill[]" id="skill_" style="width:100%" type="text">
                              <label>Skill </label>
                            </div>
                          </div>
                          <!-- ================user-Skills-form-End  ====================== -->
                          <div class="input-field mt-5 mb-4">
                            <label class="ms-2">skill level</label>
                            <select id="age_slider" name="skill_range[]" class="form-select gender-option">
                              <option selected value="Beginner">Beginner</option>
                              <option value="Skillful">Skillful</option>
                              <option value="Experienced">Experienced</option>
                              <option value="Expert">Expert</option>
                            </select>
                          </div>
                        </div>

                      </div>

                    </div>
                  <?php
                  }
                  ?>



                  <div id="skillinputcontainer">

                  </div>

                  <div class="form-buttons  d-flex justify-content-end">
                    <button id="skill_btn" style="padding:8px 12px; border-radius:40px;" class="btn btn-danger mt-4  me-2" type="button"> <i class="fa-solid fa-plus"></i> Add Skill</button>
                  </div>

                  <script>
                    function removeskillById(e) {
                      var element = document.querySelector(e);
                      if (element) {
                        element.remove();
                      }
                    }
                    let skillsec = document.getElementById("skillinputcontainer");
                    let addbtn = document.getElementById("skill_btn");
                    addbtn.addEventListener('click', () => {

                      var sid = Math.floor(Math.random() * 999 + 1)

                      let skill_div = document.createElement('div');
                      skill_div.classList.add('col-12');
                      skill_div.id = 'skill_id_' + sid;
                      skill_div.innerHTML = `                <div style=" box-shadow:0px 0px 15px 10px #E0E0E0; border-radius:20px; margin-top:1rem">
                    <div class="personal-info-form  py-3 ">
                      <div class="my-3 position-relative">
                        <h3 class="headinf">Skill</h3>
                        <h4  onclick="removeskillById('#skill_id_${sid}')" class="position-absolute" style="right: 1.5rem; top:-10px; cursor:pointer;"><i class="fa-solid fa-x"></i></h4>
                      </div>
                    </div>
                    <!-- ==================Skill-section-Start========================== -->
                    <!-- ============Skill 1============ -->
                    <div class="container-fluid">
                      <div class="row">
                        <div id="add_iteee" class="mt-3">
                          <div class="input-field">
                            <input name="skill[]" id="skill_" style="width:100%" type="text">
                            <label>Skill </label>
                          </div>
                        </div>
                        <div class="input-field mt-5 mb-4">
                          <label class="ms-2">skill level</label>
                          <select id="age_slider" name="skill_range[]" class="form-select gender-option">
                            <option selected value="Beginner">Beginner</option>
                            <option value="Skillful">Skillful</option>
                            <option value="Experienced">Experienced</option>
                            <option value="Expert">Expert</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>`

                      skillsec.append(skill_div);

                    })
                  </script>

                  <!-- ==================Skill-section-End============================ -->

                  <div class="col-12  " style="margin-top: 100px;">
                    <div class="form-buttons mt-4">
                      <a href="./personal_info.php"> <button type="button" class="btn btn-danger btnPrevious add-det-btn">Previous</button></a>

                      <a href="./work-exp.php"> <button type="submit" name="submit" class="btn btn-danger float-end save-btn btnNext add-det-btn"><?= $buttontext ?></button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ==============form-End================ -->
            <!-- ==============form-tips-sec-start============== -->
            <div class="col-lg-5 mt-4 " style=" box-shadow:5px 0px 20px 10px #E0E0E0; border-radius:20px;">

              <div class="Form-tip-sec">
                <h3>TIPS</h3>
                <div class="text mt-2">
                  <ul>
                    <li>Order: Start with your most recent or highest level of education and work backward chronologically.</li>
                    <li>Format: Include the name of the institution, degree or qualification earned, field of study, and the dates
                      of attendance or graduation.</li>
                    <li>Relevant Information: Highlight any honors, awards, or notable achievements during your academic journey.</li>
                    <li>Relevant Skills: Tailor your skills section to include those directly related to the job you're applying for. This could include technical skills, software proficiency, languages spoken, or specific industry knowledge.</li>

                    <li>Categorize: Organize your skills into categories (e.g., technical skills, interpersonal skills) to provide clarity and ease of reading.</li>
                    <li>Highlight Strengths: Place the most critical and relevant skills at the beginning of each category to grab the reader's attention.</li>
                    <li>Use Keywords: Incorporate keywords from the job description to align your skills with the employer's requirements and increase the likelihood of your resume being selected by applicant tracking systems (ATS).</li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- ==============form-tips-sec-End============== -->
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- ============= personal-information-Form-End============== -->


  <!-- ================ Footer-Start ======================= -->

  <footer class="text-center text-lg-start text-white " style="background-color: black; margin-top:4rem">
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
  include('./includes/end_links.php');
  ?>