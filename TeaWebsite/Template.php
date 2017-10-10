<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
    </head>
    <body>
       <div id="wrapper">
           <div id="banner">
               
           </div>
           
           <nav id="navigation">
               <ul id="nav">
                   <li><a href="index.php">Home</a></li>
                   <li><a href="Tea.php">Tea</a></li>
                   <li><a href="Preorder.php">Preorder</a></li>
                   <li><a href="Management.php">Management</a></li>
                   <li><a href="About.php">About</a></li>
                   
               </ul>
           </nav>
           
           <div id="content_area">
               <?php echo $content; ?>
           </div>
           
           <div id="sidebar">
               <a href="Preorder.php">
                   <img src="Images/TeaSidebar.jpg" id="logo" alt="logo" />
                </a>
              
           </div>
           
           <footer>
               <p>© 2017 CRISTOI ROBERTO ALEXANDRU ALL RIGHTS RESERVED</p>
           </footer>
       </div>
    </body>
</html>
