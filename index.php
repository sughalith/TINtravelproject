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
				</li>
				<li><a href="#">Przeglądaj oferty</a>
				</li>
				<li><a href="login.html">Zaloguj się</a>
				</li>
				<li><a href="signup.php">Zarejestruj się</a>
				</li>
				<li><a href="addtrip.php">Dodaj wycieczkę</a>
				</li>
				<li><a href="deletetrip.php">Usuń wycieczkę</a>
				</li>
				
			</ol>
		
		</div>
		
		<div class="content">
<?php
    include 'connection.php';
	
	
	
	$sql = "SELECT * FROM trip";
	$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   
    while($row = mysqli_fetch_assoc($result)) {
    echo "<h4>ID: </h4>" . $row["id"]. "<br>" . "  Cel: " . $row["cel"].  " <br> " .  "Opis: " . $row["opis"] .  "<br>" . "Czar trwania: " . $row["trwanie"]. "<br>" . "Test: " . $row["zdjecie"] .  "<br>" ."<br><br><br>";
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