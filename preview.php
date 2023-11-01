<?php
$data = file_get_contents('res.json');
$data = json_decode($data);
session_start();
if (isset($_GET['pre'])) {
  $tem_id = urldecode($_GET['pre']);
  $_SESSION['my_data'] = $tem_id;
  header('location: ./select.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your CV</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <style>
    .btns {
      background: linear-gradient(63deg, #c21010 0%, #a73232 80%);
      color: white;
      padding: 8px 18px;
      border: none;
      float: right;
      margin: 10px 40px 30px 0;
      font-size: 20px;
      border-radius: 5px;
      cursor: pointer;

    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    .selecthading h1 {
      background-color: #C21010;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      padding: 18px 32px;
      border-radius: 10px;
    }
  </style>

  <button class="btns" id="downbtn">Download PDF</button>

  <?php

  if (@$_SESSION['my_data']) {
    include_once('templates/tem_1.php');
    include_once('templates/tem_2.php');
  } else {
  ?>
    <div class="selecthading">
      <div class="selecthading">
        <h1>Please Select Template</h1>
      </div>
    <?php
  }
    ?>
    <script>
      let btn = document.getElementById('downbtn');
      btn.addEventListener('click', () => {
        let contents = document.getElementById('content');
        const opt = {
          margin: 0,
          filename: 'Cvbuilder.pdf',
          html2canvas: {
            scale: 1,
          },
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