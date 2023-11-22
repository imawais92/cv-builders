<style>
  @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Lato', sans-serif;
  }


  :root {
    --primary-color: #323B4C;
    --light-color: #ffffff;
    --dark-color: black;

  }

  .container {
    width: 210mm;
    min-height: 296.5mm;
    display: grid;
    grid-template-columns: 240px 1fr;
    border: 1px solid black;
    margin: auto;

  }

  .sec-1 {
    background-color: var(--primary-color);
    height: 100%;
  }

  .image-sec {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .image-sec img {
    width: 180px;
    height: 180px;
    object-fit: cover;
    margin-top: 2rem;
    border: 18px solid #3E4D69;
    border-radius: 50%;
  }

  .content {
    margin: 1rem 0 0 1.8rem;
  }

  .content .heading {
    padding: 8px 0;
    border-bottom: 2px solid var(--light-color);
  }

  .content .heading h5 {
    color: var(--light-color);
    font-size: 16px;
    font-weight: bold;

  }



  .per-info .icon-sec {
    margin-top: 16px;
    display: grid;
    grid-template-columns: 2rem 1fr;
    color: var(--light-color);
    align-content: center;

  }

  .per-info .icon-sec p {
    font-size: 13px;
    word-break: break-all;
  }

  .per-info .icon-sec i {
    font-size: 15px;
  }

  .edu-sec {
    margin-top: 40px;
  }

  .edu .content {
    color: var(--light-color);
    margin: 0;
    line-height: 24px;
  }

  .edu .content h5 {
    margin-top: 10px;
    font-size: 15px;
  }

  .edu .content h6 {
    font-size: 12px;
    font-weight: 900;
  }

  .edu .content p {
    font-size: 12px;
    font-weight: 700;

  }

  .skill .content {
    margin: 0;
  }


  .skill .content ul {
    line-height: 26px;
    margin-top: 10px;
    margin-left: 18px;
  }

  .skill .content li {
    color: var(--light-color);
    font-size: 13px;
  }

  .lan .content {
    margin: 0;
    line-height: 30px;
    color: var(--light-color);
  }

  .lan .content p {
    font-size: 13px;
  }

  .sec-2 {
    padding: 20px;
  }

  .name-sec h1 {
    font-size: 50px;
    color: var(--primary-color);
    font-weight: 900;
    text-transform: capitalize;
  }

  .name-sec p {
    color: var(--primary-color);
    text-transform: capitalize;
    letter-spacing: 0.50px;
    margin-left: 5px;
    margin-top: 6px;

  }

  .sec-heading {
    margin-top: 10px;
  }

  .sec-heading .heading h3 {
    color: var(--primary-color);
    border-bottom: 2px solid var(--primary-color);
    margin-top: 20px;
    padding: 10px 0;

  }

  .sec-2 .ab-info p {
    font-size: 14px;
    margin-top: 10px;
    line-height: 20px;
    text-align: justify;
  }

  .work-info {
    margin-top: 12px;

  }

  .work-info .com-name {
    font-size: 15px;
    margin-top: 4px;
  }

  .work-info h4 {
    font-size: 14px;
    margin-top: 4px;
  }

  .work-info p {
    font-size: 14px;
    margin-top: 10px;
    line-height: 20px;
    text-align: justify;
  }

  .reference-sec {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }
</style>


<div id="content">
  <div class="container">


    <div class="sec-1">
      <?php
      if ($data->per_info->user_img) {
      ?>

        <div class="image-sec">
          <img src="./uploads/images/<?= $data->per_info->user_img ?>" alt="your image">
        </div>

      <?php

      }
      ?>
      <div class="content">
        <!-- ====perinfo===== -->
        <div>
          <div class="heading">
            <h5>Contact</h5>
          </div>
          <div class="per-info">
            <div class="icon-sec">
              <h5><i class="fa-solid fa-envelope"></i></h5>
              <p><?= $data->per_info->email ?> </p>
            </div>
            <div class="icon-sec">
              <h5><i class="fa-solid fa-phone"></i></h5>
              <p><?= $data->per_info->per_no ?></p>
            </div>
            <div class="icon-sec">
              <h5><i class="fa-solid fa-location-dot"></i></h5>
              <p><?= $data->per_info->country ?>
                <?= $data->per_info->city ?></p>
            </div>
            <?php
            if (isset($data->per_info->website) && !empty($data->per_info->website)) {
            ?>
              <div class="icon-sec">
                <h5><i class="fa-solid fa-globe"></i></h5>
                <p><?= $data->per_info->website ?></p>
              </div>
            <?php
            }
            ?>
          </div>
        </div>


        <!-- ====edu===== -->
        <div class="edu-sec">
          <div class="heading">
            <h5>Education</h5>
          </div>
          <?php
          for ($i = 0; $i < count($data->education); $i++) {
            $edupre =  $data->education[$i]->edu_present;
            if ($edupre == 0) {
              $edupre = $data->education[$i]->deg_end_date;
            } else {
              $edupre = "Present";
            }
          ?>
            <div class="edu">
              <div class="content">
                <h5><?= $data->education[$i]->dagree ?></h5>
                <h6> <?= $data->education[$i]->instutute_name ?> </h6>
                <p> <?= $data->education[$i]->deg_st_date ?> - <?= $edupre ?></p>
              </div>
            </div>
          <?php
          }
          ?>
          <!-- ====skill===== -->
          <div class="edu-sec">
            <div class="heading">
              <h5>Skills</h5>
            </div>

            <div class="skill">
              <div class="content">
                <ul>
                  <?php
                  for ($i = 0; $i < count($data->skills); $i++) {
                  ?>
                    <li> <?= $data->skills[$i]->skill ?></li>
                  <?php
                  }
                  ?>

                </ul>
              </div>
            </div>
          </div>

          <!-- ====hobbois===== -->
          <div class="edu-sec">
            <div class="heading">
              <h5>Hobbies</h5>
            </div>

            <div class="skill">
              <div class="content">
                <ul>
                  <?php
                  for ($i = 0; $i < count($data->hobbies); $i++) {
                  ?>
                    <li> <?= $data->hobbies[$i]->hobby ?></li>
                  <?php
                  }
                  ?>

                </ul>
              </div>
            </div>
          </div>

          <!-- ====language===== -->
          <div class="edu-sec">
            <div class="heading">
              <h5>Language</h5>
            </div>

            <div class="lan">
              <div class="content">
                <div style="margin-top:10px">
                  <?php
                  for ($i = 0; $i < count($data->languages); $i++) {
                  ?>
                    <p> <?= $data->languages[$i]->language ?></p>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="sec-2">

      <div class="name-sec">
        <h1><?= ucfirst($data->per_info->fname) ?> <?= ucfirst($data->per_info->lname) ?></h1>
        <p><?= $data->per_info->profession ?></p>
      </div>

      <div class="sec-heading">
        <div>
          <div class="heading">
            <h3>About Me</h3>
          </div>
          <div class="ab-info">
            <p> <?= ucfirst($data->per_info->about_us) ?></p>
          </div>
        </div>

        <div>
          <div class="heading">
            <h3>Work Experience</h3>
          </div>
          <?php
          for ($i = 0; $i < count($data->work_exp); $i++) {
            $pre = $data->work_exp[$i]->present;
            if ($pre == 0) {
              $pre = $data->work_exp[$i]->work_end_date;
            } else {
              $pre = "Present";
            };
          ?>
            <div class="work-info">
              <h5> <?= $data->work_exp[$i]->work_st_data ?> - <?= $pre ?></h5>
              <p class="com-name"> <?= ucfirst($data->work_exp[$i]->company_name) ?> </p>
              <h4><?= $data->work_exp[$i]->role ?></h4>
              <p> <?= $data->work_exp[$i]->city_country ?></p>
            </div>
          <?php
          }
          ?>
        </div>


        <?php
        if (isset($data->user_references) && !empty($data->user_references)) {
        ?>
          <div>
            <div class="heading">
              <h3>References</h3>
            </div>
            <div class="work-info">
              <ul class="reference-sec">
                <?php
                for ($i = 0; $i < count($data->user_references); $i++) {
                ?>
                  <li style="margin-left: 20px;">
                    <h4><?= $data->user_references[$i]->user_reference ?></h4>
                  </li>
                <?php
                }
                ?>
              </ul>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>