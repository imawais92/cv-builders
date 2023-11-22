<?php
include('includes/db.php');

session_destroy();
header('location:index.php');

?>