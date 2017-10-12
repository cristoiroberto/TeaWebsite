<?php
session_start();
$userName=$_SESSION['username'];
$title = "Management";
    if (!isset($_SESSION['username'])) {
                    $_SESSION['msg'] = "You must log in first";
                    header('location: login.php');
            }
    if (isset($_GET['logout'])) {
                    session_destroy();
                    unset($_SESSION['username']);
                    header("location: login.php");
            }



    $content = '<h3>Welcome,</h3> 
                <form action="EditHomePage.php">
                <button type="submit" class="btn" name="editHomePage">Edit HomePage</button>
                </form><br/>
           
                <form action="EditAboutPage.php">
                <button type="submit" class="btn" name="editAboutPage">Edit About Page</button>
                </form><br/>
                
                <form action="TeaAdd.php">
                <button type="submit" class="btn" name="AddBtn">Add new Tea</button>
                </form><br/>
                
                <form action="uploadImage.php">
                <button type="submit" class="btn" name="UploadBtn">Upload Image</button>
                </form><br/>
                
                <form action="TeaOverview.php">
                <button type="submit" class="btn" name="TeaOverviewBtn">Tea overview</button>
                </form><br/>
                
                <form action="PreordersOverview.php">
                <button type="submit" class="btn" name="PreordersOverviewBtn">Preorders overview</button>
                </form><br/>
                
                <form action="RegisterUser.php">
                <button type="submit" class="btn" name="RegisterUserBtn">Register new user</button>
                </form><br/>
                
                <form action="AdminCheck.php">
                <button type="submit" class="btn" name="UsersOverviewBtn">Users Overview</button>
                </form><br/>
                
                <form action="logout.php">
                <button type="submit" class="btn" name="LogoutBtn">Logout</button>
                </form><br/>';
             
        

   
include './Template.php';

