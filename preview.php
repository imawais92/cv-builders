<?php
$data = file_get_contents('res.json');
$data = json_decode($data);
session_start();
// $_SESSION['my_data'] = 1;
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
  </style>

  <button class="btns" id="downbtn">Download PDF</button>

  <?php
  include_once('templates/tem_1.php');
  include_once('templates/tem_2.php');
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