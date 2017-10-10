<?php 
include('server.php');
include('errors.php');


	$title = "Login";

	$content ="<form action='login.php' method='post'>
	<fieldset>  
        <h3 class='hdr'>Login</h3>
        <label for='username'>Username: </label>
        <input type='text' class='input-group' name='username' /><br/>

        <label for='password'>Password: </label>
        <input type='password' class='input-group' name='password' /><br/>

<button type='submit' class='btn' name='login_user'>Login</button>

 </fieldset>
</form>";



include './Template.php';