<?php include 'script.php' ?>
<?php $con = db_connect(); ?>
<!DOCTYPE html>
<html>
<head>
<title>jQuery</title>
<script type="text/javascript" src="jquery-2.1.1.js"></script>
<script type='text/javascript' src="game.js"></script>
<style>

html {
  box-sizing: border-box;
}
*, *:before, *:after {
  box-sizing: border-box;
}

div.lights_on{
  background: url(L_on.png);
  background-size: 70px 70px;
  background-repeat: no-repeat;
	width: 70px;
	height: 70px;
}
div.lights_off{
  background: url(L_off.png);
  background-size: 70px 70px;
  background-repeat: no-repeat;
	width: 70px;
	height: 70px;
}

div.lights_on,
div.lights_off {
    border: 1px solid transparent;
    cursor: pointer;
} 

div.lights_on:hover,
div.lights_off:hover {
    background-color: #000;
    border: 1px solid blue;
    border-top-left-radius: 10px;
		border-top-right-radius: 10px; 
		border-bottom-right-radius: 10px;
		border-bottom-left-radius: 10px; 
    
}

div.instructions, #tableplace{
	display: inline-block;
	vertical-align: top;
	padding: 10px;
}

div.instructions{
	width: 400px;
}

a.clickable{
	width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-decoration: none;
}


</style>
</head>
<body>
	<h1 id="title">Lights out</h1>
	<div class="win">
		<h1>Congratulations!</h1>
		<p>Press "New Game" below to start a new game.</p>
	</div>
	<hr>
	<div class="main">
		<div id="tableplace">
		</div>
		<div class="instructions">
			In order to win this game you have to <strong>turn on</strong> all the lights. By clicking on a light bulb, you are <strong>switching</strong> its state and and its immediate neighbours (above, below, left, right).
		</div>
	</div>
	<hr>
	<button type="button" id="new_game">New Game</button>
	<hr>
	<p>TOP 50 (Lower is better)</p>
	<?php query_all($con); ?>
	<?php disconnect($con); ?>
	<hr>
	Contact: <a href="mailto:cristian.berceanu@1and1.ro">cristian.berceanu@1and1.ro</a>
</body>
</html>
