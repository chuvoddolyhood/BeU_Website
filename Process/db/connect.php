<?php
  $con = mysqli_connect("localhost","root","","commercial_web");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  //set utf8
  mysqli_set_charset($con, "utf8");
?>