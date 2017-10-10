<?php

include('server.php');
include('errors.php');

require './Controller/UsersController.php';
$usersController = new UsersController();

$title = "Register new user";

$types = array();
array_push($types,"admin");
array_push($types,"user");

$userName = $_SESSION["username"];
$user = $usersController->GetUserByName($userName);

if($user->rank != "admin")
{
    $content = '';
    echo "<script type='text/javascript'>alert('You must be an admin to add new users')</script>";
    header('Refresh: 0; url=Management.php');
}
else
{

    if(isset($_GET["update"]))
    {
        $user = $usersController->GetUserById($_GET["update"]);
        $content ="<form action='' method='post'>
            <fieldset>  

            <label for='username'>Username: </label>
            <input type='text' class='inputField' name='username' value = '$user->username' /><br/>

            <label for='email'>Email: </label>
            <input type='text' class='inputField' name='email' value = '$user->email'/><br/>

            <label for='password'>Password: </label>
            <input type='password' class='inputField' name='password_1' value = '$user->password'/><br/>

            <label for='password'>Confirm Password: </label>
            <input type='password' class='inputField' name='password_2' value = '$user->password'/><br/><br/>

             <label for='rank'>Rank: </label>

              <select class='inputField' name='rank'>
                <option value=''>Select</option>"
                .$usersController->CreateOptionValues($types).
                "</select><br/>

            <button type='submit' class='btn' name='update_user'>Update</button>

                <p>
             Already a member? <a href='logout.php'>Sign in</a><br/>
             </p>


     </fieldset>
    </form>";

    }
    else
    {
        $content ="<form action='RegisterUser.php' method='post'>
                <fieldset>  

                <label for='username'>Username: </label>
                <input type='text' class='inputField' name='username' /><br/>

                <label for='email'>Email: </label>
                <input type='text' class='inputField' name='email' /><br/>

                <label for='password'>Password: </label>
                <input type='password' class='inputField' name='password_1' /><br/>

                <label for='password'>Confirm Password: </label>
                <input type='password' class='inputField' name='password_2' /><br/><br/>

               <label for='rank'>Rank: </label>

              <select class='inputField' name='rank'>
                <option value=''>Select</option>"
                .$usersController->CreateOptionValues($types).
                "</select><br/>

                <button type='submit' class='btn' name='reg_user'>Register</button>

                    <p>
                 Already a member? <a href='logout.php'>Sign in</a><br/>
                 </p>


         </fieldset>
        </form>";
    }


    if(isset($_GET["update"]))
    {
        if(isset($_POST["username"]))
        {

            $usersController->UpdateUser($_GET["update"]);
            header('Refresh: 1; url=UsersOverview.php');
        }
    }
    
}
 

include 'Template.php';
