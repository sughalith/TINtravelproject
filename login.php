<?php
session_start();
include 'connection.php';


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
			</li>
			<li><a href="#">Przeglądaj oferty</a>
			</li>
			<?php
			if(!isset($_SESSION['isAdmin']))
				echo "<li><a href='login.php'>Zaloguj się</a></li>";
			?>
			<li><a href="signup.php">Zarejestruj się</a>
			</li>
			<li><a href="addtrip.php">Dodaj wycieczkę</a>
			</li>
			<?php
			if($_SESSION['isAdmin'] == 1)
				echo "<li><a href='deletetrip.php'>Usuń wycieczkę</a>"
			?>
			</li>
			<?php
			if(isset($_SESSION['isAdmin']))
				echo "<li><a href='logout.php'>Wylogj</a></li>";
			?>
			
			</ol>
		
		</div>
		
        <div class="content">
            <form method="POST" action="login.php">
                Login: <input type="text" name="login"><br><br>
                Hasło: <input type="password" name="haslo"><br>
                <input type="submit" value="Zaloguj się" name="log">
            </form>
        </div>
        <?php
		if (isset($_POST['log']))
		{
		$login = $_POST['login'];
		$password = $_POST['haslo'];

		$result = mysqli_query($conn, "SELECT fname, pass, isAdmin FROM userdata WHERE fname = '".$login."' AND pass = '".$password."';");

		if (mysqli_num_rows($result) > 0) {

			while($row = mysqli_fetch_assoc($result)) {
				$_SESSION['isAdmin'] = $row['isAdmin'];
				 }


			header('Location: index.php');
		}
		else echo "<p>Wpisano złe dane.</p>";
		}

        ?>
		<div class="footer">Footer</div>
	</div>
	
	
</body>
</html>