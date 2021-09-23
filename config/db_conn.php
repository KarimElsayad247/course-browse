<?php     
    // connect to database
    $conn = mysqli_connect('localhost', 'root', '', 'lab4');

    // on connection error
    if(!$conn) {
      echo 'Connection error' . mysqli_connect_error();
    }
 ?>