	<?php
	session_start();
	include 'connection.php';
	 error_reporting(0);
	  $id = $_POST['id'];
	  
	  if(!$_POST['deleteuser']){
	 
	$sql = "DELETE FROM userdata WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
		
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	}

	else {

	}
	?>

	<!DOCTYPE HTML>
	<html lang="pl">
	<head>

		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<title>Startravel</title>
		
		<meta name="description" content="Serwis poświęcony ogłoszeniom o wycieczkach" />
		<meta name="keywords" content="wycieczki, ludzie, wakacje," />
		
		<link href="style.css" rel="stylesheet" type="text/css" />

		
	</head>

	<body>

		<div class="wrapper">
			<div class="header">
			
				<div class="logo" style="text-align:center">
					<img src="startravel.png" style="display:inline-block"/>

				</div>
			</div>
			<div class="nav">
				<ol>
					<li><a href="index.php">Strona główna</a>
					<?php
					if(!isset($_SESSION['isAdmin']))
						echo "<li><a href='login.php'>Zaloguj się</a>";
					?>
					<?php
					if(!isset($_SESSION['isAdmin']))
					echo "<li><a href='signup.php'>Zarejestruj się</a>"
					?>
					<?php
					if(isset($_SESSION['isAdmin']))
					echo "<li><a href='addtrip.php'>Dodaj wycieczkę</a>"
					
					?>
					<?php
					if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
						echo "<li><a href='deletetrip.php'>Usuń wycieczkę</a>"
					?>
					<?php
					if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
						echo "<li><a href='deleteuser.php'>Usuń użytkownika</a>"
					?>
					<?php
					if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1)
						echo "<li><a href='edittrip.php'>Edytuj wycieczkę</a>"
					?>
					<?php
					if(isset($_SESSION['isAdmin']))
						echo "<li><a href='logout.php'>Wyloguj</a>";
					?>
					
				</ol>
			
			</div>
			
			<div class="content">
				<form method="POST" action="deleteuser.php">
					Podaj id użytkownika: <input type="text" name="id" required><br>			
					<input type="submit" value="Usuń użytkownika" name="deleteuser">
				</form>	
				
				<?php
				include 'connection.php';
				$sql = "SELECT * FROM userdata";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
			   
				while($row = mysqli_fetch_assoc($result)) {
				echo  " <br> " . "ID: " . $row["id"]. "<br>" . "  login: " . $row["fname"].  " <br> " .  "email: " . $row["email"] . "<br>" ."  Czy admin?: " . $row["isAdmin"]. "<br>";
				 }
				} else {
				echo "<h3><center>No user data found!<center></h3>";
				}
				?>
			</div>
			

			
			<div class="footer">Footer</div>
		</div>
		
		
	</body>
	</html>