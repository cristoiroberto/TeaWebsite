<?php
session_start();
$userName=$_SESSION['username'];
$title = "Edit About Page";
    if (!isset($_SESSION['username'])) {
                    $_SESSION['msg'] = "You must log in first";
                    header('location: ../login.php');
            }
            
            else
            {
                header('location: ../EditAboutPage.php');
            }
    if (isset($_GET['logout'])) {
                    session_destroy();
                    unset($_SESSION['username']);
                    header("location: ../login.php");
            }

?>