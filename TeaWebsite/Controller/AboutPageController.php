<script>
//Display a confirmation box when trying to delete an object
function showConfirm(id)
{
    // build the confirmation box
    var c = confirm("Are you sure you wish to delete this item?");
    
    // if true, delete item and refresh
    if(c)
        window.location = "EditAboutPage.php?delete=" + id;
}
</script>
<?php
require ("Entities/AboutPageEntity.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomePageController
 *
 * @author Cristoi
 */

class AboutPageController {
    //put your code here
    function CreateOverviewTable() {
        $result = "
            <table class='overviewTable'>
            <tr>
                <td></td>
                <td></td>
                <td><b>Id</b></td>
                <td><b>Name</b></td>
                
            </tr>";
        
        $codeArray  = $this->GetContentByType('%');
        
        foreach($codeArray as $key => $value)
        {
            $result = $result.
                    "<tr>
                        <td><a href='AboutPageEditor.php?update=$value->id'>Edit</a></td>
                        <td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
                        <td>$value->id</td>
                        <td>$value->name</td>
                       
                   
                    </tr>";
        }
        
        $result = $result. "</table>";
        return $result;
    }
    
    function GetContentByType($type){
      // connect to database
	$con = mysqli_connect('localhost', 'root', '', 'ckeditor');
        $sql = mysqli_select_db($con,'ck_editor');

        $query = "SELECT * FROM about_page WHERE content LIKE '$type'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $contentArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $name = $row[1];
           

            //Create preorder objects and store them in an array.
            $content = new AboutPageEntity($id, $name);
            array_push($contentArray, $content);
        }
        //Close connection and return result
        mysqli_close($con);
        return $contentArray;
   
}

function DeleteContent($id)
{
    $con = mysqli_connect('localhost', 'root', '', 'ckeditor');
    $query = "DELETE FROM about_page WHERE id = $id";
     mysqli_query($con,$query) or die(mysqli_error($con));
        mysqli_close($con);
}
}
