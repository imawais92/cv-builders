<!-- ================ Footer-Start ======================= -->


<footer class="text-center text-lg-start text-white" style="background-color: black">
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
  <section class="pt-1">
    <div class="container text-center text-md-start mt-5">

      <div class="row mt-3">

        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <h6 class="text-uppercase fw-bold">CV Making</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p>
            Create your CV in some simple steps. Just write your information, choose your favourite template and download it in pdf.
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Products</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p>
            <a href="#!" class="text-white">CV Builders</a>
          </p>
          <p>
            <a href="#!" class="text-white">..............</a>
          </p>
          <p>
            <a href="#!" class="text-white">................</a>
          </p>
          <p>
            <a href="#!" class="text-white">.....................</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold">Useful links</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p>
            <?php
            if (@$_SESSION["loginemail"]) {
            ?>
              <a href="./users/" class="text-white">Settings</a>

            <?php
            } else {
            ?>
              <a href="./sign_up.php" class="text-white">Settings</a>
            <?php

            } ?>
          </p>
          <p>
            <a href="./privacypolicy.php" class="text-white">Privacy & Policy</a>
          </p>

        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p><i class="fas fa-home mr-3"></i> Faisalabad Punjab Pakistan</p>
          <p><i class="fas fa-envelope mr-3"></i> info@cvbuilders.com</p>
          <p><i class="fas fa-phone mr-3"></i> + 92 3196631466</p>
          <p><i class="fas fa-print mr-3"></i> + 92 3196631466</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2023 Copyright:The Product By
    <a class="text-white" href="https://thewebconcept.com/" target="_blank">thewebconcept.com</a>
  </div>
</footer>
<!-- ================ Footer-End ======================= -->