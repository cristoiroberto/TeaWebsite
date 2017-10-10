<?php
require './Controller/TeaController.php';
$teaController = new TeaController();

$title = "Add a new Tea";
$types = array();
array_push($types,"Black Tea");
array_push($types,"White Tea");
array_push($types,"Green Tea");

if(isset($_GET["update"]))
{
     $tea = $teaController->GetTeaById($_GET["update"]);

    $content ="<form action='' method='post'>
    <fieldset>
        <legend>Add a new Tea</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' value='$tea->name' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value=''>Select</option>"
        .$teaController->CreateOptionValues($types).
        "</select><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' value='$tea->price' /><br/>

        <label for='roast'>Roast: </label>
        <input type='text' class='inputField' name='txtRoast' value='$tea->roast' /><br/>

        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' value='$tea->country' /><br/>

        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
        .$teaController->GetImages().
        "</select></br>

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'>$tea->review</textarea></br>

        <button type='submit' class='btn' name='Submit'>Update</button>
    </fieldset>
</form>";
}
else
{
    
     $content ="<form action='' method='post' enctype='multipart/form-data'>
    <fieldset>
        <legend>Add a new Tea</legend>
        <label for='name'>Name: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='type'>Type: </label>
        <select class='inputField' name='ddlType'>
            <option value='%'>Select</option>"
        .$teaController->CreateOptionValues($types).
        "</select><br/>

        <label for='price'>Price: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>

        <label for='roast'>Roast: </label>
        <input type='text' class='inputField' name='txtRoast' /><br/>

        <label for='country'>Country: </label>
        <input type='text' class='inputField' name='txtCountry' /><br/>

        <label for='image'>Image: </label>
       	<input type='file' name='ddlImage' id='ddlImage'><br/>
      

        <label for='review'>Review: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea></br>

        <button type='submit' class='btn' name='Submit'>Submit</button>
    </fieldset>
</form>";
     
}


if(isset($_GET["update"]))
{
    if(isset($_POST["txtName"]))
    {
        $teaController->UpdateTea($_GET["update"]);
        header('Refresh: 0; url=TeaOverview.php');
    }
}
else
{
    if(isset($_POST['Submit']))
    {
      
     $fileType = $_FILES['ddlImage']["type"];

    if (($fileType == "image/gif") ||
            ($fileType == "image/jpeg") ||
            ($fileType == "image/jpg") ||
            ($fileType == "image/png")) {
        //Check if file exists
        if (file_exists("Images/Tea/" . $_FILES["ddlImage"]["name"])) {
            echo "File already exists";
        } else {
            move_uploaded_file($_FILES["ddlImage"]["tmp_name"], "Images/Tea/" . $_FILES["ddlImage"]["name"]);
            
        }
    }
    
        $imageName= $_FILES['ddlImage']['name'];
        $teaController->InsertTea($imageName);
        echo "<script type='text/javascript'>alert('Tea added successful!')</script>";
        
    
    }
}
include './Template.php';