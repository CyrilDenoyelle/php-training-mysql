<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>reussite</title>
</head>
<body>
	<a href="read.php">Voir les rando</a>
	<?php 
	try {
		$bdh = new PDO('mysql:host=localhost;dbname=reunion_island','root','root');
	} catch (PDOException $e) {
		print "Erreur !:".$e->getMessage()."<br />";
		die();
	}

	// $bdh->exec("INSERT INTO hiking(name,difficulty,distance,duration,height_difference) VALUES('testage','difficile','123',123,123)");
	
	if(isset($_POST['update'])){
		$name = utf8_decode($_POST['name']);
		$difficulty = $_POST['difficulty'];
		$distance = $_POST['distance'];
		$duration = $_POST['duration'];
		$height_difference = $_POST['height_difference'];
		$id = $_POST['id'];

		echo $_POST['id'];

		$res = $bdh->prepare("UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference WHERE id = :id;");

		$req = $res->execute(array(
			':name'=>$name,
			':difficulty'=>$difficulty,
			':distance'=>intval($distance),
			':duration'=>$duration,
			':height_difference'=>intval($height_difference),
			':id'=>$id
			));
	}
	if(!$res){
		echo "erreur";
		print_r($bdh->errorCode());
	}else{
		echo "<h2>update terminée</h2>";

	}

	if(isset($_POST['create'])){
		$name = $_POST['name'];
		$difficulty = $_POST['difficulty'];
		$distance = $_POST['distance'];
		$duration = $_POST['duration'];
		$height_difference = $_POST['height_difference'];

		$req = $bdh->prepare("INSERT INTO hiking(name,difficulty,distance,duration,height_difference) VALUES(:name, :difficulty, :distance, :duration, :height_difference);");

		$res = $req->execute(array(
			':name'=>$name,
			':difficulty'=>$difficulty,
			':distance'=>intval($distance),
			':duration'=>$duration,
			':height_difference'=>intval($height_difference)
			));
	}
	if(!$res){
		echo "erreur";
		print_r($bdh->errorCode());
	}else{
		echo "<h2>ajout terminée</h2>";

	}
	?>
	<a href="read.php">retour</a>
</body>
</html>