<?php

$title = "Manage tea objects";
include './Controller/TeaController.php';
$teaController = new TeaController();

$content = $teaController->CreateOverviewTable();

if(isset($_GET["delete"]))
{
    $teaController->DeleteTea($_GET["delete"]);
    header('Refresh: 1; url=TeaOverview.php');
}
        
include './Template.php';   

