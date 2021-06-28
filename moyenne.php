<?php
	
	if(!isset($_GET['idEtudiant'])){
		header('Location: moyennes.php');
	}
	
	require('./sources/dbConnection.php');
	$db = getDatabaseConnection();
	
	$selectEtudiant = $db->prepare("SELECT * FROM etudiant WHERE idEtudiant = :idEtudiant");
	$selectEtudiant->bindParam(':idEtudiant', $_GET['idEtudiant'], PDO::PARAM_INT);
	$selectEtudiant->execute();
	$etudiant = $selectEtudiant->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Test technique - FINELIA - Moyenne</title>
		<meta name="description" content="En vue d'une future alternance dans cette entreprise, j'ai réalisé le développement de ce système de gestion de notes des étudiants d’un établissement scolaire.">
		<meta name="author" content="Théo HERVÉ">
		<meta name="copyright" content="2021">
		<meta name="robots" content="index, follow">
		<link rel="shortcut icon" type="image/png" href="/ressources/logoFavicon.png"/>
		<link rel="stylesheet" href="./css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	</head>
	<body>
		<?php include('./sources/header.php') ?>
		<main>
			<h4><?=$etudiant['prenom']?> <?=$etudiant['nom']?> <?=$etudiant['age']?></h4>
			<table class="responsive-table">
				<thead>
					<tr>
						<th>Matière</th>
						<th>Coefficient</th>
						<th id="note" colspan="3">Note</th>
						<th id="moyenne">Moyenne</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						$selectMatiereEtudiant = $db->prepare("SELECT idMatiere FROM matiere_etudiant WHERE idEtudiant = :idEtudiant");
						$selectMatiereEtudiant->bindParam(':idEtudiant', $etudiant['idEtudiant'], PDO::PARAM_INT);
						$selectMatiereEtudiant->execute();
						$idMatieresEtudiant = $selectMatiereEtudiant->fetchAll(PDO::FETCH_ASSOC);
						
						foreach($idMatieresEtudiant as $idMatiereEtudiant){
							$moyenne = 0;
							$coefsDiviseur = 0;
							$selectMatiere = $db->prepare("SELECT nom FROM matiere WHERE idMatiere = :idMatiere");
							$selectMatiere->bindParam(':idMatiere', $idMatiereEtudiant['idMatiere'], PDO::PARAM_INT);
							$selectMatiere->execute();
							$matiere = $selectMatiere->fetch();
							
							$selectNotes = $db->prepare("SELECT note, coefficient FROM note WHERE idEtudiant = :idEtudiant AND idMatiere = :idMatiere");
							$selectNotes->bindParam(':idEtudiant', $etudiant['idEtudiant'], PDO::PARAM_INT);
							$selectNotes->bindParam(':idMatiere', $idMatiereEtudiant['idMatiere'], PDO::PARAM_INT);
							$selectNotes->execute();
							$notesAndCoefs = $selectNotes->fetchAll(PDO::FETCH_ASSOC);
						
							$selectCoef = $db->prepare("SELECT coefficient FROM note WHERE idEtudiant = :idEtudiant AND idMatiere = :idMatiere");
							$selectCoef->bindParam(':idEtudiant', $etudiant['idEtudiant'], PDO::PARAM_INT);
							$selectCoef->bindParam(':idMatiere', $idMatiereEtudiant['idMatiere'], PDO::PARAM_INT);
							$selectCoef->execute();
							$coef = $selectCoef->fetch();
							
							?>
							<tr>
								<td><?=$matiere['nom']?></td>
								<td><?=$coef[0]?></td>
							
							<?php
							
							foreach($notesAndCoefs as $noteAndCoef){
								$moyenne += $noteAndCoef['note'] * $noteAndCoef['coefficient'];
								$coefsDiviseur += $noteAndCoef['coefficient'];
								?><td headers="note"><?=$noteAndCoef['note']?></td><?php
							}
							$moyenne = $moyenne / $coefsDiviseur;
							$moyenne = ceil($moyenne * 100) / 100;
							?><td headers="moyenne"><?=$moyenne?></td><?php
						}
						
						?>
					</tr>
				</tbody>
			</table>
		</main>
		<footer>
			Théo HERVÉ - 2021
		</footer>
	</body>
	<script src="./sources/formulaire.js"></script>
</html>