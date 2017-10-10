<script>
//Display a confirmation box when trying to delete an object
function showConfirm(id)
{
    // build the confirmation box
    var c = confirm("Are you sure you wish to delete this item?");
    
    // if true, delete item and refresh
    if(c)
        window.location = "UsersOverview.php?delete=" + id;
}
</script>

<?php
require("Model/UsersModel.php");

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author Cristoi
 */
class UsersController {
     function CreateOverviewTable() {
        $result = "
            <table class='overviewTable'>
            <tr>
                <td></td>
                <td></td>
                <td><b>UserName</b></td>
                <td><b>Email</b></td>
                <td><b>Password</b></td>
                <td><b>Rank</b></td>
                
                
            </tr>";
        
        $usersArray  = $this->GetUsersByEmail('%');
        
        foreach($usersArray as $key => $value)
        {
            $result = $result.
                    "<tr>
                        <td><a href='RegisterUser.php?update=$value->id'>Update</a></td>
                        <td><a href='#' onclick='showConfirm($value->id)'>Delete</a></td>
                        <td>$value->username</td>
                        <td>$value->email</td>
                        <td>$value->password</td>
                        <td>$value->rank</td>
                        
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
    
    function UpdateUser($id) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password_1 = $_POST["password_1"];
        $password_2 = $_POST["password_2"];
        $rank = $_POST["rank"];
       
        if($username == "" || $email == "" || $rank =="%" || $password_1 == "" || $password_2 == "" || $password_2 != $password_1)
        {
            echo "Please complete all fields";
        }
        else
        {
            $user = new UsersEntity($id, $username, $email, $password_1,$rank);
            $usersModel = new UsersModel();
            $usersModel->UpdateUser($id, $user);
        }
    }
    
    function GetUsersByEmail($email) {
        $usersModel = new UsersModel();
        return $usersModel->GetUsersByEmail($email);
    }
    
    function GetUserById($id) {
        $usersModel = new UsersModel();
        return $usersModel->GetUserById($id);
    }
    
     function DeleteUser($id) {
        $userModel = new UsersModel();
        $userModel->DeleteUser($id);
    }
    
    function GetUserByName($name)
    {
        $usersModel = new UsersModel();
        return $usersModel->GetUserByName($name);
    }
}
