function ajouterMatiere(){
	let nextMatiere = document.getElementById("matiereNote");
	let tabMatiere = document.getElementsByClassName("matiere");
	
	nextMatiere.innerHTML +=
		'<div class="matiere">' +
			'<label>Matière : ' +
				'<input type="text" name="matiere_' + (tabMatiere.length + 1) + '" placeholder="Nom de la matière" required>' +
			'</label>' +
			'<label> Coefficient : ' +
				'<input type="number" name="coef_' + (tabMatiere.length + 1) + '" required>' +
			'</label>' +
			'<div class="groupeNote_' + (tabMatiere.length + 1) + '" style="display: inline">' +
				'<label id="note_' + (tabMatiere.length + 1) + '_1"> Note : ' +
					// '<input type="number" name="note_' + (tabMatiere.length + 1) + '_1" required>' +
					'<input type="number" name="note_' + (tabMatiere.length + 1) + '[]" required>' +
				'</label>' +
			'</div>' +
			'<button onClick="ajouterNote(' + "'" + 'groupeNote_' + (tabMatiere.length+1) + "'" +')" class="plus" >Ajouter une note</button>' +
		'</div>';
}

function ajouterNote(groupeNote){
	let divGroupeNote = document.getElementsByClassName(groupeNote)[0];
	let nbrMatiere = groupeNote.split("_");
	$(divGroupeNote).find("label").length;
	
	divGroupeNote.innerHTML +=
		'<label id="note_' + nbrMatiere[1] + '_'+ ($(divGroupeNote).find("label").length+1) + '"> Note : ' +
			'<input type="number" name="note_' + nbrMatiere[1] + '[]" required>' +
		'</label>';
}

// function supprimerNote(idLabelNote, groupeNote){
//
//
//
// 	if(idLabelNote === 'labelNote1'){
// 		alert('Attention, vous ne pouvez pas supprimer cette note, c\'est votre dernière');
// 	}else{
// 		let parent = document.getElementsByClassName(groupeNote)[0];
// 		let child = document.getElementById(idLabelNote);
//
// 		parent.removeChild(child);
// 	}
// }
//
// // '<button onClick="supprimerNote(' + "'" + 'labelNote' + (numberId.length+1) + "'" + ', \''+ groupeNote + '\')" class="plus">Supprimer une note</button>';