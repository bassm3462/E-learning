<?php

include 'conect_database.php';

session_start();
session_unset();
session_destroy();

header('location:index.php');

?>