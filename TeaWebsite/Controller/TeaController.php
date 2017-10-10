<script>
//Display a confirmation box when trying to delete an object
function showConfirm(id)
{
    // build the confirmation box
    var c = confirm("Are you sure you wish to delete this item?");
    
    // if true, delete item and refresh
    if(c)
        window.location = "TeaOverview.php?delete=" + id;
}
</script>

<?php
require("Model/TeaModel.php");
/**
 * Description of TeaController
 *
 * @author Cristoi
 */
class TeaController {
    
    function CreateOverviewTable() {
        $result = "
            <table class='overviewTable'>
            <tr>
                <td></td>
                <td></td>
                <td><b>Id</b></td>
                <td><b>Name</b></td>
                <td><b>Type</b></td>
                <td><b>Price</b></td>
                <td><b>Roast</b></td>
                <td><b>Country</b></td>
                
            </tr>";
        
        $teaArray  = $this->GetTeaByType('%');
        
        foreach($teaArray as $key => $value)
        {
            $result = $result.
                    "<tr>
                        <td><a href='TeaAdd.php?update=$value->id'>Update</a></td>
                        <td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
                        <td>$value->id</td>
                        <td>$value->name</td>
                        <td>$value->type</td>
                        <td>$value->price</td>
                        <td>$value->roast</td>
                        <td>$value->country</td>
                    </tr>";
        }
        
        $result = $result. "</table>";
        return $result;
    }
   
    function CreateTeaDropdownList() {
        $teaModel = new TeaModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'types' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($teaModel->GetTeaTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }
    
    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }
    
    function CreateTeaTables($types) {
        $teaModel = new TeaModel();
        $teaArray = $teaModel->GetTeaByType($types);
        $result = "";

        //Generate a teaTable for each teaEntity in array
        foreach ($teaArray as $key => $tea) {
            $result = $result .
                    "<table class = 'teaTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$tea->image' /></th>
                            <th width = '75px' >Name: </th>
                            <td>$tea->name</td>
                        </tr>
                        
                        <tr>
                            <th>Type: </th>
                            <td>$tea->type</td>
                        </tr>
                        
                        <tr>
                            <th>Price: </th>
                            <td>$tea->price</td>
                        </tr>
                        
                        <tr>
                            <th>Roast: </th>
                            <td>$tea->roast</td>
                        </tr>
                        
                        <tr>
                            <th>Origin: </th>
                            <td>$tea->country</td>
                        </tr>
                        
                        <tr>
                            <td colspan='2' >$tea->review</td>
                        </tr>                      
                     </table>";
        }
        return $result;
    }
    

     function GetImages() {
        //Select folder to scan
        $handle = opendir("Images/Tea");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }
     function InsertTea($imageName) {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $roast = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $review = $_POST["txtReview"];
        
        if (isset($_POST["ddlImage"]))
        {
         $image = $_POST["ddlImage"];
        }
        if($name == "" || $type == "" || $price == "" || $roast == "" || $country == "" || $review == "")
        {
            echo "<script type='text/javascript'>alert('Please complete all fields!')</script>";
        }
        else
        {
            $tea = new TeaEntity(-1, $name, $type, $price, $roast, $country, $imageName, $review);
            $teaModel = new TeaModel();
            $teaModel->InsertTea($tea);
        }
    }
    
    
    function UpdateTea($id) {
        $name = $_POST["txtName"];
        $type = $_POST["ddlType"];
        $price = $_POST["txtPrice"];
        $roast = $_POST["txtRoast"];
        $country = $_POST["txtCountry"];
        $image = $_POST["ddlImage"];
        $review = $_POST["txtReview"];

        if($name == "" || $type == "" || $price == "" || $roast == "" || $country == "" || $review == "")
        {
            echo "<script type='text/javascript'>alert('Please complete all fields!')</script>";
        }
        else
        {
            $tea = new TeaEntity($id, $name, $type, $price, $roast, $country, $image, $review);
            $teaModel = new TeaModel();
            $teaModel->UpdateTea($id, $tea);
        }
    }

    function DeleteTea($id) {
        $teaModel = new TeaModel();
        $teaModel->DeleteTea($id);
    }
    function GetTeaById($id) {
        $teaModel = new TeaModel();
        return $teaModel->GetTeaById($id);
    }

    function GetTeaByType($type) {
        $teaModel = new TeaModel();
        return $teaModel->GetTeaByType($type);
    }

    function GetTeaTypes() {
        $teaModel = new TeaModel();
        return $teaModel->GetTeaTypes();
    }
}
