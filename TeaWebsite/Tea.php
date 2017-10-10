<?php

require 'Controller/TeaController.php';
$preorderController = new TeaController();

if(isset($_POST['types']))
{
    //Fill page with tea of the selected type
    $teaTables = $preorderController->CreateTeaTables($_POST['types']);
}
else 
{
    //Page is loaded for the first time, no type selected -> Fetch all types
    $teaTables = $preorderController->CreateTeaTables('%');
}

//Output page data
$title = 'Tea overview';
$content = $preorderController->CreateTeaDropdownList(). $teaTables;

include 'Template.php';
