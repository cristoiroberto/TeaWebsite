<?php
require ("Entities/UsersEntity.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersModel
 *
 * @author Cristoi
 */
class UsersModel {
      function GetUsersByEmail($email) {
  
        //Open connection and Select database.     
        // connect to database
	$con = mysqli_connect('localhost', 'root', '', 'registration');
        $sql = mysqli_select_db($con,'users');

        $query = "SELECT * FROM users WHERE email LIKE '$email'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $usersArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $id= $row[0];
            $username = $row[1];
            $email = $row[2];
            $password = $row[3];
            $rank = $row[4];
          

            //Create user objects and store them in an array.
            $user = new UsersEntity($id,$username, $email, $password,$rank);
            array_push($usersArray, $user);
        }
        //Close connection and return result
        mysqli_close($con);
        return $usersArray;
    }
    
    function GetUserById($id) {
        $con = mysqli_connect('localhost', 'root', '', 'registration');
        $sql = mysqli_select_db($con,'users');

        $query = "SELECT * FROM users WHERE id = $id";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));

         //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $id= $row[0];
            $username = $row[1];
            $email = $row[2];
            $password = $row[3];
            $rank = $row[4];
          

            //Create user objects and store them in an array.
            $user = new UsersEntity($id,$username, $email, $password,$rank);
        }
        //Close connection and return result
        mysqli_close($con);
        return $user;
    }

     function UpdateUser($id, UsersEntity $user) {
        $con = mysqli_connect('localhost', 'root', '', 'registration');
        $sql = mysqli_select_db($con,'users');
        $query = sprintf("UPDATE users
                            SET username = '%s', email = '%s', password = '%s', rank = '%s'
                          WHERE id = $id",
                mysqli_real_escape_string($con,$user->username),
                mysqli_real_escape_string($con,$user->email),
                mysqli_real_escape_string($con,$user->password),
                mysqli_real_escape_string($con,$user->rank));
                          
        mysqli_query($con,$query) or die(mysqli_error($con));
        mysqli_close($con);
    }

        function GetUserByName($name)
        {
             $con = mysqli_connect('localhost', 'root', '', 'registration');
             $sql = mysqli_select_db($con,'users');
             $query = "SELECT * FROM users WHERE username = '$name'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));

         //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $id= $row[0];
            $username = $row[1];
            $email = $row[2];
            $password = $row[3];
            $rank = $row[4];
          

            //Create user objects and store them in an array.
            $user = new UsersEntity($id,$username, $email, $password,$rank);
        }
        //Close connection and return result
        mysqli_close($con);
        return $user;
        }
    function DeleteUser($id) {
        $con = mysqli_connect('localhost', 'root', '', 'registration');
        $query = "DELETE FROM users WHERE id = $id";
        
        mysqli_query($con,$query) or die(mysqli_error($con));
        mysqli_close($con);
    }

}
