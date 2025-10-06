<?php
session_start();
$_SESSION = array(); // Kosongkan variabel sesi
session_destroy();  // Hancurkan sesi
header("location: ../level8.php");
exit;