<html>
    <head>
        <title></title>
        <script src="ckeditor/ckeditor.js"></script>
    </head>
    
    <body>
        <?php
	// connect to database
	$con = mysqli_connect("localhost", "root", "", "ckeditor");
	$query = mysqli_query($con, "SELECT * FROM home_page");
	

	while($row = mysqli_fetch_array($query))
	{ ?>
		
		<?php echo $row["content"]; ?>
		
	
		
        <?php
	}
        ?>
        
    </body>
</html>
<?php 
session_start(); 

?>  