<?php

$title = "Edit HomePage";
include './Controller/AboutPageController.php';
$aboutpageController = new AboutPageController();

$content = $aboutpageController->CreateOverviewTable();

if(isset($_GET["delete"]))
{
    $aboutpageController->DeleteContent($_GET["delete"]);
    header('Refresh: 1; url=EditAboutPage.php');
}
        
include './Template.php';   
