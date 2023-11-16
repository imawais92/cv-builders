<?php
$title = "Login";
include('../includes/db.php');

if (isset($_REQUEST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);
  if ($row == 1) {
    $_SESSION['loginadmin'] = true;
    print_r($_SESSION['loginadmin']);
    $row = mysqli_fetch_assoc($result);
    header("location: index.php");
    echo "done";
  } else {
?>
    <script>
      alert("WRONG PASSWORD");
    </script>
<?php
  }
}
?>

<?php
include('../includes/header.php');

?>
<style>
  .card {
    border: none;
    height: 320px
  }

  .forms-inputs {
    position: relative
  }

  .forms-inputs span {
    position: absolute;
    top: -18px;
    left: 10px;
    background-color: #fff;
    padding: 5px 10px;
    font-size: 15px
  }

  .forms-inputs input {
    height: 50px;
    border: 2px solid #eee
  }

  .forms-inputs input:focus {
    box-shadow: none;
    outline: none;
    border: 2px solid #000
  }

  .btn {
    height: 50px
  }

  .success-data {
    display: flex;
    flex-direction: column
  }

  .bxs-badge-check {
    font-size: 90px
  }
</style>

<form action="#" method="post">
  <div class="container" style="margin-top: 100px;">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6">
        <div class="card px-5 py-5" id="form1">
          <div class="form-data" v-if="!submitted">
            <div class="forms-inputs mb-4"> <span>Email or username</span>
              <input name="username" class="w-100" autocomplete="off" type="text" v-model="email">
            </div>
            <div class=" forms-inputs mb-4"> <span>Password</span>
              <input name="password" class="w-100" autocomplete="off" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
              <div class="invalid-feedback">Password must be 8 character!</div>
            </div>
            <div class="mb-3"> <button name="submit" type="submit" class="btn btn-dark w-100">Login</button> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<?php
include('../includes/end_links.php');
?>