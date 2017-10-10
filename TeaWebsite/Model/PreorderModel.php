
<?php
require ("Entities/PreorderEntity.php");

/**
 * Description of PreorderModel
 *
 * @author Cristoi
 */
class PreorderModel {
  //Get all preorder types from the database and return them in an array.
    function GetPreorderTypes() {
        require ('PreorderCredentials.php');
        //Open connection and Select database.   
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);
        $result = mysqli_query($con,"SELECT DISTINCT type FROM preordertable") or die(mysqli_error($con));
        $types = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysqli_close($con);
        return $types;
    }

    //Get preorderEntity objects from the database and return them in an array.
    function GetPreorderByType($type) {
        require ('PreorderCredentials.php');
        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);

        $query = "SELECT * FROM preordertable WHERE type LIKE '$type'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $preordersArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $email = $row[3];
            $telephone = $row[4];
            $country = $row[5];
            $city = $row[6];
            $street = $row[7];

            //Create preorder objects and store them in an array.
            $preorder = new PreorderEntity($id, $name, $type, $email, $telephone, $country, $city, $street);
            array_push($preordersArray, $preorder);
        }
        //Close connection and return result
        mysqli_close($con);
        return $preordersArray;
    }

    function GetPreorderById($id) {
        require ('PreorderCredentials.php');
        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);

        $query = "SELECT * FROM preordertable WHERE id = $id";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));

        //Get data from database.
        while ($row = mysqli_fetch_array ($result)) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $email = $row[3];
            $telephone = $row[4];
            $country = $row[5];
            $city = $row[6];
            $street = $row[7];

            //Create preorder
            $preorders = new PreorderEntity($id, $name, $type, $email, $telephone, $country, $city, $street);
        }
        //Close connection and return result
        mysqli_close($con);
        return $preorders;
    }

    function InsertPreorder(PreorderEntity $preorder) {
         require ('PreorderCredentials.php');
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error());
        $sql = mysqli_select_db($con,$database);
        $query = sprintf("INSERT INTO preordertable
                          (name,type,email,telephone,country,city,street)
                          VALUES
                          ('%s','%s','%s','%s','%s','%s','%s')",
                mysqli_real_escape_string($con,$preorder->name),
                mysqli_real_escape_string($con,$preorder->type),
                mysqli_real_escape_string($con,$preorder->email),
                mysqli_real_escape_string($con,$preorder->telephone),
                mysqli_real_escape_string($con,$preorder->country),
                mysqli_real_escape_string($con,$preorder->city),
                mysqli_real_escape_string($con,$preorder->street));
        $this->PerformQuery($query);
    }

    function UpdatePreorder($id, PreorderEntity $preorder) {
          require ('PreorderCredentials.php');
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error);
        $sql = mysqli_select_db($con,$database);
        $query = sprintf("UPDATE preordertable
                            SET name = '%s', type = '%s', email = '%s', telephone = '%s',
                            country = '%s', city = '%s', street = '%s'
                          WHERE id = $id",
                mysqli_real_escape_string($con,$preorder->name),
                mysqli_real_escape_string($con,$preorder->type),
                mysqli_real_escape_string($con,$preorder->email),
                mysqli_real_escape_string($con,$preorder->telephone),
                mysqli_real_escape_string($con,$preorder->country),
                mysqli_real_escape_string($con,$preorder->city),
                mysqli_real_escape_string($con,$preorder->street));
                          
        $this->PerformQuery($query);
    }

    function DeletePreorder($id) {
        $query = "DELETE FROM preordertable WHERE id = $id";
        $this->PerformQuery($query);
    }

    function PerformQuery($query) {
        require ('PreorderCredentials.php');
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);

        //Execute query and close connection
        mysqli_query($con,$query) or die(mysqli_error($con));
        mysqli_close($con);
    }

}
