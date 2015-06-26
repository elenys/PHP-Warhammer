<?php


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="./css/general.css">
		<link rel="stylesheet" type="text/css" href="./css/action.css">
	</head>
	<body>
		<h1>MENU</h1>
		<div id="player_info">
			<p>Player <?php echo $playerNbr ?></p>
			<p>Player <?php echo $playerName ?></p>
		</div>
		<div id="ship_selection">
			<form action="action.php" method="post">
				<input type="submit" name="submit" value="selectShip">
			</form>
			<select name="ship" size="1">
					<option value="<?php echo $shipName ?>"><?php echo $shipName ?></option>
			</select>
		</div>
		<form action="login.php" method="post">
			Login : <input type="text" name="login">
			Password : <input type="password" name="password">
			<input type="submit" name="submit" value="Log-in" class="button">
		</form>
	</body>