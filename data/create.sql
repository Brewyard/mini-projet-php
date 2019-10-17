CREATE TABLE Categorie
(
    id smallint PRIMARY KEY,
    libelle varchar,
    idMere smallint,
    FOREIGN KEY (idMere) REFERENCES Categorie(id)
);

CREATE TABLE Article
(
    ref char(8) PRIMARY KEY,
    intitule varchar,
    infos varchar,
    prix numeric(4,2),
    urlPhoto varchar,
    idMere smallint,
    FOREIGN KEY (idMere) REFERENCES Categorie(id)
);

CREATE TABLE Client
(
    email varchar PRIMARY KEY,
    nom varchar,
    prenom varchar,
    mdp varchar,
    adresse varchar,
    tel numeric(10)
);

CREATE TABLE Panier
(
    email varchar,
    ref char(8),
    quantite smallint,
    PRIMARY KEY (email,ref),
    FOREIGN KEY (email) REFERENCES Client(email),
    FOREIGN KEY (ref) REFERENCES Article(ref)
);

CREATE TABLE Commande
(
    email varchar,
    ref char(8),
    quantite smallint,
    PRIMARY KEY (email,ref),
    FOREIGN KEY (email) REFERENCES Client(email),
    FOREIGN KEY (ref) REFERENCES Article(ref)
);
