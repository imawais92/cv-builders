<?php
if ($_SESSION['my_data'] == 2) {
?>
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
      min-height: 297mm;
      display: grid;
      grid-template-columns: 240px 1fr;

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

    .sec-2 {
      background-color: black;
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

    .lan .content p{
     font-size: 13px;
    }
  </style>


  <div id="content">
    <div class="container">


      <div class="sec-1">
        <div class="image-sec">
          <img src="./uploads/images/trash.png" alt="your image">
        </div>
        <div class="content">
          <!-- ====perinfo===== -->
          <div>
            <div class="heading">
              <h5>Contact</h5>
            </div>
            <div class="per-info">
              <div class="icon-sec">
                <h5><i class="fa-solid fa-envelope"></i></h5>
                <p>hello@reallygreatsite.com </p>
              </div>
              <div class="icon-sec">
                <h5><i class="fa-solid fa-phone"></i></h5>
                <p>+123-456-7890</p>
              </div>
              <div class="icon-sec">
                <h5><i class="fa-solid fa-location-dot"></i></h5>
                <p>123 Anywhere St., Any City</p>
              </div>
              <div class="icon-sec">
                <h5><i class="fa-solid fa-globe"></i></h5>
                <p>Www.freecvbuilders.com</p>
              </div>
            </div>
          </div>


          <!-- ====perinfo===== -->
          <div class="edu-sec">
            <div class="heading">
              <h5>Education</h5>
            </div>

            <div class="edu">
              <div class="content">
                <h5>Master of Business</h5>
                <h6>Wardiere University</h6>
                <p>2011 - 2015</p>
              </div>
            </div>

            <div class="edu">
              <div class="content">
                <h5>BA Sales and Commerce</h5>
                <h6>Wardiere University</h6>
                <p>2011 - 2015</p>
              </div>
            </div>

            <!-- ====skill===== -->
            <div class="edu-sec">
              <div class="heading">
                <h5>Skills</h5>
              </div>

              <div class="skill">
                <div class="content">
                  <ul>
                    <li>Web development</li>
                    <li>UI UX</li>
                    <li>Marketing strategy</li>
                    <li>ROI Calculations</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- ====skill===== -->
            <div class="edu-sec">
              <div class="heading">
                <h5>Language</h5>
              </div>

              <div class="lan">
                <div class="content">
                <p>English</p>
                <p>English</p>
                </div>
              </div>
            </div>


          </div>
        </div>


        <div class="sec-2">

        </div>
      </div>
    </div>
  <?php
}
  ?>