create table etudiant
(
    idEtudiant int auto_increment
        primary key,
    nom        varchar(30) not null,
    prenom     varchar(30) not null,
    age        int(3)      not null
);

create table matiere
(
    idMatiere int auto_increment
        primary key,
    nom       varchar(150) not null
);

create table matiere_etudiant
(
    idEtudiant int not null,
    idMatiere  int not null,
    constraint fkEtudiantMatiere
        foreign key (idEtudiant) references etudiant (idEtudiant),
    constraint fkMatiereEtudiant
        foreign key (idMatiere) references matiere (idMatiere)
);

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


