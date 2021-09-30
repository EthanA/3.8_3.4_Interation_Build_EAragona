<!DOCTYPE html>

<html lang="en">

	<head>
	
		<title>Home</title>
	
		<meta charset="utf-8">
		
		<meta name="Keywords" content="html5, layout, CSS Grid System" />
		
		<meta name="Author" content="Ethan Aragona" />
		
		<meta name="Description" content="CSS grid system practise" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css.css">
	
	</head>

	<body>
	
		<div class="home-grid-container">
			
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
				
			<!--Link to image for banner-->
						
			<div class="header"><img src="banner.jpg" class="banner"><h1>Graeme's Database</h1></div>
			
			<div></div><div></div><div></div><div></div>
				
			<div class="home-content">
			
				
					<h1>
						Songs:
					</h1>
					
					<!--php query for the sum of the database music-->
					<?php
						//connect.php (tells where to connect servername, username, password, dbasename)
						require "13_CSI_Database_Assessment_mysqli.php";
						$query = ("SELECT SUM(Duration)
						FROM `Main` 
						WHERE 1
						");

						$result = mysqli_query($conn, $query);
						
						$row = mysqli_fetch_assoc($result); 
						$sum = $row['SUM(Duration)'];
					?>
					
					<p>
						
						Total Duration:
						<?php 
						
							echo ($sum);
						
						?>
						Seconds
						<hr>
					</p>
					
				
				<div class="scroll-area">
					
					<!--php query to get all the related info from the database-->
					<?php
						//connect.php (tells where to connect servername, username, password, dbasename)
						require "13_CSI_Database_Assessment_mysqli.php";
						$query = ("SELECT t.Title,
						a.Album,
						r.Artist,
						g.Genre,
						m.Duration,
						m.Size
						FROM `Main` as m
						INNER JOIN Album AS a ON m.Album_ID = a.Album_ID
						INNER JOIN Title AS t ON m.Title_ID = t.Title_ID
						JOIN Main2Artist AS z ON m.Music_ID = z.Music_ID
						JOIN Artist AS r ON r.Artist_ID = z.Artist_ID
						JOIN Main2Genre AS y ON m.Music_ID = y.Music_ID
						JOIN Genre AS g ON g.Genre_ID = y.Genre_ID
						");

						$result = mysqli_query($conn, $query);
					
						while($output=mysqli_fetch_assoc($result))
						{
					?>

					<p>
						
						<!--Where the database info is displayed-->
						
						Title: <?php echo $output['Title']; ?> &emsp;&emsp;
						
						Artist: <?php echo $output['Artist']; ?> &emsp;&emsp;
						
						Album: <?php echo $output['Album']; ?> <br>
						
						Genre: <?php echo $output['Genre']; ?> &emsp;&emsp;
						
						Duration: <?php echo $output['Duration']; ?> &emsp;&emsp;
						
						Size: <?php echo $output['Size']; ?> <br><hr>
					</p>
					
					<?php
						}
					?>
					
				</div>
				
			</div>
				
			<div></div><div></div><div></div><div></div>
			
			<div class="footer">
				
				<!--copyright statement-->
				
				<p>© Graeme. All rights reserved.</p>
				
			</div>
		
		</div>
	
	</body>
	
</html>
