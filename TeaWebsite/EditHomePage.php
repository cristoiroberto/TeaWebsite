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
?>       
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
    </head>
    <body>
           
           <div id="content_area">
               <?php echo $content; ?>
           </div>
      
    </body>
</html>
 
