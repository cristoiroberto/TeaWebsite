<?php
require ("Entities/TeaEntity.php");
/**
 * Description of TeaModel
 *
 * @author Cristoi
 */
class TeaModel {
    
    //Get all tea types from the database and return them in an array.
    function GetTeaTypes() {
        require ('Credentials.php');
        //Open connection and Select database.   
         $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);
        $result = mysqli_query($con,"SELECT DISTINCT type FROM tea") or die(mysqli_error($con));
        $types = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            array_push($types, $row[0]);
        }

        //Close connection and return result.
        mysqli_close($con);
        return $types;
    }

    //Get teaEntity objects from the database and return them in an array.
    function GetTeaByType($type) {
        require ('Credentials.php');
        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);

        $query = "SELECT * FROM tea WHERE type LIKE '$type'";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        $teaArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create tea objects and store them in an array.
            $tea = new TeaEntity($id, $name, $type, $price, $roast, $country, $image, $review);
            array_push($teaArray, $tea);
        }
        //Close connection and return result
        mysqli_close($con);
        return $teaArray;
    }

    function GetTeaById($id) {
        require ('Credentials.php');
        //Open connection and Select database.     
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error($con));
        $sql = mysqli_select_db($con,$database);

        $query = "SELECT * FROM tea WHERE id = $id";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));

        //Get data from database.
        while ($row = mysqli_fetch_array ($result)) {
            $id = $row[0];
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create tea
            $tea = new TeaEntity($id, $name, $type, $price, $roast, $country, $image, $review);
        }
        //Close connection and return result
        mysqli_close($con);
        return $tea;
    }

    function InsertTea(TeaEntity $tea) {
         require ('Credentials.php');
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error);
        $sql = mysqli_select_db($con,$database);
        $query = sprintf("INSERT INTO tea
                          (name, type, price,roast,country,image,review)
                          VALUES
                          ('%s','%s','%s','%s','%s','%s','%s')",
                mysqli_real_escape_string($con,$tea->name),
                mysqli_real_escape_string($con,$tea->type),
                mysqli_real_escape_string($con,$tea->price),
                mysqli_real_escape_string($con,$tea->roast),
                mysqli_real_escape_string($con,$tea->country),
                mysqli_real_escape_string($con,"Images/Tea/" .$tea->image),
                mysqli_real_escape_string($con,$tea->review));
        $this->PerformQuery($query);
    }

    function UpdateTea($id, TeaEntity $tea) {
          require ('Credentials.php');
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error);
        $sql = mysqli_select_db($con,$database);
        $query = sprintf("UPDATE tea
                            SET name = '%s', type = '%s', price = '%s', roast = '%s',
                            country = '%s', image = '%s', review = '%s'
                          WHERE id = $id",
                mysqli_real_escape_string($con,$tea->name),
                mysqli_real_escape_string($con,$tea->type),
                mysqli_real_escape_string($con,$tea->price),
                mysqli_real_escape_string($con,$tea->roast),
                mysqli_real_escape_string($con,$tea->country),
                mysqli_real_escape_string($con,"Images/Tea/" .$tea->image),
                mysqli_real_escape_string($con,$tea->review));
                          
        $this->PerformQuery($query);
    }

    function DeleteTea($id) {
        $query = "DELETE FROM tea WHERE id = $id";
        $this->PerformQuery($query);
    }

    function PerformQuery($query) {
        require ('Credentials.php');
        $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error);
        $sql = mysqli_select_db($con,$database);

        //Execute query and close connection
        mysqli_query($con,$query) or die(mysqli_error($con));
        mysqli_close($con);
    }


}
