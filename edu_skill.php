<?php
$title = "Information";
include("includes/db.php");

if (!$_SESSION['user_id']) {
  header("location: index.php");
}


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
  $presents = $_POST['edu_present'];
  if (!empty($_REQUEST['edu_id'])) {
    $sql_del = "DELETE FROM `education` WHERE  user_id = '" . $_SESSION['user_id'] . "'";
    $r = mysqli_query($conn, $sql_del);
    if ($r) {
      for ($a = 0; $a < count($institute_names); $a++) {
        $institute_name = $conn->real_escape_string($institute_names[$a]);
        $degree = $conn->real_escape_string($degrees[$a]);
        $total_mark = $conn->real_escape_string($total_marks[$a]);
        $ob_mark = $conn->real_escape_string($ob_marks[$a]);
        $edu_st_date = $conn->real_escape_string($edu_st_dates[$a]);
        $edu_end_date = $conn->real_escape_string($edu_end_dates[$a]);
        $edu_field = $conn->real_escape_string($edu_fields[$a]);
        $present = $conn->real_escape_string($presents[$a]);
        $sql = "INSERT INTO `education`(`user_id`,`instutute_name`, `dagree`, `total_marks`, `obtain_marks`,  `deg_st_date`, `deg_end_date`, `field` , `edu_present`) VALUES ('" . $_SESSION['user_id'] . "', '$institute_name','$degree','$total_mark','$ob_mark','$edu_st_date','$edu_end_date','$edu_field' , '$present')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          header('location: ./work-exp.php');
        }
      }
    }
  } else {
    for ($a = 0; $a < count($institute_names); $a++) {
      $institute_name = $conn->real_escape_string($institute_names[$a]);
      $degree = $conn->real_escape_string($degrees[$a]);
      $total_mark = $conn->real_escape_string($total_marks[$a]);
      $ob_mark = $conn->real_escape_string($ob_marks[$a]);
      $edu_st_date = $conn->real_escape_string($edu_st_dates[$a]);
      $edu_end_date = $conn->real_escape_string($edu_end_dates[$a]);
      $edu_field = $conn->real_escape_string($edu_fields[$a]);
      $present = $conn->real_escape_string($presents[$a]);
      $sql = "INSERT INTO `education`(`user_id`,`instutute_name`, `dagree`, `total_marks`, `obtain_marks`,  `deg_st_date`, `deg_end_date`, `field` , `edu_present`) VALUES ('" . $_SESSION['user_id'] . "', '$institute_name','$degree','$total_mark','$ob_mark','$edu_st_date','$edu_end_date','$edu_field' , '$present')";
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
      $skill = $conn->real_escape_string($skills[$i]);
      $skill_range = $conn->real_escape_string($skill_ranges[$i]);


      $sql1 = "INSERT INTO `skills` (`user_id`, `skill`, `skill_per`) VALUES ('" . $_SESSION['user_id'] . "','$skill', '$skill_range')";
      $result1 = mysqli_query($conn, $sql1);
    }
  } else {
    for ($i = 0; $i < count($skills); $i++) {
      $skill = $conn->real_escape_string($skills[$i]);
      $skill_range = $conn->real_escape_string($skill_ranges[$i]);


      $sql1 = "INSERT INTO `skills` (`user_id`, `skill`, `skill_per`) VALUES ('" . $_SESSION['user_id'] . "','$skill', '$skill_range')";
      $result1 = mysqli_query($conn, $sql1);
    }
  }
}


@$checkedu = mysqli_query($conn, "SELECT * FROM education WHERE user_id = '" . $_SESSION['user_id'] . "' ");
@$checkskill = mysqli_query($conn, "SELECT * FROM skills WHERE user_id = '" . $_SESSION['user_id'] . "' ");
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
<style>
  body {
    background-color: white;
  }
