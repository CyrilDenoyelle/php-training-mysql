<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Randonnées</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<?php 
	try {
		$bdh = new PDO('mysql:host=localhost;dbname=reunion_island','root','root');
	} catch (PDOException $e) {
		print "Erreur !:".$e->getMessage()."<br />";
		die();
	}
	?>
	<h2>Liste des randonnées</h2>
	<table border=1px>
		<tr>
			<th>name</th>
			<th>difficulty</th>
			<th>distance</th>
			<th>duration</th>
			<th>height_difference</th>
		</tr>
		<?php 
		foreach($bdh->query('SELECT * FROM hiking') as $row){
			echo utf8_encode("<tr><td><a href='update.php?id=".$row['id']."'>" . $row['name'] . '</a></td>
				<td>' . $row['difficulty'] . '</td><td>' . $row['distance'] . '</td>
				<td>' . $row['duration'] . '</td><td>' . $row['height_difference'] . '</td>
				</tr>');
		}
		 ?>
	</table>

	<a href="/create.php">Ajouter une rando</a>
</body>
</html>
