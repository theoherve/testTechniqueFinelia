<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Test technique - FINELIA - Formulaire</title>
		<meta name="description" content="En vue d'une future alternance dans cette entreprise, j'ai réalisé le développement de ce système de gestion de notes des étudiants d’un établissement scolaire.">
		<meta name="author" content="Théo HERVÉ">
		<meta name="copyright" content="2021">
		<meta name="robots" content="index, follow">
		<link rel="shortcut icon" type="image/png" href="/ressources/logoFavicon.png"/>
		<link rel="stylesheet" href="./css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>
		<?php include('./sources/header.php') ?>
		<main>
			<form action="./sources/formulaireProcess.php" method="post">
				<div>
					<label>
						<input type="text" name="nom" placeholder="Nom" required>
					</label>
					<label>
						<input type="text" name="prenom" placeholder="Prénom" required>
					</label>
					<label>
						<input type="text" name="age" placeholder="Age">
					</label>
				</div>
				
				<hr>
				
				<div id="matiereNote">
					<div class="matiere">
						<label>
							Matière :
							<input type="text" name="matiere_1" placeholder="Nom de la matière" required>
						</label>
						<label>
							Coefficient :
							<input type="number" name="coef_1" required>
						</label>
						<div class="groupeNote_1" style="display: inline">
							<label id="note_1_1">
								Note :
								<input type="number" name="note_1[]" required>
							</label>
						</div>
						<button onclick="ajouterNote('groupeNote_1')" class="plus">Ajouter une note</button>
						<!--<button onclick="supprimerNote('labelNote1', 'groupeNote1' ) " class="plus">Supprimer une note</button>-->
					</div>
				</div>
				<button onclick="ajouterMatiere()" class="plus">Ajouter une matière</button>
				<div><input type="submit" value="Calculer ma moyenne !"></div>
			</form>
		</main>
		<footer>
			Théo HERVÉ - 2021
		</footer>
	</body>
	<script src="./sources/formulaire.js"></script>
</html>