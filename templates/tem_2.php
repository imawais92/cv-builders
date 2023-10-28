<?php
if ($_SESSION['my_data'] == 2) {
?>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }


    :root {
      --primary-color: #323B4C;
      --light-color: #ffffff;
      --dark-color: black;

    }

    .container {
      min-height: 296.5mm;
      width: 210mm;
      display: grid;
      grid-template-columns: 30% 70%;
    }

    .sec-1 {
      background-color: var(--primary-color);
      height: 100%;
    }
  </style>


  <div id="content">
    <div class="container">


      <div class="sec-1">
        <div class="image-sec">
          <img src="../uploads/images/trash.png" alt="your image">
        </div>
      </div>


      <div class="sec-2">

      </div>
    </div>
  </div>
<?php
}
?>