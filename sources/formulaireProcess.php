<?php
	//envoie de toutes les infos en bdd et redirection vers la page "moyennes.php" où seront effectué les calculs
	
	require('dbConnection.php');
	$db = getDatabaseConnection();
	
	$postArray = array();
	foreach ($_POST as $key => $value) {
		$tmp = explode("_", $key);
		$postArray[$tmp[1]][$tmp[0]] = $value;
	}
	unset($postArray['']);

?>
	<pre>
		<?php print_r($postArray); ?>
	</pre>
<?php
	
	if(isset($_POST)){
		
		if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age'])){
			$insertEtudiantQuery = $db->prepare('INSERT INTO etudiant (nom, prenom, age) VALUES (:nom, :prenom, :age)');
			$insertEtudiantQuery->bindValue(':nom', htmlspecialchars(trim($_POST['nom'])),PDO::PARAM_STR);
			$insertEtudiantQuery->bindValue(':prenom', htmlspecialchars(trim($_POST['prenom'])),PDO::PARAM_STR);
			$insertEtudiantQuery->bindValue(':age', htmlspecialchars(trim($_POST['age'])),PDO::PARAM_INT);
			$insertEtudiantQuery->execute();
			$idEtudiant = $db->lastInsertId();
			
			foreach($postArray as $matiereAndNotes){
				
				?>
				<pre>
					<?php print_r($matiereAndNotes); ?>
				</pre>
				<?php
				
				sendMatiereAndNotes($db, $matiereAndNotes, $idEtudiant);
			}
			
		}
		
	}else{
		header('Location: ../formulaire.php');
	}
	
	header('Location: ../moyennes.php');
	
	function sendMatiereAndNotes(pdo $db, array $matiereAndNotes, int $idEtudiant): void{
		$insertMatiereQuery = $db->prepare('INSERT INTO matiere (nom) VALUES (:nom)');
		$insertMatiereQuery->bindValue(':nom', htmlspecialchars(trim($matiereAndNotes['matiere'])), PDO::PARAM_STR);
		$insertMatiereQuery->execute();
		
		$idMatiere = $db->lastInsertId();
		
		$insertMatiereEtudiantQuery = $db->prepare('INSERT INTO matiere_etudiant (idEtudiant, idMatiere) VALUES (:idEtudiant, :idMatiere)');
		$insertMatiereEtudiantQuery->bindParam(':idEtudiant', $idEtudiant, PDO::PARAM_INT);
		$insertMatiereEtudiantQuery->bindParam(':idMatiere', $idMatiere, PDO::PARAM_INT);
		$insertMatiereEtudiantQuery->execute();
		
		foreach($matiereAndNotes['note'] as $note){
			$insertNotesQuery = $db->prepare('INSERT INTO note (note, coefficient, idEtudiant, idMatiere) VALUES (:note, :coefficient, :idEtudiant, :idMatiere)');
			$insertNotesQuery->bindValue(':note', htmlspecialchars(trim($note)), PDO::PARAM_INT);
			$insertNotesQuery->bindValue(':coefficient', htmlspecialchars(trim($matiereAndNotes['coef'])), PDO::PARAM_INT);
			$insertNotesQuery->bindParam(':idEtudiant', $idEtudiant, PDO::PARAM_INT);
			$insertNotesQuery->bindParam(':idMatiere', $idMatiere, PDO::PARAM_INT);
			$insertNotesQuery->execute();
		}
		
	}
	