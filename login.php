<?php
		ob_start();
		session_start();
			$error = NULL;
			if($_SERVER["REQUEST_METHOD"] == "POST") {
				//connect.php(tells where to connect servername, dbasename, username, password)
				require "Users_mysqli.php";
				// username and password sent from form
				$myusername = mysqli_real_escape_string($conn,$_POST['username']);
				$mypassword = mysqli_real_escape_string($conn,$_POST['password']);
				
				
				$query = "SELECT * FROM Users WHERE User_ID = '$myusername' and Password = '$mypassword' and (Permissions = 'admin' or Permissions = 'user') ";
				
				$result = mysqli_query($conn, $query);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				$count = mysqli_num_rows($result);
				
				// if result matched $myusername and $mypassword, table row must be 1 row
				if($count == 1) {
					$_SESSION['login_user'] = $myusername;
					if($row[Permissions] == 'admin') {
						header("location: index.php");
					} else {
						header("location: contact.php");
					}
				} else {
					$error = "ERROR! Your Login Name or Password is invalid";
					}
				}
		ob_end_flush();
?>

<!DOCTYPE html>

<html lang="en">

	<head>
	
		<title>Login</title>
	
		<meta charset="utf-8">
		
		<meta name="Keywords" content="html5, layout, CSS Grid System, database, music" />
		
		<meta name="Author" content="Ethan Aragona" />
		
		<meta name="Description" content="Login page of my database website" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css.css">
	
	</head>

	<body>
	
		<div class="login-grid-container">
			
			<div class="nav">
			
				<ul>
				
					<li><a href="index.php">Home<a></li>
					
					<li><a href="Query1.php">Query1<a></li>
					
					<li><a href="Query2.php">Query2</a></li>
						
					<li><a href="contact.php">Contact</a></li>
						
					<li><a href="adduser.php">Add User</a></li>
						
					<li><a href="updateuser.php">Update User</a></li>
						
					<li><a href="deleteuser.php">Delete User</a></li>
					
					<li><a href="login.php">Login</a></li>
				
				</ul>
			
			</div>
			
			<div></div><div></div><div></div><div></div><div></div><div></div><div></div>
				
			<div class="login-content">
				
				<form method = "post">
					
					<h1>
						Login
					</h1>

					<h2>
						Username:
					</h2>

					<input type = "text" name = "username" placeholder="Enter your username"/> <br />

					<h2>
						Password:
					</h2>

					<input type = "password" name="password" placeholder="Enter your password"/> <br />
					
					<em class="error"><?php echo $error; ?></em>

					<input type="submit" value="Submit">
					
				</form>

			</div>
		
		</div>
	
		<div class="copyright_login">
			
			<p>© Graeme. All rights reserved.</p>
			
		</div>
			
	</body>
	
</html>
