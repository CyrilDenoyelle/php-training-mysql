<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modif randonnées</title>
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

	foreach($bdh->query('SELECT * FROM hiking where id = '.$_GET['id']) as $row){
		$name = utf8_decode($row['name']);
		$d = utf8_decode($row['difficulty']);
		$distance = intval($row['distance']);
		$duration = intval($row['duration']);
		$height_difference = intval($row['height_difference']);
	};

	?>
	<a href="/read.php">Liste des données</a>
	<h1>Modifier</h1>
	<?php 
	echo "<form action='reussite.php' method='POST'>
	<div>
		<label for='name'>Name</label>
		<input type='text' name='name' value='$name'>
	</div>

	<div>
		<label for='difficulty'>Difficulté</label>
		<select name='difficulty'>";
			?>
			<option value='tres facile' <?php if($d=='tres facile'){echo "selected";} ?> >Très facile</option>
			<option value='facile' <?php if($d=='facile'){echo "selected";} ?>>Facile</option>
			<option value='moyen' <?php if($d=='moyen'){echo "selected";} ?>>Moyen</option>
			<option value='difficile' <?php if($d=='difficile'){echo "selected";} ?>>Difficile</option>
			<option value='tres difficile' <?php if($d=='tres difficile'){echo "selected";} ?>>Très difficile</option>
			<?php 
			echo "</select>
		</div>

		<div>
			<label for='distance'>Distance</label>
			<input type='text' name='distance' value='$distance'>
		</div>
		<div>
			<label for='duration'>Durée</label>
			<input type='duration' name='duration' value='$duration'>
		</div>
		<div>
			<label for='height_difference'>Dénivelé</label>
			<input type='text' name='height_difference' value='$height_difference'>
		</div>
		<input style='display:none;' name='id' value='".$_GET['id']."'>
		<button type='submit' name='update' value='ok'>Mettre a jour</button>
	</form>";
	?>
</body>
</html>
