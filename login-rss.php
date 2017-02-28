<?php
	require('connect.php');
	session_start();
	
	//Check for existing login or password change
	if(isset($_SESSION['user']) && isset($_SESSION['id'])) {
		$username=$_SESSION['user'];
		$userid=$_SESSION['id'];
		
		if(isset($_GET['op'])) {
			$op = $_GET['op'];
			
			//File Upload
			if($op == 1){
				$direc = "uploads/".$userid."/";
				$tfile = $direc.$_FILES["uploadf"]["name"];
				if(is_uploaded_file($_FILES['uploadf']['tmp_name']) && $_FILES['uploadf']['error']==0){
					if (file_exists($tfile)) {
						$fmsg = "Sorry, file already exists.";
					}
					else {
						if (move_uploaded_file($_FILES["uploadf"]["tmp_name"], $tfile)){
							$query = "INSERT INTO uploads (name, mid, utime, link) VALUES ('".$_FILES['uploadf']['name']."', ".$userid.", now(), '".$tfile.".".$_FILES['uploadf']['type']."')";
							$result = mysqli_query($connection, $query);
							if(!$result) die("Query failed".mysql_error());
							$query = "INSERT INTO records (mname, op, mid, utime) VALUES ('".$username."', 'uploaded', ".$userid.", now())";
							$result = mysqli_query($connection, $query);
							if(!$result) die("Query failed".mysql_error());
							$fmsg = "File uploaded successfully";
						}
						else $fmsg = "File Upload Failed.";
					}
				}
				else $fmsg = "File upload failed. No file selected";
			}
			
			//File Delete
			if($op == 2){
				if(isset($_POST['deletef'])){
					$direc = "uploads/".$userid."/";
					$fid = $_POST['deletef'];
					$query = "SELECT fid, name from uploads WHERE fid=".$fid." AND mid=".$userid."";
					$result = mysqli_query($connection, $query);
					if(!$result) die("Query failed".mysql_error());
					$rowcount = mysqli_num_rows($result);
					if($rowcount == 0) {
						$dmsg = "No such file. Delete failed";
					}
					else {
						$row = mysqli_fetch_assoc($result);
						$tfile = $direc.$row['name'];
						if(unlink($tfile)){
							$query = "DELETE from uploads WHERE fid=".$fid." AND mid=".$userid."";
							$result = mysqli_query($connection, $query);
							$query = "INSERT INTO records (mname, op, mid, utime) VALUES ('".$username."', 'deleted', ".$userid.", now())";
							$result = mysqli_query($connection, $query);
							if(!$result) die("Query failed".mysql_error());
							$dmsg = "File Deleted.";
						}
					}
				}
				else $dmsg = "File deletion failed.";
			}
			
			//Password Change
			if($op == 3){
				
				if (isset($_POST['opass']) && isset($_POST['npass'])){
					if(!empty($_POST['npass']) && !empty($_POST['opass'])) {
						$opass = $_POST['opass'];
						$npass = $_POST['npass'];
			
						$query = "UPDATE members SET pass=$npass WHERE username='$username' AND pass='$opass'";
						$result = mysqli_query($connection, $query);
						if(!$result) {
							die("Query failed 1" . mysql_error());
					}				
						$query = "SELECT * from members WHERE pass='$npass' AND username='$username'";
						$result = mysqli_query($connection, $query);
						if(!$result) {
							die("Query failed 2" . mysql_error());
						}
						$rowcount=mysqli_num_rows($result);
						if($rowcount==0) {
							$pmsg="Password Change Unsuccessful";
						}
						if($rowcount==1) {
							$pmsg="Password Successfully Changed";
						}				
					}
				}
			}
		}
	}

    // Check for Username Password match and Login.
    else{
		if (isset($_POST['usern']) && isset($_POST['passw']) && !empty($_POST['usern']) && !empty($_POST['passw'])){
			$username = $_POST['usern'];
			$password = $_POST['passw'];
 
			$query = "SELECT * from members WHERE username='$username' AND pass='$password'";
			$result = mysqli_query($connection, $query);
			if(!$result) {
				die("Query failed 3" . mysql_error());
			}
			$rowcount=mysqli_num_rows($result);
			if($rowcount==0) {
				header("location: front-rss.php?lmsg=1");
				exit();
			}
			if($rowcount==1) {
				$_SESSION['user'] = $username;
				$query = "SELECT id from members WHERE username='$username' AND pass='$password'";
				$result = mysqli_query($connection, $query);
				$row=mysqli_fetch_assoc($result);
				$userid = $row['id'];
				$_SESSION['id'] = $userid;
				if(isset($_POST['kmli'])) setcookie('user', $username, time() + (86400 * 30), "/");
			}
		}
		else {
			header("location: front-rss.php?lmsg=2");
			exit();
		}
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
	  
		<p class = "option logout">Logout</p>
		
		<p class = "option fupload-open">Upload</p>
		<div class = "fupload-form">
			<i style = "color:yellow"><?php
			if(isset($fmsg) & !empty($fmsg)){
				echo $fmsg;
			}
			?></i>
			<form action="login-rss.php?op=1" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>Upload File</legend>
					<label>Select file to upload: </label>
					<input type="file" name="uploadf">
					<input type="submit" value="Upload" name="submit">
				</fieldset>
			</form>
			<i class = "fupload-close">Close</i>
		</div>
		
		<p class = "option fdelete-open">Delete</p>
		<div class = "fdelete-form">
			<i style = "color:yellow"><?php
			if(isset($dmsg) & !empty($dmsg)){
				echo $dmsg;
			}
			?></i>
			<form action="login-rss.php?op=2" method="post">
				<fieldset>
					<legend>Delete File</legend>
					<label>Enter File ID to delete: </label>
					<input type="number" name="deletef">
					<input type="submit" value="Delete" name="submit">
				</fieldset>
			</form>
			<i class = "fdelete-close">Close</i>
		</div>
		
		<p class = "option passchange-open">Change Password</p>
		<div class="passchange-form">
			<i style = "color:yellow"><?php
			if(isset($pmsg) & !empty($pmsg)){
				echo $pmsg;
			}
			?></i>
			<form method = "POST" action="login-rss.php?op=3">
				<fieldset>
					<legend>Password Change Information:</legend>
					<label>Old Password: </label><br>
					<input type="password" name="opass"><br>
					<label>New Password : </label><br>
					<input type="password" name="npass"><br>
					<input type="submit" value="Change"><br>
				</fieldset>
			</form>
			<i class = "passchange-close">Close</i>
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
		<div class="login-menu">
			<b>> Welcome <i style = "color:#7CFC00"><?php echo $_SESSION['user']; ?></i></b>
		</div>

		<p>Ever wish you could access your work documents from home? Or read PDFs saved on your phone through your tablet? <b style = "color: #FF4500">DataStop</b> is the solution you need! We offer cloud based storage so you can access your files any time, any where!</p>
		
		<table class ="upload-table" align =  "center">
			<tr style = "color: #FFFF00">
				<th>Sr No</th>
				<th>File ID</th>
				<th>File</th>
				<th>Upload Time</th>
			</tr>
			
			<!-- Create Upload table-->
			<?php
				$query = "SELECT fid, name, link, utime FROM uploads WHERE mid='".$_SESSION['id']."'";
				$result = mysqli_query($connection, $query);
				$rowcount = mysqli_num_rows($result);
				
				//If there are no uploads
				if ($rowcount == 0) {
					echo "</table><br><p>Doesn't look like you have uploaded any files yet. Why not upload one now?</p>";
				}
				else {
					//Create table of uploaded files
					$direc = "uploads/".$_SESSION['id']."/";
					for($i = 1; $i <= $rowcount; $i++) {
						$row = mysqli_fetch_assoc($result);
						$fdirec = $direc.$row['name'];
						echo "<tr><td>$i</td><td>".$row['fid']."</td><td><a href = '".$fdirec."' download>".$row['name']."</a></td><td>".$row['utime']."</td></tr>";
					}
					echo "</table><br><p>Click on the file name to download</p>";
				}
			?>
		<iframe class = "feed" src = "rss.php" style = "align: middle" scrolling = "yes" height = "100" width = "700"></iframe>			
	</div>
	
	<script>
		$(document).ready(main);
		$(".contact-info").hide();
		$(".passchange-form").hide();
		$(".fupload-form").hide();
		$(".fdelete-form").hide();
		<?php
			if(isset($pmsg)){
				echo '$(".menu").animate({left: "0px"}, 200);';
				echo '$("body").animate({left: "350px"}, 200);';
				echo '$(".passchange-form").show(200);';
			}
			if(isset($fmsg)){
				echo '$(".menu").animate({left: "0px"}, 200);';
				echo '$("body").animate({left: "350px"}, 200);';
				echo '$(".fupload-form").show(200);';
			}
			if(isset($dmsg)){
				echo '$(".menu").animate({left: "0px"}, 200);';
				echo '$("body").animate({left: "350px"}, 200);';
				echo '$(".fdelete-form").show(200);';
			}
		?>
	</script>
	
  </body>
</html>