<!-- =================== Navbar-Start =================== -->
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <div class="logo">
      <a href="./index.php"><img src="./image/Cv-Builder-Logo.svg" alt="logo"></a>
    </div>
    <span class="nav_collapse navbar-toggler">
      <i data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class='bx bx-menu'></i>
    </span>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto me-auto mb-2 mb-lg-0">
        <!-- ================phone-screen-collapse===================== -->
        <div class="nav_sm_drop p-3">
          <p>
            <a class="" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              CV <span class="float-end"><i class='bx bx-chevron-down'></i></span>
            </a>
          </p>
          <div class="collapse ph_dropdown" id="collapseExample">
            <div class="mt-2">
              <?php
              if (@$_SESSION["loginemail"]) {
              ?>
                <a href="./personal_info.php">Create cv</a>
                <a href="./templates.php">Show cv templete</a>
                <a href="./guide.php">How to create CV</a>
              <?php
              } else {

              ?>
                <a href="./sign_up.php">Create cv</a>
                <a href="./sign_up.php">Show cv templete</a>
                <a href="./guide.php">How to create CV</a>

              <?php

              }
              ?>
            </div>
          </div>
        </div>
        <!-- ================phone-screen-collapse===================== -->
        <!-- ================phone-screen-collapse===================== -->
        <div class="nav_sm_drop pe-3 ps-3">
          <p>
            <a class="" data-bs-toggle="collapse" href="#collaps" role="button" aria-expanded="false" aria-controls="collapseExample">
              Resume <span class="float-end"><i class='bx bx-chevron-down'></i></span>
            </a>
          </p>
          <div class="collapse ph_dropdown" id="collaps">
            <div class="mt-2">
              <?php
              if (@$_SESSION["loginemail"]) {
              ?>
                <a href="./personal_info.php">Create Resume</a>
                <a href="./templates.php">Show resume templete</a>
                <a href="./guide.php">How to create resume</a>


              <?php

              } else {
              ?>

                <a href="./sign_up.php">Create Resume</a>
                <a href="./sign_up.php">Show resume templete</a>
                <a href="./guide.php">How to create resume</a>

              <?php

              }

              ?>
            </div>
          </div>
        </div>

        <div class="nav_sm_drop pe-3 ps-3 pt-4">
          <p>
            <a class="" data-bs-toggle="collapse" href="#colla" role="button" aria-expanded="false" aria-controls="collapseExample">
              Others <span class="float-end"><i class='bx bx-chevron-down'></i></span>
            </a>
          </p>
          <div class="collapse ph_dropdown" id="colla">
            <div class="mt-2">
              <?php
              if (@$_SESSION["loginemail"]) {
              ?>
                <a href="./blog.php">blogs</a>
                <!-- <a href="./users/">Setting</a> -->
                <a href="./guide.php">How to create resume</a>

              <?php

              } else {
              ?>

                <a href="./blog.php">blogs</a>
                <!-- <a href="./sign_up.php">Setting</a> -->
                <a href="./guide.php">How to create resume</a>
              <?php

              }
              ?>

            </div>
          </div>
        </div>
        <!-- ================phone-screen-collapse===================== -->

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            CV
          </a>
          <?php
          if (@$_SESSION["loginemail"]) {
          ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./personal_info.php">Create</a></li>
              <li><a class="dropdown-item" href="./templates.php">Templete</a></li>
              <li><a class="dropdown-item" href="./guide.php">How to create CV</a></li>
            </ul>
          <?php

          } else {
          ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./sign_up.php">Create</a></li>
              <li><a class="dropdown-item" href="./sign_up.php">Templete</a></li>
              <li><a class="dropdown-item" href="./guide.php">How to create CV</a></li>
            </ul>
          <?php
          }
          ?>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Resume
          </a>
          <?php
          if (@$_SESSION["loginemail"]) {
          ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./personal_info.php">Create</a></li>
              <li><a class="dropdown-item" href="./templates.php">Templete</a></li>
              <li><a class="dropdown-item" href="./guide.php">How to create Resume</a></li>
            </ul>
          <?php

          } else {
          ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./sign_up.php">Create</a></li>
              <li><a class="dropdown-item" href="./sign_up.php">Templete</a></li>
              <li><a class="dropdown-item" href="./guide.php">How to create Resume</a></li>
            </ul>

          <?php
          }
          ?>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Others
          </a>
          <?php
          if (@$_SESSION["loginemail"]) {
          ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./blog.php">BLog</a></li>
              <!-- <li><a class="dropdown-item" href="./users/">Setting</a></li> -->
              <li><a class="dropdown-item" href="./privacypolicy.php">Privacy & Policy </a></li>
            </ul>
          <?php

          } else {
          ?>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./blog.php">BLog</a></li>
              <!-- <li><a class="dropdown-item" href="./sign_up.php">Setting</a></li> -->
              <li><a class="dropdown-item" href="./privacypolicy.php">Privacy & Policy </a></li>
            </ul>

          <?php
          }
          ?>
        </li>

      </ul>
      <div style="display: flex;justify-content: flex-end; ">
        <div class="lan_dropdown">
          <div class="btn-group dropstart">
            <img class="flag_img" id="navbarflag" src="./image/usa.svg" data-bs-toggle="dropdown" aria-expanded="false">

            <ul class="dropdown-menu">
              <li>
                <p class="lan_flag" flag="en"><img style="width:25px" src="./image/usa.svg"><span>English</span></p>
              </li>
              <li>
                <p class="lan_flag" flag="ar"><img style="width:30px" src="./image/sa.svg"><span>Arabic</span></p>
              </li>
              <li>
                <p class="lan_flag" flag="ar"><img style="width:30px" src="./image/sa.svg"><span>Arabic</span></p>
              </li>
            </ul>
          </div>
        </div>

        <?php


        if (@!$_SESSION["loginemail"]) {

          echo '  <a href="./sign_in.php" ><button class="sign_in_btn">Sign in</button></a>';
        } else {
          echo '<div class="user_details_dropdown">' . @$_SESSION["loginemail"] . '  </div> ';
        }

        ?>


      </div>
    </div>
  </div>
</nav>

<!-- =================== Navbar-End ===================== -->