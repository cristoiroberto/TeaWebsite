<?php

$title = "Edit HomePage";
include './Controller/HomePageController.php';
$homepageController = new HomePageController();

$content = $homepageController->CreateOverviewTable();

if(isset($_GET["delete"]))
{
    $homepageController->DeleteContent($_GET["delete"]);
    header('Refresh: 1; url=EditHomePage.php');
}
        
include './Template.php';   
