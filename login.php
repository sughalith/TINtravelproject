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
				<li><a href="login.html">Zaloguj się</a>
				</li>
				<li><a href="signup.php">Zarejestruj się</a>
				</li>
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

if (mysql_num_rows(mysql_query("SELECT fname, pass FROM userdata WHERE login = '".$login."' AND password = '".$password."';")))
{

    $_SESSION['logged'] = true;

    header('Location: index.php');
}
else echo "<p>Wpisano złe dane.</p>";
}

        ?>
		<div class="footer">Footer</div>
	</div>
	
	
</body>
</html>