<?php

require './Controller/TeaController.php';
$teaController = new TeaController();

require './Controller/PreorderController.php';
$preorderController = new PreorderController();



$title = 'Preorder free samples';
if(isset($_GET["update"]))
{
     $preorder = $preorderController->GetPreorderById($_GET["update"]);
      $content ="<form action='' method='post'>
    <fieldset>
         <legend>Preorder free samples of Tea</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' value='$preorder->name' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>All</option>"
        .$teaController->CreateOptionValues($teaController->GetTeaTypes()).
        "</select><br/>

          <label for='Email'>Email: </label>
        <input type='text' class='inputField' name='txtEmail' value='$preorder->email' /><br/>

        <label for='Telephone'>Telephone: </label>
        <input type='text' class='inputField' name='txtTelephone' value='$preorder->telephone' /><br/>

        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' value='$preorder->country' /><br/>
 
        <label for='City'>City: </label>
        <input type='text' class='inputField' name='txtCity' value='$preorder->city'/><br/>

        <label for='street'>Street: </label>
        <input type='text' class='inputField' name='txtStreet' value='$preorder->street' /><br/>

       <button type='submit' class='btn' name='Preorder'>Update</button>
    </fieldset>
</form>";

}
else{         
    $content ="<form action='' method='post'>
    <fieldset>
        <legend>Preorder free samples of Tea</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>Select</option>"
        .$teaController->CreateOptionValues($teaController->GetTeaTypes()).
        "</select><br/>

        <label for='email'>Email: </label>
        <input type='text' class='inputField' name='txtEmail' /><br/>
        
        <label for='telephone'>Telephone: </label>
        <input type='text' class='inputField' name='txtTelephone' /><br/>
        
        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/>
        
        <label for='city'>City: </label>
        <input type='text' class='inputField' name='txtCity' /><br/>

        <label for='street'>Street: </label>
        <input type='text' class='inputField' name='txtStreet' /><br/>

        <button type='submit' class='btn' name='Preorder'>Preorder</button>
    </fieldset>
</form>";
}


if(isset($_GET["update"]))
{
    if(isset($_POST["txtName"]))
    {
        $preorderController->UpdatePreorder($_GET["update"]);
        header('Refresh: 0; url=PreordersOverview.php');
    }
}
 else {
    if(isset($_POST["txtName"]))
    {
        $preorderController->InsertPreorder();
    }
}

include 'Template.php';
