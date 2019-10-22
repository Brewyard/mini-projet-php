CREATE TABLE Categorie
(
    id smallint PRIMARY KEY,
    libelle varchar,
    idMere smallint,
    FOREIGN KEY (idMere) REFERENCES Categorie(id)
);

CREATE TABLE Article
(
    ref numeric(8) PRIMARY KEY,
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

INSERT INTO Commande(email, ref, quantite) VALUES
    ('michel@hotmail.fr', '69173685', 5),
    ('pierrot@hotmail.fr', '69598326', 16),
    ('jacquie@hotmail.fr', '69681136', 2),
    ('ta4l@hotmail.fr', '68385275', 4),
    ('ellest@hotmail.fr', '69608644', 3),
    ('pourrie@hotmail.fr', '69681136', 1),
    ('michou@hotmail.fr', '68137643', 20),
    ('mivis@hotmail.fr', '69497190', 14),
    ('rosie@hotmail.fr', '68618312', 11),
    ('peter@hotmail.fr', '68385275', 2),
    ('parker@hotmail.fr', '69706294', 3),
    ('percy@hotmail.fr', '69173685', 3),
    ('homersimpson@hotmail.fr', '69612781', 114);




INSERT INTO Article(ref, intitule, infos, idMere, prix, urlPhoto) VALUES
    ('69173685','Abri de jardin en bois Malo', '4m², ép. 19mm',4,549.00,'69173685.jpg'),
    ('69394192','Abri en bois NATERIAL LUOTO', '8.6 m², ép. 28 mm',4,1099.00,'69394192.jpg'),
    ('69681136','Abri en métal NATERIAL Lm 106 + kit ancrage', '5m², ép. 0.08 mm',4,199.00,'69681136.jpg'),
    ('69598326','Abri de jardin en bois NATERIAL Negran', '4.32m², ép. 12mm',4,349.00,'69598326.jpg'),
    ('69509622','Abri de jardin en bois Vannes, 10m²', 'ép. 28mm',4,1190.00,'69509622.jpg'),
    ('68137643','Abri de jardin en métal ARROW Lm 65', '2.93 m²',4,149.00,'68137643.jpg'),
    ('69704026','Abri de jardin en métal NATERIAL Lm109 + kit gratuit', '7,8m², ép. 8mm',4,299.00,'69704026.jpg'),
    ('67641245','Abri de jardin en métal ARROW Lm 1014/hg', '12.00 m²',4,499.00,'67641245.jpg'),
    ('69509601','Abri de jardin en bois Ormes, 7.5m²', 'ép. 28mm',4,990.00,'69509601.jpg'),
    ('68385275','Abri de jardin en bois STOCKHOLM 2', '11.39m², ép. 28mm',4,1750.00,'68385275.jpg'),
    ('69706294','Abri de jardin en bois KIVIK, 6.75m²', 'ép. 28mm',4,1090.00,'69706294.jpg'),
    ('69608644','Abri de jardin en bois NATERIAL FLAVIE', '6.77m², ép. 28mm',4,819.00,'69608644.jpg'),
    ('66970085','Abri de jardin en métal ARROW Lm 106', '5.67 m²',4,250.00,'66970085.jpg'),
    ('68385261','Abri de jardin en bois Ermitage', '11.09m², ép. 28mm',4,1290.00,'68385261.jpg'),
    ('67378451','Abri de jardin en métal Avant-garde L', '5.72 m²',4,1759.00,'67378451.jpg'),
    ('69609141','Abri de jardin en bois NATERIAL SEPPO', '11.58m², ép. 28mm',4,1590.00,'69609141.jpg'),
    ('69497190','Abri de jardin en bois Flore', '5.39m², ép. 28mm',4,790.00,'69497190.jpg'),
    ('68393003','Abri de jardin en bois NAGGEN', '11.22m², ép. 34mm',4,2520.00,'68393003.jpg'),
    ('69612851','Abri de jardin en bois NATERIAL TIIA', '11.51m², ép. 34mm',4,1880.00,'69612851.jpg'),
    ('69598333','Abri de jardin en bois NATERIAL Morvan', '6.15m², ép. 19mm',4,579.00,'69598333.jpg'),
    ('68215336','Abri de jardin en résine Landmark', '4.53m², ép. 23mm',4,1325.00,'68215336.jpg'),
    ('68618312','Abri de jardin en bois Tournon', '4m², ép. 19mm',4,589.00,'68618312.jpg'),
    ('66844624','Abri de jardin en métal ARROW Lm 86', '4.58 m²',4,249.00,'66844624.jpg'),
    ('69598270','Abri de jardin en bois NATERIAL Nervic', '3.24m², ép. 12mm',4,319.00,'69598270.jpg'),
    ('67359894','Abri de jardin en métal Avant-garde XL', '7.8 m²',4,2089.00,'67359894.jpg'),
    ('68751396','Abri de jardin en résine Prenium 65', '2.3m², ép. 16mm',4,459.00,'68751396.jpg'),
    ('69054594','Abri de jardin en bois Montlieu', '9m², ép. 28mm',4,1290.00,'69054594.jpg'),
    ('69612781','Abri de jardin en bois NATERIAL ESKO', '17.72m², ép. 28mm',4,2150.00,'69612781.jpg');

INSERT INTO Categorie(id,libelle,idMere) VALUES
    (1,'Produits',1),
    (2,'Terrasse et Jardin',1),
    (3,'Abri, garage, rangement et étendage',2),
    (4,'Abri de jardin',3),
    (5,'Décoration & Eclairage',1),
    (6,'Luminaire intérieur',5),
    (7,'Applique murale',6),
    (8,'Eclairage de salle de bains',6),
    (9,'Outillage',1),
    (10,'Outillage à main',9),
    (11,'Clé et douille',10),
    (12,'Petit rangement (coffre, étagère, ...)',3),
    (13,'Coussin, plaid et pouf',5),
    (14,'Coussin et housse de coussin',13),
    (15,'Rideau, voilage et vitrage',5),
    (16,'Embrasse et gland',15),
    (17,'Galette de chaise, coussin de sol et pouf',13),
    (18,'Garage et carport',3),
    (19,'Carrelage, parquet & sol souple',1),
    (20,'Moquette, jonc de mer et sisal',19),
    (21,'Jonc de mer, sisal et fibre naturelle pour sol',20),
    (22,'Lampe',6),
    (23,'Lustre, suspension et plafonnier',6),
    (24,'Marteau',10),
    (25,'Moquette de sol en rouleau',20),
    (26,'Tapis et paillasson',19),
    (27,'Paillasson, tapis de propreté',26),
    (28,'Perceuse, ponceuse, meuleuse et scie électrique',9),
    (29,'Perceuse sans fil et visseuse',28),
    (30,'Rideau',15),
    (31,'Spot',6),
    (32,'Tapis de décoration',26),
    (33,'Vitrage, brise-bise',15),
    (34,'Voilage',15);
