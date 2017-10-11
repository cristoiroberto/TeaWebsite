<html>
	<head>
		<title>Edit Home Page</title>
		<script src="ckeditor/ckeditor.js"></script>
	</head>

	<body>
		<form action="" method="post">
			<textarea class="ckeditor" name="editor"> 
                        
                        
                        </textarea>
                        
            <input type="submit" value="Submit">
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

		$query = mysqli_query($con, "INSERT INTO content (content) VALUES ('$text')");

		if($query)
		{
			echo "Added into db";
		}
		else 
		{
			echo "Error !";
		}

	}