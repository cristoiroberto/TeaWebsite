
<!DOCTYPE html>

<html>
        <!-- js -->
    <script src="js/jquery-1.9.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $( '.dropdown' ).hover(
                function(){
                    $(this).children('.sub-menu').slideDown(200);
                },
                function(){
                    $(this).children('.sub-menu').slideUp(200);
                }
            );
        }); // end ready
    </script>

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
                   <li class="dropdown">
                    <a href="Management.php">Management</a>
                    <ul class="sub-menu">
                
                   <li class="dropdown">
                     <a href="#">Tea</a>
                       <ul class="sub-menu">
                           <li><a href="loginCheck/teaAddCheck.php">Add Tea</a></li>
                           <li><a href="loginCheck/teaOverviewCheck.php">Overview</a></li>
                        </ul>
                   </li>
                   
                    <li class="dropdown">
                     <a href="#">Preorders</a>
                       <ul class="sub-menu">
                           <li><a href="Preorder.php">Add Preorder</a></li>
                          <li><a href="loginCheck/preorderOverviewCheck.php">Overview</a></li>
                        </ul>
                   </li>
                   
                 
                   
                      <li class="dropdown">
                        <a href="#">Edit</a>
                        <ul class="sub-menu">
                            <li><a href="loginCheck/editHomePageCheck.php">Home Page</a></li>
                            <li><a href="loginCheck/editAboutPageCheck.php">About Page</a></li>

                        </ul>
                </li>
               
                <li><a href="loginCheck/uploadImageCheck.php">Upload Image</a></li>
            </ul>
        </li>
                 
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
