<?php
	require('./sources/dbConnection.php');
	$db = getDatabaseConnection();
	
	$selectEtudiant = $db->prepare("SELECT * FROM etudiant ORDER BY idEtudiant DESC");
	$selectEtudiant->execute();
	$etudiants = $selectEtudiant->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Test technique - FINELIA - Moyennes</title>
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
			<table class="centered">
				<thead>
					<tr>
						<th>Prénom</th>
						<th>Nom</th>
						<th>Âge</th>
						<th>Moyenne</th>
					</tr>
				</thead>
				
				<tbody>
					<?php
						foreach($etudiants as $etudiant){
							$moyenne = 0;
							$coefsDiviseur = 0;
							$selectMatiereEtudiant = $db->prepare("SELECT idMatiere FROM matiere_etudiant WHERE idEtudiant = :idEtudiant");
							$selectMatiereEtudiant->bindParam(':idEtudiant', $etudiant['idEtudiant'], PDO::PARAM_INT);
							$selectMatiereEtudiant->execute();
							$idMatieresEtudiant = $selectMatiereEtudiant->fetchAll(PDO::FETCH_ASSOC);
							
							foreach($idMatieresEtudiant as $idMatiereEtudiant){
								
								$selectMatiere = $db->prepare("SELECT nom FROM matiere WHERE idMatiere = :idMatiere");
								$selectMatiere->bindParam(':idMatiere', $idMatiereEtudiant['idMatiere'], PDO::PARAM_INT);
								$selectMatiere->execute();
								$matiere = $selectMatiere->fetch();
								
								$selectNotes = $db->prepare("SELECT note, coefficient FROM note WHERE idEtudiant = :idEtudiant AND idMatiere = :idMatiere");
								$selectNotes->bindParam(':idEtudiant', $etudiant['idEtudiant'], PDO::PARAM_INT);
								$selectNotes->bindParam(':idMatiere', $idMatiereEtudiant['idMatiere'], PDO::PARAM_INT);
								$selectNotes->execute();
								$notesAndCoefs = $selectNotes->fetchAll(PDO::FETCH_ASSOC);
								
								foreach($notesAndCoefs as $noteAndCoef){
									$moyenne += $noteAndCoef['note'] * $noteAndCoef['coefficient'];
									$coefsDiviseur += $noteAndCoef['coefficient'];
								}
								
							}
							$moyenne = $moyenne / $coefsDiviseur;
							$moyenne = ceil($moyenne * 100) / 100
							?>
							
							<tr onclick="window.location.href='moyenne.php?idEtudiant=<?=$etudiant['idEtudiant']?>'">
								<td><?=$etudiant['prenom']?></td>
								<td><?=$etudiant['nom']?></td>
								<td><?=$etudiant['age']?></td>
								<td><?=$moyenne?></td>
							</tr>
					<?php } ?>
				</tbody>
			</table>
		</main>
		<footer>
			Théo HERVÉ - 2021
		</footer>
	</body>
	<script src="./sources/formulaire.js"></script>
</html>