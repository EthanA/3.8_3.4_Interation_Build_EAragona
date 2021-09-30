<!DOCTYPE html>

<html lang="en">

	<head>
	
		<title>Contact</title>
	
		<meta charset="utf-8">
		
		<meta name="Keywords" content="html5, layout, CSS Grid System" />
		
		<meta name="Author" content="Ethan Aragona" />
		
		<meta name="Description" content="CSS grid system practise" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css.css">
	
	</head>

	<body>
	
		<div class="contact-grid-container">
			
			<div class="nav">
			
				<ul>
					
					<!--Links to other pages-->
				
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
				
			<div class="contact-content">
			
				<?php
				//Get the connection to the database
					require_once("13_DIT_contactform_mysqli.php")
				?>
				
				<!--The form the user's fill to contact us-->
				
				<form action="connect.php" method="post">
				
				<h1>
					Contact Us
				</h1>

				<h2 for="name">
					Name:
				</h2>

				<input type = "text" id="name" name = "name" placeholder="Enter your name"/> <br />

				<h2 for="email">
					Email:
				</h2>

				<input type = "text" id="email" name = "email" placeholder="Enter your email"/> <br />

				<h2 for="subject">
					Subject:
				</h2>

				<input type = "text" id="subject" name="subject" placeholder="Enter the subject of your query"/> <br />

				<h2 for="description">
					Description:
				</h2>

				<textarea type = "comment" id="description" name="description" placeholder="Enter the description of your query"></textarea> <br />

				<input type="submit" value="Submit">
				
			</div>
				
			<div></div><div></div>
			
		</div>
		
		<div class="copyright_contact">
			
			<!--copyright statement-->
			
			<p>© Graeme. All rights reserved.</p>
			
		</div>
			
	</body>
	
</html>
