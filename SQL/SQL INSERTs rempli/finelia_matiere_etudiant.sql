create table matiere_etudiant
(
    idEtudiant int not null,
    idMatiere  int not null,
    constraint fkEtudiantMatiere
        foreign key (idEtudiant) references etudiant (idEtudiant),
    constraint fkMatiereEtudiant
        foreign key (idMatiere) references matiere (idMatiere)
);

INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (7, 3);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (7, 4);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (8, 5);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (8, 6);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (8, 7);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (9, 8);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (9, 9);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (9, 10);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (10, 11);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (10, 12);
INSERT INTO finelia.matiere_etudiant (idEtudiant, idMatiere) VALUES (10, 13);