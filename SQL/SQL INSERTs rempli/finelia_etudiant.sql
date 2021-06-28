create table etudiant
(
    idEtudiant int auto_increment
        primary key,
    nom        varchar(30) not null,
    prenom     varchar(30) not null,
    age        int(3)      not null
);

INSERT INTO finelia.etudiant (idEtudiant, nom, prenom, age) VALUES (7, 'Hervé', 'Théo', 20);
INSERT INTO finelia.etudiant (idEtudiant, nom, prenom, age) VALUES (8, 'Flantier', 'Noel', 34);
INSERT INTO finelia.etudiant (idEtudiant, nom, prenom, age) VALUES (9, 'Turing', 'Alan', 42);
INSERT INTO finelia.etudiant (idEtudiant, nom, prenom, age) VALUES (10, 'Pearce', 'Aiden', 39);