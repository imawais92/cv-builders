<?php
$title = "Information";
include('includes/db.php');

if (!$_SESSION['user_id']) {
  header("location: index.php");
}


if (isset($_POST['submit'])) {
  $hobbies = $_POST['hobby'];
  $languages = $_POST['languge'];
  @$references = $_POST['reference'];




  if (!empty($_POST['reference'])) {
    // Initialize an empty array to store non-empty references
    $nonEmptyReferences = array();

    // Iterate through the references and filter out empty ones
    foreach ($_POST['reference'] as $value) {
      $value = trim($value); // Trim whitespace
      if (!empty($value)) {
        $nonEmptyReferences[] = $value;
      }
    }

    // Check if there are non-empty references to insert
    if (!empty($nonEmptyReferences)) {
      if (isset($_REQUEST['refe_id'])) {
        // Delete existing records for the user
        $sql_de = "DELETE FROM `user_references` WHERE user_id = '" . $_SESSION['user_id'] . "'";
        $resu = mysqli_query($conn, $sql_de);
        if ($resu) {
          // Insert non-empty references
          foreach ($nonEmptyReferences as $reference) {
            $sql2 = "INSERT INTO `user_references` (`user_id`,`user_reference`) VALUES ('" . $_SESSION['user_id'] . "', '$reference')";
            $result2 = mysqli_query($conn, $sql2);
          }
        }
      } else {
        // Insert non-empty references without deleting existing ones
        foreach ($nonEmptyReferences as $reference) {
          $sql2 = "INSERT INTO `user_references` (`user_id`,`user_reference`) VALUES ('" . $_SESSION['user_id'] . "', '$reference')";
          $result2 = mysqli_query($conn, $sql2);
        }
      }
    }
  }



  // =========ref
  // }

  // =========lan
  if (!empty($_REQUEST['lan_ids'])) {
    $sql_d = "DELETE FROM `languages` WHERE  user_id = '" . $_SESSION['user_id'] . "'";
    $re = mysqli_query($conn, $sql_d);
    if ($re) {
      for ($i = 0; $i < count($languages); $i++) {
        $language = $conn->real_escape_string($languages[$i]);

        $sql1 = "INSERT INTO `languages` (`user_id`,`language`) VALUES ('" . $_SESSION['user_id'] . "','$language')";
        $result1 = mysqli_query($conn, $sql1);;
      }
    }
  } else {
    for ($i = 0; $i < count($languages); $i++) {
      $language = $conn->real_escape_string($languages[$i]);

      $sql1 = "INSERT INTO `languages` (`user_id`,`language`) VALUES ('" . $_SESSION['user_id'] . "','$language')";
      $result1 = mysqli_query($conn, $sql1);;
    }
  }
  // =========lan

  // =========hoby
  if (!empty($_REQUEST['hoby_id'])) {
    $sql_del = "DELETE FROM `hobbies` WHERE  user_id = '" . $_SESSION['user_id'] . "'";
    $r = mysqli_query($conn, $sql_del);
    if ($r) {
      for ($i = 0; $i < count($hobbies); $i++) {
        $hobby = $conn->real_escape_string($hobbies[$i]);

        $sql3 = "INSERT INTO `hobbies` (`user_id`,`hobby`) VALUES ('" . $_SESSION['user_id'] . "','$hobby')";
        $result3 = mysqli_query($conn, $sql3);
      }
    }
  } else {
    for ($i = 0; $i < count($hobbies); $i++) {
      $hobby = $conn->real_escape_string($hobbies[$i]);

      $sql3 = "INSERT INTO `hobbies` (`user_id`,`hobby`) VALUES ('" . $_SESSION['user_id'] . "','$hobby')";
      $result3 = mysqli_query($conn, $sql3);
    }
  }
  // =========hoby


  if ($result1) {
    header("location: getdata.php");
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}


$checkhob = mysqli_query($conn, "SELECT * FROM hobbies WHERE user_id = '" . $_SESSION['user_id'] . "' ");
$checklan = mysqli_query($conn, "SELECT * FROM languages WHERE user_id = '" . $_SESSION['user_id'] . "' ");
$checkref  = mysqli_query($conn, "SELECT * FROM user_references WHERE user_id = '" . $_SESSION['user_id'] . "' ");
if (mysqli_num_rows($checkhob) or mysqli_num_rows($checklan) or mysqli_num_rows($checkref)  >=  1) {
  $getdata = true;
} else {
  $buttontext = "Finish";
}




if (@$_REQUEST['delh']) {
  $del_id  = $_REQUEST['delh'];
  $re = mysqli_query($conn, "DELETE FROM `hobbies` WHERE  hobbies_id =  $del_id");
  if ($re) {
    header('location:hob_lan_ref.php ');
  }
}
if (@$_REQUEST['dellan']) {
  $del_id  = $_REQUEST['dellan'];
  $re = mysqli_query($conn, "DELETE FROM `languages` WHERE  lang_id =  $del_id");
  if ($re) {
    header('location:hob_lan_ref.php ');
  }
}
if (@$_REQUEST['delref']) {
  $del_id  = $_REQUEST['delref'];
  $re = mysqli_query($conn, "DELETE FROM `user_references` WHERE  ref_id =  $del_id");
  if ($re) {
    header('location:hob_lan_ref.php ');
  }
}


?>



<?php
include("includes/header.php");
include("includes/navbar.php");
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
          <p><span style="color:white; border-color:green;     background:green;">2</span> <bdo class="form_progress_txt">Education/Skills</bdo></p>
        </a>
        <a style="color: black;" href="./work-exp.php">
          <p><span style="color:white; border-color:green;     background:green;">3</span><bdo class="form_progress_txt">Working Experience</bdo> </p>
        </a>

        <a style="color: black;" href="./hob_lan_ref.php">
          <p><span style="color:white;     background:#C21010;">4</span> <bdo class="form_progress_txt">Languages/Reference</bdo></p>
        </a>



      </div>
    </div>
  </div>
</div>
<!-- ====================contact-page-progrss-bar-End==================== -->
<form action="#" method="post">
  <!-- ============= personal-information-Form-Start============= -->
  <div class="container">
    <div class="form-bg mt-5" style="margin-bottom: 10rem;">
      <div class="container">
        <div class="row">
          <!-- ==============form-start============== -->
          <div class="col-lg-7">
            <div class="personal-info-form pb-4">
              <?php
              if ($getdata == true) {
                while ($dta = mysqli_fetch_assoc($checkhob)) {
              ?>
                  <!-- ==================hobby-section-Start========================== -->
                  <input name="hoby_id" type="hidden" value="<?= $dta['hobbies_id'] ?>">
                  <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                    <div class="my-3 position-relative">
                      <h5 class="headinf">Hobby</h5>
                      <a href="hob_lan_ref.php?delh=<?= $dta['hobbies_id'] ?>">
                        <h5 class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                      </a>
                    </div>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <div id="referad">
                            <div class="input-field mt-3 ">
                              <label><?=  $translations['hobbiesss']?></label>
                              <input name="hobby[]" id="hobby" type="text" value="<?= $dta['hobby'] ?>" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php
                }
              } else {

                ?>
                <!-- ==================hobby-section-Start========================== -->
                <div class="py-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">Hobbies</h5>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div id="referad">
                          <div class="input-field mt-3 ">
                            <label><?=  $translations['hobby']?></label>
                            <input name="hobby[]" id="hobby" type="text" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              <?php

              }
              ?>
              <!-- ======================virtual-sec================ -->
              <div class="container-fluid">
                <div id="Hobby_sec">
                </div>
              </div>
              <!-- ======================virtual-sec================ -->
              <div class="form-buttons d-flex justify-content-end">
                <button id="add_hobby" style="padding:8px 12px; border-radius:40px;" class="btn btn-danger   mt-4  me-2" type="button"> <i class="fa-solid fa-plus"></i> Add Hobby</button>
              </div>

              <script>
                function removehob(e) {
                  let hele = document.querySelector(e);
                  if (hele) {
                    hele.remove();
                  }
                }
                let hobby_sec = document.getElementById('Hobby_sec');
                let addbtn = document.getElementById('add_hobby');
                addbtn.addEventListener('click', () => {
                  hid = Math.floor(Math.random() * 999 + 1);
                  let newhob = document.createElement('div');
                  newhob.classList.add('row');
                  newhob.id = "hobyrem_" + hid;
                  newhob.innerHTML = `
                    <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">Hobbies</h5>
                    <h5 onclick="removehob('#hobyrem_${hid}')" class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div id="referad">
                          <div class="input-field mt-3 ">
                          <label>Hobby</label>
                            <input name="hobby[]" id="hobby" type="text" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>`
                  hobby_sec.append(newhob)
                })
              </script>
              <!-- ==================Language-section-Start========================== -->
              <div style="margin-top: 100px;">
                <?php
                if ($getdata == true) {
                  while ($data = mysqli_fetch_assoc($checklan)) {
                ?>
                    <input type="hidden" name="lan_ids" id="" value="<?= $data['lang_id'] ?>">
                    <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                      <div class="my-3 position-relative">
                        <h5 class="headinf">Language</h5>
                        <a href="hob_lan_ref.php?dellan=<?= $data['lang_id'] ?>">
                          <h5 class="position-absolute" style="right: 20px; top:-8px; cursor: pointer; "><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                        </a>
                      </div>
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="input-field mt-3 ">
                              <label><?=  $translations['Languages']?></label>
                              <input name="languge[]" id="lan" type="text" value="<?= $data['language'] ?>" required>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  <?php
                  }
                } else {

                  ?>
                  <div class="py-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                    <div class="my-3 position-relative">
                      <h5 class="headinf">Languages</h5>
                    </div>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-field mt-3 ">
                            <label><?=  $translations['Languages']?></label>
                            <input name="languge[]" id="lan" type="text" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php

                }
                ?>
              </div>
              <!-- ======================virtual-sec================ -->
              <div class="container-fluid">
                <div id="lan_sec">
                </div>
              </div>
              <!-- ======================virtual-sec================ -->
              <div class="form-buttons d-flex justify-content-end">
                <button id="add_language" style="padding:8px 12px; border-radius:40px;" class="btn btn-danger mb-2 mt-4  me-2" type="button"> <i class="fa-solid fa-plus"></i> Add Language</button>
              </div>

              <script>
                function removehob(e) {
                  let hele = document.querySelector(e);
                  if (hele) {
                    hele.remove();
                  }
                }
                let lan_sec = document.getElementById('lan_sec');
                let addlan = document.getElementById('add_language');
                addlan.addEventListener('click', () => {
                  lid = Math.floor(Math.random() * 999 + 1);
                  let newlan = document.createElement('div');
                  newlan.classList.add('row');
                  newlan.id = "lanrem_" + lid;
                  newlan.innerHTML = `
                    <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">Languages</h5>
                    <h5 onclick="removehob('#lanrem_${lid}')" class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="input-field mt-3 ">
                      <label>Language</label>
                            <input name="languge[]" id="lan" type="text"  required>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>`
                  lan_sec.append(newlan)
                })
              </script>


              <!-- ==================referece-section-Start========================== -->

              <?php
              $count = mysqli_num_rows($checkref);
              if ($count == 0) {
              ?>
                <input type="hidden" name="refe_id" id="" value="<?= @$row['ref_id'] ?>">
                <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">Reference</h5>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-field mt-3 ">
                          <label><?=  $translations['Reference']?></label>
                          <input name="reference[]" id="ref" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ======= -->
                <?php
              }
              if ($getdata == true) {
                while ($row = mysqli_fetch_assoc($checkref)) {
                ?>
                  <input type="hidden" name="refe_id" id="" value="<?= $row['ref_id'] ?>">
                  <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                    <div class="my-3 position-relative">
                      <h5 class="headinf">Reference</h5>
                      <a href="hob_lan_ref.php?delref=<?= $row['ref_id'] ?>">
                        <h5 class="position-absolute" style="right: 20px; top:-8px; cursor: pointer; "><i style="color:#c21010;" class="fa-solid fa-x"></i></h5>
                      </a>
                    </div>
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-field mt-3 ">
                            <label><?=  $translations['Reference']?></label>
                            <input name="reference[]" id="ref" type="text" value="<?= $row['user_reference'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
              } else {

                ?>
                <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">Reference</h5>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-field mt-3 ">
                          <label><?=  $translations['Reference']?></label>
                          <input name="reference[]" id="ref" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php

              }
              ?>

              <!-- ======================virtual-sec================ -->
              <div class="container-fluid">
                <div id="ref_sec">
                </div>
              </div>
              <!-- ======================virtual-sec================ -->
              <div class="form-buttons d-flex justify-content-end">
                <button id="add_ref" style="padding:8px 12px; border-radius:40px;" class="btn btn-danger   mt-4  me-2" type="button"> <i class="fa-solid fa-plus"></i> Add Reference</button>
              </div>

              <script>
                function removehob(e) {
                  let hele = document.querySelector(e);
                  if (hele) {
                    hele.remove();
                  }
                }
                let ref_sec = document.getElementById('ref_sec');
                let addref = document.getElementById('add_ref');
                addref.addEventListener('click', () => {
                  rid = Math.floor(Math.random() * 999 + 1);
                  let newref = document.createElement('div');
                  newref.classList.add('row');
                  newref.id = "refrem_" + rid;
                  newref.innerHTML = `
                    <div class="py-3 mt-3" style=" box-shadow:0px 0px 20px 10px #E0E0E0AF; border-radius:20px;">
                  <div class="my-3 position-relative">
                    <h5 class="headinf">References</h3>
                    <h5 onclick="removehob('#refrem_${rid}')" class="position-absolute" style="right: 20px; top:-8px; cursor: pointer;"><i style="color:#c21010;" class="fa-solid fa-x"></i></h4>
                  </div>
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="input-field mt-3 ">
                      <label>Reference</label>
                            <input name="reference[]" id="lan" type="text" >
                          </div>
                      </div>
                    </div>
                  </div>
                </div>`
                  ref_sec.append(newref)
                })
              </script>


              <div class="col-12  " style="margin-top: 100px;">
                <div class="form-buttons mt-4">
                  <a href="./work-exp.php"> <button type="button" class="btn btn-danger btnPrevious add-det-btn">Previous</button></a>
                  <button type="submit" name="submit" class="btn btn-danger float-end save-btn btnNext add-det-btn">Finish</button>
                </div>
              </div>
            </div>
          </div>
          <!-- ==============form-End================ -->
          <!-- ==============form-tips-sec-start============== -->
          <div class="col-lg-5" style=" box-shadow:5px 0px 20px 10px #E0E0E0; border-radius:20px;">
            <div class="Form-tip-sec">
              <h3>TIPS</h3>
              <div class="text mt-2">
                <ul>
                  <li><strong>Select Relevant Hobbies:</strong> Choose hobbies that align with the skills or qualities valued
                    in the job you're applying for. For example, if the position requires teamwork, you can
                    mention team sports or collaborative hobbies.</li>
                  <li><strong>Variety:</strong> Include a diverse range of hobbies to present a well-rounded personality. This can showcase
                    your ability to balance work and personal interests effectively.</li>
                  <li><strong>Showcase Transferable Skills:</strong> Highlight hobbies that demonstrate transferable skills such as
                    leadership, creativity, problem-solving, or organization.</li>
                  <li><strong>Relevance:</strong> Highlight languages that are relevant to the job or industry you're applying for.
                    If you're bilingual or multilingual, emphasize your language skills as they can be valuable assets.</li>
                  <li><strong>Include Upon Request:</strong> Instead of providing specific references on your CV or resume, simply state "References
                    available upon request." This keeps your document concise and allows you to provide references when requested by
                    the employer.</li>
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
<?php
include('./includes/end_links.php');
?>