</style>

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
<form action="#" method="post" enctype="multipart/form-data">
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
                  $a = 1;
                  while ($dta = mysqli_fetch_assoc($checkedu)) {
                    $a++;
                ?>
                    <!-- ================user-Education-form-Start==================== -->
                    <div class=" py-2 mt-3" id="addeduction" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                      <div class="my-3 position-relative">
                        <h5 class="headinf"><?=  $translations['education_info']?></h5>
                        <a href="edu_skill.php?del=<?= $dta['edu_id'] ?>">
                          <h5 class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                        </a>
                      </div>
                      <div class="container">
                        <input type="hidden" name="edu_id" value="<?= $dta['edu_id'] ?>">
                        <div class="row">
                          <!-- ============institue Name============ -->
                          <div class="col-md-6">
                            <div class="input-field ">
                              <label><?=  $translations['edu_name1']?></label>
                              <input class="rem_value hide" name="institute_name[]" id="Institute" type="text" value="<?= $dta['instutute_name'] ?>">
                            </div>
                          </div>
                          <!-- ============Dagree Name============ -->
                           <div class="col-md-6">

                            <div class="input-field ">
                              <label><?=  $translations['edu_name2']?></label>
                              <input name="degree[]" class="hide" id="Dagree" type="text" value="<?= $dta['dagree'] ?>">
                            </div>
                          </div>
                          <!-- ============Total Marks============ -->
                          <div class="col-md-6">

                            <div class="input-field ">
                              <label><?=  $translations['edu_name3']?></label>
                              <input name="total_marks[]" class="hide" id="tmarks" type="text" value="<?= $dta['total_marks'] ?>">
                            </div>
                          </div>
                          <!-- ============Obtains Marks============ -->
                          <div class="col-md-6">
                            <div class="input-field">
                              <label><?=  $translations['edu_name4']?></label>
                              <input name="ob_marks[]" class="hide" id="obmarks" type="text" value="<?= $dta['obtain_marks'] ?>">
                            </div>
                          </div>
                          <!-- ============Start-Date============ -->
                          <div class="col-md-6">
                            <div class="input-field ">
                              <label><?=  $translations['edu_name5']?></label>
                              <input name="edu_st_date[]" class="hide" id="sdate" type="month" value="<?= $dta['deg_st_date'] ?>">
                            </div>
                          </div>
                          <!-- ============End-Date============ -->
                          <div class="col-md-6 ">
                            <div class="input-field d-flex position-relative ">
                              <div>
                                <label class="date-lable"><?=  $translations['edu_name6']?></label>
                                <input style="width: 100%;" name="edu_end_date[]" id="edate" class="hide" type="month" value="<?= $dta['deg_end_date'] ?>">
                              </div>
                              <?php
                              if ($dta['edu_present'] == '1') {
                                $checked = 'checked';
                              } else {
                                $checked = '';
                              }
                              ?>
                              <div>
                                <label class="date-lable "><?=  $translations['edu_name7']?></label>
                                <input type="checkbox" <?= $checked ?> style="width: 100%;" id="checkbox<?= $a ?>" onchange="changecheck(this)">
                                <input type="hidden" id="inputField<?= $a ?>" name="edu_present[]" value="<?= $dta['edu_present'] ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <!-- ============Feild============ -->
                          <div class="col-md-12">
                            <div class="input-field   ">
                              <label><?=  $translations['edu_name8']?></label>
                              <textarea maxlength="180" name="edu_field[]" class="form-control" id="Feild" rows="4"> <?= $dta['field'] ?></textarea>
                              <div class="form-text about-us-txt"> <?=  $translations['edu_name9']?></div>
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
                      <h5 class="headinf">Education</h5>
                    </div>
                    <div class="container">
                      <div class="row">
                        <!-- ============institue Name============ -->
                        <div class="col-md-6">
                          <div class="input-field ">
                            <label><?=  $translations['edu_name1']?></label>
                            <input class="rem_value hide" name="institute_name[]" id="Institute" type="text">
                          </div>
                        </div>
                        <!-- ============Dagree Name============ -->
                        <div class="col-md-6">

                          <div class="input-field ">
                            <label><?=  $translations['edu_name2']?></label>
                            <input name="degree[]" class="hide" id="Dagree" type="text">
                          </div>
                        </div>
                        <!-- ============Total Marks============ -->
                        <div class="col-md-6">

                          <div class="input-field">
                            <label><?=  $translations['edu_name3']?></label>
                            <input name="total_marks[]" class="hide" id="tmarks" type="text">
                          </div>
                        </div>
                        <!-- ============Obtains Marks============ -->
                        <div class="col-md-6">
                          <div class="input-field ">
                            <label><?=  $translations['edu_name4']?></label>
                            <input name="ob_marks[]" class="hide" id="obmarks" type="text">
                          </div>
                        </div>
                        <!-- ============Start-Date============ -->
                        <div class="col-md-6">
                          <div class="input-field  ">
                            <label><?=  $translations['edu_name5']?></label>
                            <input name="edu_st_date[]" class="hide" id="sdate" type="month">
                          </div>
                        </div>
                        <!-- ============End-Date============ -->
                        <div class="col-md-6 ">
                          <div class="input-field d-flex position-relative ">
                            <div>
                              <label class="date-lable"><?=  $translations['edu_name6']?></label>
                              <input style="width: 100%;" name="edu_end_date[]" id="edate" class="hide" type="month">
                            </div>
                            <div>
                              <label class="date-lable "><?=  $translations['edu_name7']?></label>
                              <input type="checkbox" style="width: 100%;" id="checkbox1" onchange="changecheck(this)">
                              <input type="hidden" id="inputField1" name="edu_present[]" value="0" readonly>
                            </div>
                          </div>
                        </div>
                        <!-- ============Feild============ -->
                        <div class="col-md-12">
                          <div class="input-field   ">
                            <label><?=  $translations['edu_name8']?></label>
                            <textarea maxlength="180" name="edu_field[]" class="form-control" id="Feild" rows="4"></textarea>
                            <div class="form-text about-us-txt"><?=  $translations['edu_name9']?></div>
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
                  <button id="add_education" style="padding:8px 12px; border-radius:40px;" class="btn btn-danger educationbtn  mt-4  me-2" type="button"> <i class="fa-solid fa-plus"></i> Add Education</button>
                </div>

                <script>
                  function removeById(elementId) {
                    var element = document.querySelector(elementId);
                    if (element) {
                      element.remove();
                    }
                  }

                  let add_edu = document.getElementById('add_education');
                  let education_divs = document.getElementById('education_table');
                  add_edu.addEventListener('click', () => {
                    console.log("click");
                    var id = Math.floor(Math.random() * 999999) + 1;
                    var edu_id = Math.floor(Math.random() * 999999) + 1;

                    let newdivs = document.createElement('div');
                    newdivs.classList.add('row');
                    newdivs.id = 'education_table_id_' + id;
                    newdivs.innerHTML = `
                        <div class=" py-2 mt-3 id="addeduction" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                    <div class="my-3 position-relative">
                      <h5 class="headinf">Education</h5>
                      <h5  onclick="removeById('#education_table_id_${id}')" class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                    </div>
                    <div class="row">
          <div class="col-md-6">
          <div class="input-field">
          <label> Institute Name </label>
          <input class="rem_value hide" name="institute_name[]" type="text"> 
             </div>
        </div>
       <div class="col-md-6">
       <div class="input-field">
       <label> Degree </label>
      <input class="hide" name="degree[]" type="text">
         </div>
       </div>
        <div class="col-md-6">
        <div class="input-field">
        <label> Total Marks / CGPA</label>
        <input class="hide" name="total_marks[]" type="text">
         </div>
        </div>
      <div class="col-md-6">
        <div class="input-field ">
        <label>Obtains Marks / CGPA</label>
          <input name="ob_marks[]" class="hide" id="obmarks" type="text">
        </div>
      </div>
      <div class="col-md-6">
        <div class="input-field">
        <label>Start Date</label>
          <input name="edu_st_date[]" class="hide" id="sdate" type="month">
        </div>
      </div>
      <div class="col-md-6 ">
                            <div class="input-field d-flex position-relative">
                            <div>
                              <label class="date-lable">End Date</label>
                              <input style="width: 100%;" name="edu_end_date[]" id="edate" class="hide" type="month">
                            </div>
                            <div>
                              <label class="date-lable ">Present</label>
                              <input type="checkbox" style="width: 100%;" id="checkbox${id}" onchange="changecheck(this)">
                              <input type="hidden" id="inputField${id}" name="edu_present[]" value="0" readonly>
                            </div>
                            </div>
                          </div>
      <div class="col-md-12">
        <div class="input-field ">
        <label>Education Details</label>
        <textarea  maxlength="180"  name="edu_field[]" class="form-control" id="Feild" rows="4" ></textarea>
          <div class="form-text about-us-txt">Enter yout education details in less than <b>180</b> Letters</div>
        </div>
              </div>
            </div>
          </div> `;

                    education_divs.appendChild(newdivs);
                  });
                </script>
                <script>
                  function changecheck(checkbox) {
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
                if ($getdata == true) {
                  while ($row = mysqli_fetch_assoc($checkskill)) {
                ?>
                    <div style=" box-shadow:0px 0px 15px 10px #E0E0E0; border-radius:20px; margin-top:2rem">
                      <div class="personal-info-form  py-3 ">
                        <div class="my-3 position-relative">
                          <h5 class="headinf"><?=  $translations['skill_name1']?></h5>
                          <a href="edu_skill.php?delete=<?= $row['skill_id'] ?>">
                            <h5 class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
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
                              <label>Skill </label>
                              <input name="skill[]" id="skill_" style="width:100%" type="text" value="<?= $row['skill'] ?>">
                            </div>
                          </div>
                          <!-- ================user-Skills-form-End  ====================== -->
                          <div class="input-field mb-4">
                            <label class="ms-2"><?=  $translations['skill_name2']?></label>
                            <select name="skill_range[]" class="form-select gender-option">
                              <option value="Beginner" <?= ($row['skill_per'] == 'Beginner') ? 'selected' : '' ?>><?=  $translations['skill_type']?></option>
                              <option value="Skillful" <?= ($row['skill_per'] == 'Skillful') ? 'selected' : '' ?>><?=  $translations['skill_type1']?></option>
                              <option value="Experienced" <?= ($row['skill_per'] == 'Experienced') ? 'selected' : '' ?>>Experienced</option>
                              <option value="Expert" <?= ($row['skill_per'] == 'Expert') ? 'selected' : '' ?>><?=  $translations['skill_type2']?></option>
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
                        <h5 class="headinf"><?=  $translations['skill_name1']?></h5>
                      </div>
                    </div>
                    <!-- ==================Skill-section-Start========================== -->
                    <!-- ============Skill 1============ -->
                    <div class="container-fluid">
                      <div class="row">
                        <!-- ================user-Skills-form-Start====================== -->
                        <div id="add_iteee" class="mt-3">
                          <div class="input-field">
                            <label><?=  $translations['skill_name1']?> </label>
                            <input name="skill[]" id="skill_" style="width:100%" type="text">
                          </div>
                        </div>
                        <!-- ================user-Skills-form-End  ====================== -->
                        <div class="input-field mb-4">
                          <label class="ms-2"><?=  $translations['skill_name2']?></label>
                          <select id="age_slider" name="skill_range[]" class="form-select gender-option">
                            <option selected value="Beginner"><?=  $translations['skill_type']?></option>
                            <option value="Skillful"><?=  $translations['skill_type1']?></option>
                            <option value="Expert"><?=  $translations['skill_type2']?></option>
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
                        <h5 class="headinf">Skill</h5>
                        <h54  onclick="removeskillById('#skill_id_${sid}')" class="position-absolute" style="right: 1.5rem; top:-8px; cursor:pointer;"><i  class="fa-solid fa-x"></i></h54>
                      </div>
                    </div>
                    <!-- ==================Skill-section-Start========================== -->
                    <!-- ============Skill 1============ -->
                    <div class="container-fluid">
                      <div class="row">
                        <div id="add_iteee" class="mt-3">
                          <div class="input-field">
                          <label>Skill </label>
                            <input name="skill[]" id="skill_" style="width:100%" type="text">
                          </div>
                        </div>
                        <div class="input-field  mb-4">
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
                 <li><?=  $translations['edu_name11']?></li>
                 <li><?=  $translations['edu_name12']?></li>
                 <li><?=  $translations['edu_name13']?></li>
                 <li><?=  $translations['edu_name14']?></li>
                 <li><?=  $translations['edu_name15']?></li>
                 <li><?=  $translations['edu_name16']?></li>
                 <li><?=  $translations['edu_name17']?></li>
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
        <p><?=  $translations['Our_Social_Handles']?></p>
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