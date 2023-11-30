<style>
  @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400&display=swap");

  * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
  }

  .Grid_Container {
    width: 210mm;
    min-height: 296.5mm;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 330px auto;
    background-color: aliceblue;
    border-right: 1px solid #27384c;
  }

  .item_1 {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .rectangle {
    width: 200px;
    height: 200px;
    background-color: #27384c;
    position: absolute;
    z-index: 1;
  }

  .circle {
    width: 250px;
    height: 250px;
    border-radius: 100%;
    background-color: white;
    position: absolute;
    top: 40px;
    left: 50px;
    outline: #27384c;
    z-index: 2;
  }

  .circle img {
    width: 230px;
    height: 230px;
    border-radius: 100%;
    position: absolute;
    object-fit: cover;
    top: 10px;
    left: 10px;
  }

  .Name {
    padding-left: 10px;
    text-transform: uppercase;
    font-weight: bolder;
    font-size: x-large;
  }

  .usman {
    padding-left: 50px;
  }

  .about {
    color: #27384c;

    margin-top: 300px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  p {
    font-size: 12px;
    color: gray;
  }

  .about_inner {
    width: 70%;
  }

  .about_inner span {
    font-weight: 600;
  }

  .conatct_us {
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 18px;
    font-weight: 400;
    font-size: 12px;
  }

  .conatct_us i {
    color: #27384c;
  }

  .call {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .Email {
    display: flex;
    align-items: center;

    gap: 12px;
  }

  .adress {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .fa-solid {
    font-size: 20px;
  }

  .blue {
    background-color: #27384c;
    color: white;
    font-size: 15px;
    text-align: center;
    font-weight: 600;
    padding: 5px;
    text-transform: uppercase;
    letter-spacing: 0.9px;
    margin-top: 10px;
  }

  .lang_inner {
    font-weight: 400;
    width: 70%;
    margin: 0 auto;
    font-size: 13px;
  }

  .un-list li {
    margin: 10px 0;
  }

  .title {
    font-size: 15px;
    text-align: end;
    width: 90%;
    margin-left: 60px;
  }

  .Experience {
    width: 70%;
    margin: 0 auto;
    margin-top: 80px;
  }

  .details {
    font-weight: 600;
    font-size: 12px;
    margin-top: 10px;
  }

  .highlights {
    font-weight: bold;
    font-size: 13px;
    margin-top: 5px;
  }

  .exp_main {
    display: flex;
    flex-direction: column;
    gap: 18px;
  }

  .w-e-details {
    margin-top: 10px;
  }

  .w-e-details p {
    margin: 5px 10px;
    color: black;
    line-height: 19px;
  }

  .edu_main {
    display: flex;
    flex-direction: column;
  }

  .education {
    width: 70%;
    margin: 0 auto;
  }
</style>
<div id="content">
  <div class="Grid_Container">
    <div class="item_1">
      <div class="rectangle"></div>
      <?php
      if ($data->per_info->user_img) {
      ?>

        <div class="circle">
          <img src="./uploads/images/<?= $data->per_info->user_img ?>" />
        </div>
      <?php

      }
      ?>
      <!-- ABOUT -->
      <div class="about">
        <div class="about_inner">
          <span>About Me</span>
          <p> <?= ucfirst($data->per_info->about_us) ?></p>
        </div>
      </div>
      <!-- conact us  -->
      <div class="conatct_us">
        <div class="call">
          <div><i class="fa-solid fa-phone"></i></div>
          <div><span><?= ucfirst($data->per_info->per_no) ?></span></div>
        </div>
        <!-- Email -->
        <div class="Email">
          <div><i class="fa-solid fa-envelope"></i></div>
          <div><span><?= ucfirst($data->per_info->email) ?></span></div>
        </div>
        <!-- adress -->
        <div class="adress">
          <div><i class="fa-solid fa-address-book"></i></div>
          <div><span><?= ucfirst($data->per_info->city) ?> <?= ucfirst($data->per_info->country) ?></span></div>
        </div>


      </div>
      <!-- Languages -->
      <div class="Languages">
        <div class="lang_inner">
          <h1 class="blue">Language</h1>
          <div class="un-list">
            <ul>
              <?php
              for ($i = 0; $i < count($data->languages); $i++) {
              ?>
                <li><?= ucfirst($data->languages[$i]->language) ?></li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>



      </div>
      <!-- Epertise -->
      <div class="Expertise">

        <div class="lang_inner">
          <h1 class="blue">Expertise</h1>
          <div>
            <ul class="un-list">
              <?php
              for ($i = 0; $i < count($data->skills); $i++) {
              ?>
                <li> <?= ucfirst($data->skills[$i]->skill) ?></li>
              <?php
              }
              ?>

            </ul>
          </div>
        </div>

      </div>

      <!-- Hobbies -->
      <div class="Expertise">

        <div class="lang_inner">
          <h1 class="blue">Hobbies</h1>
          <div class="un-list">
            <ul>
              <?php
              for ($i = 0; $i < count($data->hobbies); $i++) {
              ?>
                <li> <?= ucfirst($data->hobbies[$i]->hobby) ?></li>
              <?php
              }
              ?>

            </ul>

          </div>
        </div>

      </div>

    </div>
    <div class="item_2">
      <div class="Name">
        <h1><?= ucfirst($data->per_info->fname) ?> <br> <span class="usman"><?= ucfirst($data->per_info->lname) ?></span></h1>
        <span class="title"><?= ucwords($data->per_info->profession) ?></span>
      </div>

      <!-- Experience -->
      <div>
        <div class="Experience">
          <h1 class="blue">Work Experience</h1>
          <div class="exp_main">
            <?php
            for ($i = 0; $i < count($data->work_exp); $i++) {
              $pre = $data->work_exp[$i]->present;
              if ($pre == 0) {
                $pre = $data->work_exp[$i]->work_end_date;
                $wenddata = date("M Y", strtotime($pre));
              } else {
                $wenddata = "Present";
              };
            ?>
              <div class="w-e-details">
                <div class="details"><span><?= ucwords($data->work_exp[$i]->role) ?></span> <span style="float: right;"><?= date(" M Y ", strtotime($data->work_exp[$i]->work_st_data)) ?> - <?= $wenddata ?></span>
                </div>
                <div class="highlights"><span> <?= ucfirst($data->work_exp[$i]->company_name) ?>
                  </span></div>
                <p><?= ucfirst($data->work_exp[$i]->city_country) ?></p>
              </div>
            <?php
            }
            ?>

          </div>
        </div>

      </div>

      <!-- Education -->
      <div>
        <div class="education">
          <h1 class="blue">Education</h1>
          <div class="edu_main">
            <?php
            for ($i = 0; $i < count($data->education); $i++) {
              $edupre =  $data->education[$i]->edu_present;
              if ($edupre == 0) {
                $edupre = $data->education[$i]->deg_end_date;
                $newFormat = date("M Y", strtotime($edupre));
              } else {
                $newFormat = "Present";
              }

            ?>
              <div class="w-e-details">
                <div class="details"><span><?= ucwords($data->education[$i]->dagree) ?></span> <span style="float: right;"><?= date("M Y", strtotime($data->education[$i]->deg_st_date)) ?> - <?= $newFormat ?></span>
                </div>
                <div class="highlights"><span><?= ucwords($data->education[$i]->instutute_name) ?></span></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sit amet quam rhoncus, egestas dui
                  eget, malesuada justo. Ut aliquam augue.</p>
              </div>
            <?php
            }
            ?>

          </div>
        </div>

      </div>
      <!-- education end -->

    </div>
  </div>
</div>