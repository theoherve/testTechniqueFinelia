create table note
(
    idNote      int auto_increment
        primary key,
    note        int    not null,
    coefficient double not null,
    idEtudiant  int    not null,
    idMatiere   int    not null,
    constraint fkEtudiantNote
        foreign key (idEtudiant) references etudiant (idEtudiant),
    constraint fkMatiereNote
        foreign key (idMatiere) references matiere (idMatiere)
);

INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (1, 15, 1, 7, 3);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (2, 16, 1, 7, 3);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (3, 12, 2, 7, 4);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (4, 15, 1, 7, 4);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (5, 20, 1, 7, 4);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (6, 15, 1, 8, 5);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (7, 16, 1, 8, 5);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (8, 11, 1, 8, 6);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (9, 12, 1, 8, 7);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (10, 15, 3, 9, 8);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (11, 12, 3, 9, 8);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (12, 12, 4, 9, 9);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (13, 16, 4, 9, 9);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (14, 18, 2, 9, 10);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (15, 11, 2, 9, 10);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (16, 15, 2, 9, 10);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (17, 12, 2, 10, 11);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (18, 15, 2, 10, 11);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (19, 14, 2, 10, 11);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (20, 20, 5, 10, 12);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (21, 18, 4, 10, 13);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (22, 11, 4, 10, 13);
INSERT INTO finelia.note (idNote, note, coefficient, idEtudiant, idMatiere) VALUES (23, 16, 4, 10, 13);