<!-- ================ Footer-Start ======================= -->


<footer class="text-center text-lg-start text-white" style="background-color: black">
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
  <section class="pt-1">
    <div class="container text-center text-md-start mt-5">

      <div class="row mt-3">

        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

          <h6 class="text-uppercase fw-bold"><?=  $translations['CV BUILDERS']?></h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p>
          <?=  $translations['footer_title1']?>
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold"><?=  $translations['PRODUCTS']?></h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p>
            <a href="#!" class="text-white"><?=  $translations['Cv_Builders']?></a>
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
          <h6 class="text-uppercase fw-bold"><?=  $translations['USEFUL_LINKS']?></h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p>
            <a href="./contact.php" class="text-white"><?=  $translations['Contact_us']?></a>
          </p>
          <p>
            <?php
            if (@$_SESSION["loginemail"]) {
            ?>
              <a href="" class="text-white">Settings</a>

            <?php
            } else {
            ?>
              <a href="./sign_up.php" class="text-white"><?=  $translations['Settings']?></a>
            <?php

            } ?>
          </p>
          <p>
            <a href="./privacypolicy.php" class="text-white"><?=  $translations['Privacy_&_Policy']?></a>
          </p>

        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold">Contact</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 80px; background-color:#C21010 ; height: 5px" />
          <p><i class="fas fa-home mr-3"></i> Faisalabad Punjab Pakistan</p>
          <p><i class="fas fa-envelope mr-3"></i> <a href="mailto:info@cvbuilders.com">info@cvbuilders.com</a></p>
          <p><i class="fas fa-phone mr-3"></i> <a href="tel:+923196631466">+ 92 3196631466</a></p>
          <p><i class="fa-brands fa-whatsapp mr-3"></i><a href="https://wa.me/923196631466" target="_blank"> + 92 3196631466 </a></p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
  <?=  $translations['copyright']?>
    <a class="text-white" href="https://thewebconcept.com/" target="_blank">thewebconcept.com</a>
  </div>
</footer>
<!-- ================ Footer-End ======================= -->