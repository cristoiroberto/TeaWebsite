<?php
require './Controller/UsersController.php';
$usersController = new UsersController();

session_start();
$title = "Admin verification";


$userName = $_SESSION["username"];
$user = $usersController->GetUserByName($userName);
$content = '';

if($user->rank != "admin")
{
    echo "<script type='text/javascript'>alert('You must be an admin to access this page')</script>";
    header('Refresh: 0; url=Management.php');
}
else
{
    header('Refresh: 0; url=UsersOverview.php');
}

include 'Template.php';