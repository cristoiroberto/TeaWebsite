<?php
 if(isset($_GET["update"]))
 {
     $id = $_GET["update"];
 }
 ?>
<html>
	<head>
		<title>Edit About Page</title>
		<script src="ckeditor/ckeditor.js"></script>
	</head>

	<body>
            <form action="" method="post">
			<textarea class="ckeditor" name="editor"> 
                        <?php
                        // connect to database
                        $con = mysqli_connect("localhost", "root", "", "ckeditor");
                        $query = mysqli_query($con, "SELECT * FROM about_page where id = '$id'");
                        $row = mysqli_fetch_array($query);
                        ?>
                        <?= $row["content"]; ?>
                        </textarea>
                        
            <input type="submit" value="Save">
         </form>
		

	</body>

</html>

<?php

	if(isset($_POST['editor']))
	{
		$text = $_POST['editor'];

		// connect to database
		$con = mysqli_connect('localhost', 'root', '', 'ckeditor');

		//insert the data

		$query = mysqli_query($con, "UPDATE `about_page` SET `content` = '$text' WHERE id = '$id'");
                
                if($query)
                {
                    header("Location: EditAboutPage.php?success=1");
                }
                else
                {
                    header("Location: EditAboutPage.php?success=0");
                }

		

	}
