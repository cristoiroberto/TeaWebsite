<?php
session_start();

session_destroy();
unset($_SESSION['username']);
header("location: login.php");
                
include 'Template.php';