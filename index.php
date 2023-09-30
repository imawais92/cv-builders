<?php
include('includes/header.php');
include('includes/db.php');
include('includes/navbar.php')


?>


    <!-- ================Hero-section-Start ================ -->
    <div class="container-fluid ">
      <div class="main-heading">
        <div class="row">
          <div class="col-lg-6  col-md-7">
            <div class="heading">
              <h2>We will deliver a professional</h2>
              <!-- <h1><span class="txt-anim"></span> for Free</h1> -->
              <h1>
                <span class="typewrite" data-period="2000" data-type='[ "CV", "Resume" ]'>
                  <span class="wrap"></span>
                </span> For Free
              </h1>
              <p>Create your CV with different types of templates and color <span class="heading_br"><br></span>
                combinations and also full customization</p>
              <div>
                <?php


                if (@$_SESSION["loginemail"]) {
                ?>
                  <a href="./personal_info.php"> <button>Show template</button></a>
                  <a href="./personal_info.php"> <button class="cv-btn">Create CV or Resume</button></a>
                <?php
                } else {
                ?>
                  <a href="./sign_up.php"> <button>Show template</button></a>
                  <a href="./sign_up.php"> <button class="cv-btn">Create CV or Resume</button></a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="header-image">
              <div class="image">
                <img src="./image/cv.svg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ================Hero-section-End ================== -->

    <!-- ================datails-section-Start ================== -->
    <!-- =========== heading-start ===========  -->

    <div class="contianer-fluid ">

      <!-- =========== heading-Start ============  -->
      <div class="datails-sec">
        <h3>Create a professional Resume and CV with <span>100+</span> <span class="remove"><br></span> templates and fully customize the <span class="remove"><br></span> colors and fonts</h3>

        <!-- =========== heading-End =============  -->
        <div class="container-fluid mt-5">
          <div class="row">
            <div class="col-md-6">

              <!-- =========== Image-Start =============  -->
              <div class="datails-img">
                <div class="image">
                  <img src="./image/cv (1).svg" alt="">
                </div>
              </div>

              <!-- =========== Image-End =============  -->
            </div>
            <div class="col-md-6">
              <div class="details-boxes">
                <div class="details-box">

                  <!-- =========== details-box-1-Start =============  -->
                  <div class="box-1">
                    <div class="text">
                      <i class='bx bxs-download'></i>
                      <h2>Easy to Download</h2>
                    </div>
                  </div>

                  <!-- =========== details-box-1-End ===============  -->

                  <!-- =========== details-box-2-Start =============  -->
                  <div class="box-1 mt-4">
                    <div class="text">
                      <i class='bx bxs-file-blank'></i>
                      <h2>Best Premium template</h2>
                    </div>
                  </div>
                  <!-- =========== details-box-2-End ===============  -->

                  <!-- =========== details-box-3-Start =============  -->
                  <div class="box-1 mt-4">
                    <div class="text">
                      <i class='bx bxs-edit'></i>
                      <h2>Fully Customization</h2>
                    </div>
                  </div>
                  <!-- =========== details-box-3-End ===============  -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ================ datails-section-End ==================== -->

    <!-- ================ Fixed-img-Start ==================== -->
    <div class="container-fluid p-0 mt-4">
      <div class="fix-bg">
        <div class="txt">
          <h1 class="">"Select your favourite template and create your
            <span class="remove"><br></span>professional CV or Resume.
          </h1>
          <?php
          if (@$_SESSION["loginemail"]) {
          ?>
            <a href="./personal_info.php"> <button class="btn mt-3">Create</button></a>

          <?php
          } else {
          ?>
            <a href="./sign_up.php"> <button class="btn mt-3">Create</button></a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <!-- ================ Fixed-img-End =====================-->


    <!-- ================ Templates-start ==================== -->
    <div class="container-fluid mt-5 p-0">
      <div class="template-heading">
        <h1>Our Famous template</h1>
        <div id="myCarousel" class="carousel slide container-fluid" data-bs-ride="carousel">
          <div class="carousel-inner w-100">
            <div class="carousel-item active">
              <div class="col-md-3">
                <div class="card card-body card_body_cv">
                  <img class="img-fluid" src="./image/cv-image.png">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="col-md-3">
                <div class="card card-body card_body_cv">
                  <div class="template-img">
                    <img class=" img-fluid" src="./image/cv-image-2.png">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="col-md-3">
                <div class="card card-body card_body_cv">
                  <!-- <a href="#"><button class="">USe This Template</button></a> -->
                  <img class="img-fluid" src="./image/cv-image.png">
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="col-md-3">
                <div class="card card-body card_body_cv">
                  <img class="img-fluid" src="./image/cv-image-2.png">
                </div>
              </div>
            </div>
          </div>
          <button style="width:80px" class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">

            <span style="color:red;"><i style="font-size:40px" class='bx bx-chevron-left'></i></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button style="width: 80px; " class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
            <span style="color:red;"><i style="font-size:40px" class='bx bx-chevron-right'></i></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
    <!-- ================ Template-End ======================- -->

    <!-- ================ number-animation-Start==================== -->
    <div class="container-fluid p-0 mt-5 mb-5">
      <div class="num-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="downloads-number">
                <h1><span class="num" data-val="35">0</span>K+</h1>
                <h3>Downloads</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="downloads-number">
                <h1><span class="num" data-val="20">0</span>K+</h1>
                <h3>Users</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="downloads-number">
                <h1><span class="num" data-val="100">0</span>K+</h1>
                <h3>Templete</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="downloads-number">
                <h1><span class="num" data-val="100">0</span>K+</h1>
                <h3>Download</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ================ number-animation-End ===================== -->

    <!-- ================ Tips-Text-Start ========  ============= -->
    <div class="container-fluid">
      <div class="tips-content">
        <div class="tip-sec-txt">
          <h1>Tips to create a professional <br> <span> Resume or CV </span></h1>
          <p>Use <span style="color:#283593">premium</span> template for free with a lot of color schemes</p>
          <div class="list">
            <ul>
              <li>Proofread carefully: Check your resume for spelling and grammar errors, and have someone else review it as well.</li>
              <li>Use keywords: Many companies use software to scan resumes for keywords. Make sure to include relevant
                keywords from the job description.</li>

              <li>Be honest: Don't exaggerate your qualifications or experience, and be prepared to back up any claims
                you make on your resume.</li>

              <li>Make it easy to contact you: Include your name, phone number, email address, and LinkedIn profile (if you have one) at the top of your resume.</li>

              <li>Keep it concise and well-organized: Your resume should be easy to read and should not exceed two pages.
                Use bullet points and clear headings to break up the text</li>

              <li>Use a professional format: Choose a clean and modern font, and stick to a professional format. Use a
                template if you're unsure where to start.</li>

              <li>Customize your resume for each job: Tailor your resume to the job you're applying for by highlighting the
                skills and experience that match the job description.</li>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- ================ Tips-Text-End ======================= -->

    <!-- ================ animation-cv-sec-start ======================= -->
    <div class="animation-cv-sec">
      <div class="container-fluid mt-4 mb-4">
        <div class="row">
          <div class="col-md-6">
            <div class="anim-sec-txt">
              <div>
                <h1>Create your professional Resume or CV with <span class="remove"><br></span><span>CV Builders</span></h1>
                <p>Follow step-by-step professional guidance to create <span class="remove"><br></span> a polished cv or resume in minutes.</p>

                <?php
                if (@$_SESSION["loginemail"]) {
                ?>
                  <a href="./personal_info.php"> <button class="">Create your Cv</button></a>

                <?php
                } else {

                ?>
                  <a href="./sign_up.php"> <button class="">Create your Cv</button></a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="col-md-6">

            <div class="animated-img">
              <div class="images">
                <div class="animation">
                  <img src="./image/cv-image.png" alt="">
                  <img src="./image/cv-image-2.png" alt="">
                  <img src="./image/cv-image.png" alt="">
                  <img src="./image/cv-image-2.png" alt="">
                </div>

              </div>
            </div>
          </div>
          <div class="col-12" style="background-color: white ;">
            <div class="animated-img-ph">
              <div class="images img2">
                <img class="img" src="./image/cv-image-2.png" alt="">
                <img class="img" src="./image/cv-image.png" alt="">
                <img class="img" src="./image/cv-image-2.png" alt="">
                <img class="img" src="./image/cv-image.png" alt="">
                <img class="img" src="./image/cv-image-2.png" alt="">
                <img class="img" src="./image/cv-image.png" alt="">

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


    <?php
    if (@$_SESSION["loginemail"]) {
    ?>
      <button style="display: none;"></button>
    <?php
    } else {
    ?>
      <button style="display: none;" id="myButton" type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop"></button>
    <?php
    }
    ?>


    <!-- Modal -->
    <div class="modal sign_in_modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog ">
        <div class="modal-content">

          <div class="modal-body ">
            <h1 style=" cursor: pointer;" class="float-end text-gray" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x'></i></h1>
            <h2 class="mt-4">SIGN UP <span style="color:black" ;>Free</span></h2>
            <p class="mt-2">Sign in or Sign up now and create your professional CV or Resume in an easy way.</p>
            <center><a href="./sign_in.php "><button>SIGN IN</button></a></center>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script>
    function autoClickButton() {
      var button = document.getElementById('myButton');
      setTimeout(function() {
        button.click();
      }, 6000);
    }

    window.addEventListener('load', autoClickButton);
  </script>

<?php
include('includes/footer.php');
include('includes/end_links.php')


?>