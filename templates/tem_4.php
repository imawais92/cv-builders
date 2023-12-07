<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  .container {
    width: 210mm;
    margin: 0 auto;
    height: 296.5mm;
    position: relative;
    display: grid;
    grid-template-columns: 140mm 70mm;
    position: relative;
  }

  .long {
    background-color: aliceblue;
    width: 100%;
    height: 296.5mm;
    position: relative;
  }

  .short {
    background-color: black;
  }

  .circle {
    background-color: black;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    position: absolute;
    left: 30px;
    z-index: 2;
  }

  .profile {
    position: relative;
  }

  .profile img {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    position: absolute;
    top: 10px;
    left: 10px;
  }

  .length_rectangle {
    background-color: #f39c12;
    width: 695px;
    height: 120px;
    position: relative;
    top: 50px;
    left: 100px;
  }

  .username {
    color: black;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 2;
    color: white;
    text-transform: uppercase;
    overflow: hidden;
  }

  .light {
    font-weight: 500;
  }

  .title {
    background-color: #f39c12;
    width: 90%;
    margin-top: 120px;
    text-align: end;
    padding-right: 30px;
    padding: 5px;
  }

  .title h1 {
    letter-spacing: 2.5px;
    font-weight: 600;
    font-size: 24px;
  }

  .main {
    width: 80%;
    margin: 20px auto;
    display: grid;
    align-items: center;
    justify-content: center;
    grid-template-columns: 50% auto;
  }

  .box {
    background-color: #f39c12;
    width: 20px;
    height: 20px;
  }

  .phli {
    display: flex;
    align-items: center;
    text-transform: uppercase;
    gap: 10px;
    font-size: 14px;
  }

  .dosri h1 {
    font-size: 14px;
    text-transform: uppercase;
    font-weight: bold;
    font-weight: 400;
  }

  .dosri p {
    font-size: 12px;
    font-weight: 400;
    text-align: justify;
  }

  .experience_main {
    width: 80%;
    margin: 20px auto;

    display: grid;
    align-items: center;
    justify-content: center;
    grid-template-columns: 50% auto;
  }

  .title_experience {
    background-color: #f39c12;
    width: 90%;
    text-align: end;
    padding-right: 30px;
    padding: 5px;
    margin-top: 40px;
  }

  .title_experience h1 {
    letter-spacing: 2.5px;
    font-weight: 600;
    font-size: 24px;
  }

  .contact_main {
    color: white;
    margin-top: 200px;
    width: 100%;
  }

  .contact_title {
    border: #f39c12 2px solid;
    width: 90%;
    margin: 0 auto;
    padding: 5px;
    text-transform: uppercase;
    text-align: center;
  }

  .contact_title span {
    font-size: 14px;
    letter-spacing: 0.5mm;
  }

  .adress_main {
    display: grid;
    grid-template-columns: 20% auto;
    align-items: center;
    width: 90%;
    margin: 15px auto;
    padding: 5px;
  }

  .icon {
    font-size: 20px;
    color: #f39c12;
  }

  .adress span {
    font-size: 15px;
    text-transform: uppercase;
  }

  .adress p {
    font-size: 12px;
    text-transform: capitalize;
    font-weight: 400;
  }

  .web_main {
    display: grid;
    grid-template-columns: 20% auto;
    align-items: center;
    width: 90%;
    margin: 10px auto;
    padding: 5px;
  }

  .world {
    font-size: 15px;
    text-transform: uppercase;
  }

  .world span {
    font-size: 15px;
    text-transform: uppercase;
  }

  .world p {
    font-size: 12px;
    text-transform: capitalize;
    font-weight: lighter;
    font-weight: 400;
  }

  .phone_main {
    display: grid;
    grid-template-columns: 20% auto;
    align-items: center;

    width: 90%;
    margin: 10px auto;
    padding: 5px;
  }

  .Phone {
    font-size: 15px;
    text-transform: uppercase;
  }

  .Phone span {
    font-size: 15px;
    text-transform: uppercase;
  }

  .Phone p {
    font-size: 15px;
    text-transform: capitalize;
    font-weight: 300;
  }

  .skills_title {
    border: #f39c12 2px solid;
    width: 90%;
    margin: 40px auto;
    padding: 5px;
    text-transform: uppercase;
    text-align: center;
    color: white;
    font-size: 14px;
  }

  #file {
    accent-color: #f39c12;
    padding: 14px;
  }

  .skills_bar {
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .skills_bar label {
    font-size: 14px;
    display: block;
  }

  .illustration {
    color: white;
    text-align: center;
    text-transform: uppercase;
  }

  .Photoshop {
    color: white;
    text-align: center;
    text-transform: uppercase;
  }

  .design {
    color: white;
    text-align: center;
    text-transform: uppercase;
  }

  .ms_word {
    color: white;
    text-align: center;
    text-transform: uppercase;
  }

  .hobbies_list {
    color: #f39c12;
  }

  .hobbies_list ul {

    text-transform: capitalize;
    margin-left: 40px;
  }

  .hobbies_list li {
    font-size: 16px;
    margin-top: 10px;
  }

  .hobbies_list li span {
    color: white;
  }
</style>
<div id="content">
  <div class="container">
    <div class="long">
      <?php
      if ($data->per_info->user_img) {
      ?>
        <div class="circle">
          <div class="profile">
            <img src="./uploads/images/<?= $data->per_info->user_img ?>" alt="" />
          </div>
        </div>
      <?php
      }
      ?>
      <div class="length_rectangle">
        <div class="username">
          <h1><?= ucfirst($data->per_info->fname) ?> <?= ucfirst($data->per_info->lname) ?></h1>
          <span class="light"><?= ucwords($data->per_info->profession) ?></span>
        </div>
      </div>
      <!-- education  -->
      <section class="education">
        <div class="title">
          <h1>Education</h1>
        </div>
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
          <div class="main">
            <div class="phli">
              <div class="box"></div>
              <div>
                <span> <?= date("M Y", strtotime($data->education[$i]->deg_st_date)) ?> - <?= $newFormat ?></span><br />
                <span><?= ucwords($data->education[$i]->dagree) ?></span>
              </div>
            </div>
            <div class="dosri">
              <h1><?= ucwords($data->education[$i]->instutute_name) ?> </h1>
              <p>
                <?= ucfirst($data->education[$i]->field) ?>
              </p>
            </div>
          </div>
        <?php
        }
        ?>
      </section>
      <!-- experience section start -->
      <section class="education">
        <div class="title_experience">
          <h1>Experience</h1>
        </div>
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
          <div class="experience_main">
            <div class="phli">
              <div class="box"></div>
              <div>
                <span><?= date(" M Y ", strtotime($data->work_exp[$i]->work_st_data)) ?> - <?= $wenddata ?></span><br />
                <span> <?= ucwords($data->work_exp[$i]->role) ?></span>
              </div>
            </div>
            <div class="dosri">
              <h1><?= ucfirst($data->work_exp[$i]->company_name) ?></h1>
              <p>
                <?= ucfirst($data->work_exp[$i]->city_country) ?>
              </p>
            </div>
          </div>

        <?php
        }
        ?>
        <!-- 1st end -->
      </section>

      <!-- experience end -->
    </div>
    <div class="short">
      <section class="contact_main">
        <div class="contact_title">
          <span>Contact Me</span>
        </div>
        <!-- 1st div -->
        <div class="adress_main">
          <div><i class="fa-solid fa-location-dot icon"></i></div>
          <div class="adress">
            <span>Adress</span>
            <p><?= ucfirst($data->per_info->country) ?>
              <?= ucfirst($data->per_info->city) ?></p>
          </div>
        </div>
        <!-- 2nd div -->
        <div class="web_main">
          <div><i class="fa-solid fa-globe icon"></i></div>
          <div class="world">
            <span>web</span>
            <p style="word-break: break-all;"><?= ucfirst($data->per_info->email) ?><br> <?= ucfirst($data->per_info->website) ?></p>
          </div>
        </div>
        <!-- 3rd div -->
        <div class="phone_main">
          <div><i class="fa-solid fa-phone icon"></i></div>
          <div class="world">
            <span>phone</span>
            <p><?= ucfirst($data->per_info->per_no) ?></p>
          </div>
        </div>
        <!-- end -->
      </section>
      <!-- skills sections -->
      <section class="skills_main">
        <div class="skills_title">
          <span>skills Pro</span>
        </div>

        <div class="skills_bar">
          <?php
          for ($i = 0; $i < count($data->skills); $i++) {
            switch ($data->skills[$i]->skill_per) {
              case 'Beginner':
                $val = 25;
                break;
              case 'Skillful':
                $val = 50;
                break;
              case 'Experienced':
                $val = 75;
                break;
              case 'Expert':
                $val = 98;
                break;
              default:
                $val = 10;
                break;
            }
          ?>
            <div class="illustration">
              <label for="file"><?= ucfirst($data->skills[$i]->skill) ?></label>
              <progress id="file" value="<?= $val ?>" max="100">32%</progress>
            </div>
          <?php
          }
          ?>
        </div>
      </section>

      <!-- hobbies section -->
      <section class="hobbies_main">
        <div class="skills_title">
          <span>hobbies</span>
        </div>
        <div class="hobbies_list">
          <ul>
            <?php
            for ($i = 0; $i < count($data->hobbies); $i++) {
            ?>
              <li><span> <?= ucfirst($data->hobbies[$i]->hobby) ?></span></li>
            <?php
            }
            ?>

        </div>
    </div>
    </section>
  </div>
</div>