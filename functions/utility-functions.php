<?php

// Dump and die function displays the contents of the variable passed
// in an easy-to-read format then exits the program

function dd($value) {
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  exit();
}

?>