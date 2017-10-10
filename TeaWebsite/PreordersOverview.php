<?php

$title = "Manage preorders";
include './Controller/PreorderController.php';
$preorderController = new PreorderController();

$content = $preorderController->CreateOverviewTable();

if(isset($_GET["delete"]))
{
    $preorderController->DeletePreorder($_GET["delete"]);
    header('Refresh: 1; url=PreordersOverview.php');
}
        
include './Template.php';   
