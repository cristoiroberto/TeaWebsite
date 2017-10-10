<?php

$title = "Manage users";

include './Controller/UsersController.php';
$usersController = new UsersController();

$content = $usersController->CreateOverviewTable();

if(isset($_GET["delete"]))
{
    $usersController->DeleteUser($_GET["delete"]);
    header('Refresh: 1; url=UsersOverview.php');
}

include 'Template.php';