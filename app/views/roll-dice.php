<?
	$randomNumber = rand(1,6);
?>
<html>
<head>
	<title>Roll Dice Game</title>
</head>
<body>
	<div>
		The number was <?= $randomNumber?>
	</div>
	<div>
		The number was <?= $guess?>
	</div>
	<div>
		<?php if($randomNumber == $guess){
			echo "You win!";
		}else{
			echo "Wow you suck";
		}
		?>
	</div>
</body>
</html>