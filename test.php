<?php
	require('connect.php');
	
    // If the values are posted, insert them into the database.
    if (isset($_POST['usern']) && isset($_POST['passw'])){
        $username = $_POST['usern'];
        $password = $_POST['passw'];
 
        $query = "INSERT INTO `members` (username, pass) VALUES ('$username', '$password')";
        $result = mysqli_query($connection, $query);
        if($result){
            $msg = "User Created Successfully. Please login.";
        }
		else $msg = "Username/Password taken.";
    }
	
?>
	
<html>
  <head>
    <link href='style.css' rel='stylesheet'>
	<script src="app.js"></script>  
	<script src="jquery.js"></script>
  </head>
  <body>

    <div class="menu">
      
      <div class="icon-close">
        <img src="close.png">
      </div>
	  
		<p class = "option login-open">Login</p>
		<div class="login-form">
			<form method = "POST" action="login.php">
				<fieldset>
					<legend>Login Information:</legend>
					<label>Username : </label><br>
					<input type="text" name="usern"><br>
					<label>Password : </label><br>
					<input type="text" name="passw"><br>
					<input type="submit" value="Sign In"><br>
				</fieldset>
			</form>
			<i class = "login-close">Close</i>
		</div>
		
		<p class = "option registration-open">Register</p>
		<div class="registration-form">
			<i style = "color:yellow"><?php
			if(isset($msg) & !empty($msg)){
				echo $msg;
			}
			?></i>
			<form method = "POST" action="">
				<fieldset>
					<legend>New User Information:</legend>
					<label>Username : </label><br>
					<input type="text" name="usern"><br>
					<label>Password : </label><br>
					<input type="text" name="passw"><br>
					<input type="submit" value="Register"><br>
				</fieldset>
			</form>
			<i class = "registration-close">Close</i>
		</div>
		
		<p class = "option contact-open">Contact Us</p>
		<div class="contact-info">
			<fieldset>
				<legend>Contact Information:</legend>
				<p>Email : kaushik.swapnil5@gmail.com
				Phone : 9619152855</p><br>
			</fieldset><br>
			<i class="contact-close">Close</i>
		</div>
    </div>

    <div class="jumbotron">
		<br>
		<h1 class="pname">DataStop</h1>
		<div class="icon-menu">
			<i>> MENU</i>
		</div>

		<p>Ever wish you could access your work documents from home? Or read PDFs saved on your phone through your tablet? <b style = "color: #FF4500">DataStop</b> is the solution you need! We offer cloud based storage so you can access your files any time, any where!</p>
	</div>
	
	<script>
		$(document).ready(main);
		$(".contact-info").hide();
		$(".login-form").hide();
		$(".registration-form").hide();
		<?php
			if(isset($msg) & !empty($msg)){
				echo '$(".menu").animate({left: "0px"}, 200);';
				echo '$("body").animate({left: "350px"}, 200);';
				echo '$(".registration-form").show(200);';
			}
		?>
	</script>
	
  </body>
</html>