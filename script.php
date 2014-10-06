<?php

function db_connect()
{
$connection=mysqli_connect("localhost","root","admin","PHPDB")
	or die(mysqli_connect_error());
return $connection;
}

function query_all($connection)
{
$result = mysqli_query($connection,"SELECT * FROM score order by score limit 50");
echo <<<END
<table id="top50">
	<tr>
		<td><b>Name</b></td>
		<td><b>Score</b></td>
	</tr>
END;
while($row = mysqli_fetch_array($result)) {
echo <<<END
		<tr>
			<td>{$row['name']}</td>
			<td>{$row['score']}</td>
		</tr>
END;
}
echo "</table>";
}
function listener(){
		if(isset($_POST['name']) && isset($_POST['score'])){
			$name = mysqli_real_escape_string($connection,$_POST['name']);
			$score = mysqli_real_escape_string($connection,$_POST['score']);
			mysqli_query($connection,"INSERT into score (name,score) VALUES ('$name','$score')");
		}
}
function disconnect($connection)
{
	mysqli_close($connection);
}
?>
