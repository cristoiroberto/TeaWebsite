<script>
//Display a confirmation box when trying to delete an object
function showConfirm(id)
{
    // build the confirmation box
    var c = confirm("Are you sure you wish to delete this item?");
    
    // if true, delete item and refresh
    if(c)
        window.location = "PreordersOverview.php?delete=" + id;
}
</script>

<?php
require("Model/PreorderModel.php");

/**
 * Description of PreorderController
 *
 * @author Cristoi
 */
class PreorderController {
   
    
    function CreateOverviewTable() {
        $result = "
            <table class='overviewTable'>
            <tr>
                <td></td>
                <td></td>
                <td><b>Id</b></td>
                <td><b>Name</b></td>
                <td><b>Type</b></td>
                <td><b>Email</b></td>
                <td><b>Phone</b></td>
                <td><b>Country</b></td>
                <td><b>City</b></td>
                <td><b>Street</b></td>
                
            </tr>";
        
        $preordersArray  = $this->GetPreorderByType('%');
        
        foreach($preordersArray as $key => $value)
        {
            $result = $result.
                    "<tr>
                        <td><a href='Preorder.php?update=$value->id'>Modify</a></td>
                        <td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
                        <td>$value->id</td>
                        <td>$value->name</td>
                        <td>$value->type</td>
                        <td>$value->email</td>
                        <td>$value->telephone</td>
                        <td>$value->country</td>
                        <td>$value->city</td>
                        <td>$value->street</td>
                    </tr>";
        }
        
        $result = $result. "</table>";
        return $result;
    }
   
   
    
    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }
    
   
     function InsertPreorder() {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $email = $_POST["txtEmail"];
        $telephone = $_POST["txtTelephone"];
        $country = $_POST["txtCountry"];
        $city = $_POST["txtCity"];
        $street = $_POST["txtStreet"];
        
        if($name =="" || $type =="%" || $email == "" || $telephone == "" || $country == "" || $city == "" || $street == "")
        {
            echo "<script type='text/javascript'>alert('Please complete all fields!')</script>";
        }
        else
        {
            $preorderEnt = new PreorderEntity(-1, $name, $type, $email, $telephone, $country, $city, $street);
            $preorderModel = new PreorderModel();
            $preorderModel->InsertPreorder($preorderEnt);
        }
              
    }
    
    
    function UpdatePreorder($id) {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $email = $_POST["txtEmail"];
        $telephone = $_POST["txtTelephone"];
        $country = $_POST["txtCountry"];
        $city = $_POST["txtCity"];
        $street = $_POST["txtStreet"];

        $preorder = new PreorderEntity($id, $name, $type, $email, $telephone, $country, $city, $street);
        $preorderModel = new PreorderModel();
        $preorderModel->UpdatePreorder($id,$preorder);
    }

    function DeletePreorder($id) {
        $preorderModel = new PreorderModel();
        $preorderModel->DeletePreorder($id);
    }
    function GetPreorderById($id) {
         $preorderModel = new PreorderModel();
        return $preorderModel->GetPreorderById($id);
    }

    function GetPreorderByType($type) {
        $preorderModel = new PreorderModel();
        return $preorderModel->GetPreorderByType($type);
    }

    function GetPreorderTypes() {
        $preorderModel = new PreorderModel();
        return $preorderModel->GetPreorderTypes();
    }
}
