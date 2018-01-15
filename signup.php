<?php
session_start();
include 'connection.php';
 error_reporting(0);
  $name = $_POST['login'];
  $email = $_POST['email'];
  $pass = $_POST['haslo'];
  
  if($_POST['rejestruj']){
 
	$sql = "INSERT INTO userdata (fname,email,pass,isAdmin)
	VALUES ('$name', '$email', '$pass', '0')";

	if (mysqli_query($conn, $sql)) {
		echo "<h1><center>New record created successfully</center></h1>";
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
            <form method="POST" action="signup.php">
                Login: <input type="text" name="login" required><br><br>
                Hasło: <input type="password" name="haslo" required><br>
                Email: <input type="text" name="email" required><br>
                <input type="submit" value="Utwórz konto" name="rejestruj">
            </form>	
		</div>
		

		
		<div class="footer">Footer</div>
	</div>
	
	
</body>
</html>