<?php
$data = file_get_contents('res.txt');
$data = json_decode($data);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>

<body>


  <style>
    * {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      box-sizing: border-box;
    }

    .container {
      min-height: 296.5mm;
      width: 212mm;
      background-color: white;
      display: grid;
      grid-template-columns: 30% 70%;
      /* grid-template-columns: 1fr 2fr; */
      margin: 0;
    }

    .left-column {
      margin: 0;
      padding: 20px;
      background-color: #e09203;
      color: white;
    }

    h1 {
      font-size: 36px;
    }

    h2 {
      font-size: 24px;
    }

    .right-column {
      padding: 20px;
      background-color: #333;
    }

    .section {
      margin-bottom: 20px;
    }

    .section:last-child {
      margin-bottom: 0;
    }

    .section h2 {
      color: #333;
    }

    .section p {
      line-height: 1.6;
    }

    .section ul {
      list-style: square;
      padding-left: 20px;
    }
  </style>
  <h1>hello</h1>
  <button id="createpf" class="btn btn-danger">Create PDF</button>
  <div id="content">
    <div class="container">
      <div class="left-column">
        <header style="text-align: center;">
          <img src="img/img-removebg-preview.png" alt="" width="80%">
        </header>
        <header style="margin-top:50px;">
          <h2 style="background-color: #333; color: white;padding-left: 5px;">Contact</h2>
        </header>
        <!-- ===========contaact============ -->
        <div class="section" style="margin-top:10px;">
          <table>
            <tr>
              <td> <img src="img/email (1).png" alt="" width="20px"></td>
              <td style="word-wrap: break-word;"> <span>
                  <?= $data->per_info->email ?>
                </span> </td>

            </tr>
          </table>
          <div class="contact-item">
          </div>
          <div class="contact-item">
            <img src="img/blocked-call.png" alt="" width="20px">
            <span>
              <?= $data->per_info->per_no ?>
            </span>
          </div>
          <div class="contact-item">
            <img src="img/location.png" alt="" width="20px">
            <span>
              <?= $data->per_info->country ?>
              <?= $data->per_info->city ?>
            </span>
          </div>
        </div>
        <!-- ===========skill============= -->
        <div class="section">
          <h2 style="background-color: #333; color: white;padding-left: 5px;">Skill</h2>
          <ul style="margin-top: 20px;">
          </ul>
          <div>
            <?php
            for ($i = 0; $i < count($data->skills); $i++) {
              # code... 

            ?>
              <ul>

                <li>
                  <?= $data->skills[$i]->skill ?>
                </li>
              </ul>
            <?php
            }
            ?>
          </div>
        </div>
        <!-- ==========Languages=============== -->
        <div class="section">
          <h2 style="background-color: #333; color: white;padding-left: 5px;">Languages</h2>
          <ul style="margin-top: 20px;">
          </ul>
          <div>
            <?php
            for ($i = 0; $i < count($data->languages); $i++) {
            ?>
              <ul>

                <li>
                  <?= $data->languages[$i]->language ?>
                </li>
              </ul>
            <?php
            }
            ?>
          </div>
        </div>
        <!-- ============hobbies============= -->
        <div class="section">
          <h2 style="background-color: #333; color: white;padding-left: 5px;">Hobbies</h2>
          <ul style="margin-top: 20px;">
          </ul>
          <div>
            <?php
            for ($i = 0; $i < count($data->hobbies); $i++) {
              # code... 

            ?>
              <ul>

                <li>
                  <?= $data->hobbies[$i]->hobby ?>
                </li>
              </ul>
            <?php
            }
            ?>
          </div>
        </div>
        <!-- Reference=============== -->
        <div class="section">
          <h2 style="background-color: #333; color: white;padding-left: 5px;">Reference</h2>
          <ul style="margin-top: 20px;">
          </ul>
          <div>
            <?php
            for ($i = 0; $i < count($data->user_references); $i++) {
            ?>
              <ul>
                <?= $data->user_references[$i]->user_reference ?>
              </ul>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
      <!-- =====================per info================ -->
      <div class="right-column">
        <div class="section">
          <div style="background-color: #d7d700;color: black;padding: 25px;border-radius: 40px 0px; width:100%">
            <h1 style="font-size: 60px;">
              <?= ucfirst($data->per_info->fname) ?>
              <?= ucfirst($data->per_info->lname) ?>
            </h1>
            <h4><i>
                <?= $data->per_info->profession ?>
              </i></h4>
          </div>
          <div style="margin-top: 20px; background-color: white;width: 130px;padding-left: 5px;">
            <h2 style="color: black; ">About Us</h2>
          </div>
          <div style="color: white;margin-top: 15px;">
            <p>
              <?= ucfirst($data->per_info->about_us) ?>
            </p>
          </div>
        </div>

        <div class="section">
          <div>
            <div style="background-color: white; width: 130px;">
              <h2 style="color: black; padding-left: 5px;">Education</h2>
            </div>
            <?php
            for ($i = 0; $i < count($data->education); $i++) {
              # code... 

            ?>
              <div style="margin-top: 20px;">
                <h5 style="color: yellow;">
                  <?= $data->education[$i]->instutute_name ?> /
                  <?= $data->education[$i]->dagree ?>
                </h5>
                <div>
                  <p style="color: white;">
                    <u>
                      <?= $data->education[$i]->deg_st_date ?> /
                      <?= $data->education[$i]->deg_end_date ?>
                    </u>
                  </p>
                  <p style="float:right;color:white">
                    <?= $data->education[$i]->total_marks ?>
                    <?= $data->education[$i]->obtain_marks ?>
                  </p>
                </div>
                <p style="color: white;">
                  <?= $data->education[$i]->field ?>
                </p>
              </div>
            <?php
            }
            ?>
          </div>
        </div>

        <div class="section">
          <div>
            <div style="background-color: white; width: 200px;">
              <h2 style="color: black; padding-left: 5px;">Work Experince</h2>
            </div>
            <?php
            for ($i = 0; $i < count($data->education); $i++) {
              # code... 
            ?>
              <div style="margin-top: 20px;">
                <h5 style="color: yellow;">
                  <?= $data->work_exp[$i]->company_name ?> /
                  <?= $data->work_exp[$i]->role ?>

                </h5>
                <div style="color: white;">
                  <p style="color: white;margin-top:8px;">
                    <u>
                      <?= $data->work_exp[$i]->work_st_data ?> /
                      <?= $data->work_exp[$i]->work_end_date ?>
                    </u>
                  </p>
                </div>
                <div style="color: white;margin-top:12px;">
                  <?= $data->work_exp[$i]->city_country ?>
                </div>

              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    let btn = document.getElementById('createpf');
    btn.addEventListener('click', () => {
      let contents = document.getElementById('content');
      const opt = {
        margin: 0,
        filename: 'Cvbuilder.pdf',
        html2canvas: {
          scale: 0.75,
        },
        mode: ['css', 'legacy'],
        jsPDF: {
          unit: 'mm',
          format: 'a4',
          orientation: 'portrait'
        }
      }
      html2pdf().set(opt).from(contents).save();
    });
  </script>


</body>

</html>