DROP TABLE Categorie;
DROP TABLE Article;
DROP TABLE Client;
DROP TABLE Panier;
DROP TABLE Commande;

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
    ref numeric(8),
    quantite smallint,
    PRIMARY KEY (email,ref),
    FOREIGN KEY (email) REFERENCES Client(email),
    FOREIGN KEY (ref) REFERENCES Article(ref)
);

INSERT INTO Categorie(id,libelle,idMere) VALUES
    (1, 'Produits',1),
    (2, 'Terrasse et Jardin',1),
    (3, 'Abri, garage, rangement et étendage',2),
    (4, 'Abri de jardin',3),
    (5, 'Décoration & Eclairage',1),
    (6, 'Luminaire intérieur',5),
    (7, 'Applique murale',6),
    (8, 'Eclairage de salle de bains',6),
    (9, 'Outillage',1),
    (10, 'Outillage à main',9),
    (11, 'Clé et douille',10),
    (12, 'Petit rangement (coffre, étagère, ...)',3),
    (13, 'Coussin, plaid et pouf',5),
    (14, 'Coussin et housse de coussin',13),
    (15, 'Rideau, voilage et vitrage',5),
    (16, 'Embrasse et gland',15),
    (17, 'Galette de chaise, coussin de sol et pouf',13),
    (18, 'Garage et carport',3),
    (19, 'Carrelage, parquet & sol souple',1),
    (20, 'Moquette, jonc de mer et sisal',19),
    (21, 'Jonc de mer, sisal et fibre naturelle pour sol',20),
    (22, 'Lampe',6),
    (23, 'Lustre, suspension et plafonnier',6),
    (24, 'Marteau',10),
    (25, 'Moquette de sol en rouleau',20),
    (26, 'Tapis et paillasson',19),
    (27, 'Paillasson, tapis de propreté',26),
    (28, 'Perceuse, ponceuse, meuleuse et scie électrique',9),
    (29, 'Perceuse sans fil et visseuse',28),
    (30, 'Rideau',15),
    (31, 'Spot',6),
    (32, 'Tapis de décoration',26),
    (33, 'Vitrage, brise-bise',15),
    (34, 'Voilage',15);

INSERT INTO Article(ref, intitule, infos, idMere, prix, urlPhoto) VALUES
    ('69173685', 'Abri de jardin en bois Malo', '4m², ép. 19mm',4,549.00, '69173685.jpg'),
    ('69394192', 'Abri en bois NATERIAL LUOTO', '8.6 m², ép. 28 mm',4,1099.00, '69394192.jpg'),
    ('69681136', 'Abri en métal NATERIAL Lm 106 + kit ancrage', '5m², ép. 0.08 mm',4,199.00, '69681136.jpg'),
    ('69598326', 'Abri de jardin en bois NATERIAL Negran', '4.32m², ép. 12mm',4,349.00, '69598326.jpg'),
    ('69509622', 'Abri de jardin en bois Vannes, 10m²', 'ép. 28mm',4,1190.00, '69509622.jpg'),
    ('68137643', 'Abri de jardin en métal ARROW Lm 65', '2.93 m²',4,149.00, '68137643.jpg'),
    ('69704026', 'Abri de jardin en métal NATERIAL Lm109 + kit gratuit', '7,8m², ép. 8mm',4,299.00, '69704026.jpg'),
    ('67641245', 'Abri de jardin en métal ARROW Lm 1014/hg', '12.00 m²',4,499.00, '67641245.jpg'),
    ('69509601', 'Abri de jardin en bois Ormes, 7.5m²', 'ép. 28mm',4,990.00, '69509601.jpg'),
    ('68385275', 'Abri de jardin en bois STOCKHOLM 2', '11.39m², ép. 28mm',4,1750.00, '68385275.jpg'),
    ('69706294', 'Abri de jardin en bois KIVIK, 6.75m²', 'ép. 28mm',4,1090.00, '69706294.jpg'),
    ('69608644', 'Abri de jardin en bois NATERIAL FLAVIE', '6.77m², ép. 28mm',4,819.00, '69608644.jpg'),
    ('66970085', 'Abri de jardin en métal ARROW Lm 106', '5.67 m²',4,250.00, '66970085.jpg'),
    ('68385261', 'Abri de jardin en bois Ermitage', '11.09m², ép. 28mm',4,1290.00, '68385261.jpg'),
    ('67378451', 'Abri de jardin en métal Avant-garde L', '5.72 m²',4,1759.00, '67378451.jpg'),
    ('69609141', 'Abri de jardin en bois NATERIAL SEPPO', '11.58m², ép. 28mm',4,1590.00, '69609141.jpg'),
    ('69497190', 'Abri de jardin en bois Flore', '5.39m², ép. 28mm',4,790.00, '69497190.jpg'),
    ('68393003', 'Abri de jardin en bois NAGGEN', '11.22m², ép. 34mm',4,2520.00, '68393003.jpg'),
    ('69612851', 'Abri de jardin en bois NATERIAL TIIA', '11.51m², ép. 34mm',4,1880.00, '69612851.jpg'),
    ('69598333', 'Abri de jardin en bois NATERIAL Morvan', '6.15m², ép. 19mm',4,579.00, '69598333.jpg'),
    ('68215336', 'Abri de jardin en résine Landmark', '4.53m², ép. 23mm',4,1325.00, '68215336.jpg'),
    ('68618312', 'Abri de jardin en bois Tournon', '4m², ép. 19mm',4,589.00, '68618312.jpg'),
    ('66844624', 'Abri de jardin en métal ARROW Lm 86', '4.58 m²',4,249.00, '66844624.jpg'),
    ('69598270', 'Abri de jardin en bois NATERIAL Nervic', '3.24m², ép. 12mm',4,319.00, '69598270.jpg'),
    ('67359894', 'Abri de jardin en métal Avant-garde XL', '7.8 m²',4,2089.00, '67359894.jpg'),
    ('68751396', 'Abri de jardin en résine Prenium 65', '2.3m², ép. 16mm',4,459.00, '68751396.jpg'),
    ('69054594', 'Abri de jardin en bois Montlieu', '9m², ép. 28mm',4,1290.00, '69054594.jpg'),
    ('69612781', 'Abri de jardin en bois NATERIAL ESKO', '17.72m², ép. 28mm',4,2150.00, '69612781.jpg'),

    ('68639970','Applique Rekup',' 1x40W - bois naturel',7,35.90,'68639970.jpg'),
    ('68571811','Applique Kaya',' 1x3W - métal aluminium - INSPIRE',7,39.90,'68571811.jpg'),
    ('66210522','Applique Georg',' 1x60W - verre blanc - INSPIRE',7,9.99,'66210522.jpg'),
    ('67547690','Applique Hanko',' 1x60W - verre blanc',7,4.90,'67547690.jpg'),
    ('69503210','Applique Rivato',' 1x60W - verre blanc - EGLO',7,24.90,'69503210.jpg'),
    ('67334533','Applique Bilings',' 1x100W - métal chromé - INSPIRE',7,49.90,'67334533.jpg'),
    ('67328940','Applique Jill',' 1x150W - céramique blanche',7,39.90,'67328940.jpg'),
    ('69554520','Applique New York',' 1x40W - métal chromé - INSPIRE',7,19.90,'69554520.jpg'),
    ('67547732','Applique Lume',' 1x80W - métal chromé - INSPIRE',7,19.9,'67547732.jpg'),
    ('66210963','Applique India',' 1x40W - métal rouille - INSPIRE',7,17.90,'66210963.jpg'),
    ('69094956','Applique Miki',' 1x40W - aluminium - INSPIRE',7,15.90,'69094956.jpg'),

    ('67336640','Plafonnier Bulle E27','60W IP44 INSPIRE',8,25.90,'67336640.jpg'),
    ('69551993','Barre 3 spots acier brossé Tamara GU10 LED','3x2.5W IP44 EGLO',8,69.90,'69551993.jpg'),
    ('69552042','Barre 3 spots blanc Tamara GU10 LED','3x2.5W IP44 EGLO',8,69.90,'69552042.jpg'),
    ('69102971','Plafonnier 3 spots Mizil GU10','3x33W IP23 INSPIRE',8,49.90,'69102971.jpg'),
    ('69098883','Réglette Bagno S19','13W IP21',8,24.90,'69098883.jpg'),
    ('69102985','Barre 4 spots Mizil GU10','4x33W IP23 INSPIRE',8,69.90,'69102985.jpg'),
    ('69552000','Plafonnier 4 spots acier brossé Tamara GU10 LED','4x2.5W IP44 EGLO',8,82.90,'69552000.jpg'),
    ('69520934','Plafonnier Dolly E27','60W IP44 EGLO',8,19.90,'69520934.jpg'),
    ('69102922','Spot patère Mizil GU10','33W IP23 INSPIRE',8,19.90,'69102922.jpg'),
    ('65384844','Réglette Bagno','13W IP21',8,37.90,'65384844.jpg'),
    ('69520955','Plafonnier Dolly E27','60W IP44 EGLO',8,19.90,'69520955.jpg'),
    ('67628673','Applique Simple G5','14W IP23',8,74.90,'67628673.jpg'),
    ('69098862','Réglette Bagno S19','13W IP24',8,29.90,'69098862.jpg'),

    ('65996084','Coffret à douilles CRV DEXTER','54 pièces',11,49.95,'65996084.jpg'),
    ('67400732','Clé à molette en chrome vanadium DEXTER','28 mm',11,17.10,'67400732.jpg'),
    ('67495022','Clé à molette en chrome vanadium DEXTER','34 mm',11,13.60,'67495022.jpg'),
    ('68725440','Jeu de 9 clés 6 pans en chrome vanadium DEXTER','9 clés 6 pans',11,8.80,'68725440.jpg'),
    ('65996070','Coffret à douilles CRV DEXTER','75 pièces',11,66.00,'65996070.jpg'),
    ('67722893','Clé PRCI','13 mm',11,19.90,'67722893.jpg'),
    ('65996091','Coffret à douilles CRV DEXTER','29 pièces',11,32.95,'65996091.jpg'),

    ('69706315','Coffre de jardin en résine Baya gris anthracite','4.2 m3',12,69.95,'69706315.jpg'),
    ('69692413','Armoire de jardin en résine NATERIAL Woodland Ace beige/gris','1.49 m3',12,189.00,'69692413.jpg'),
    ('69692392','Coffre de jardin en résine NATERIAL Flint 270L gris anthracite','0.3 m3',12,39.90,'69692392.jpg'),
    ('66837036','Armoire de jardin en bois Wissant','0.09 m3',12,185.50,'66837036.jpg'),
    ('69692406','Coffre de jardin en résine NATERIAL Flint 340L','0.42 m3',12,74.90,'69692406.jpg'),
    ('69178060','Coffre de jardin en résine Titan marron','0.32 m3',12,55.00,'69178060.jpg'),
    ('67328450','Armoire de jardin en bois NATERIAL','0.14 m3',12,280.00,'67328450.jpg'),
    ('66211593','Abri à vélo en métal Store Max 190','2.5 m3',12,1419.00,'66211593.jpg'),
    ('68667963','Cache-poubelle double en bois NATERIAL Lokka','1.2 m3',12,249.00,'68667963.jpg'),
    ('68234285','Armoire de jardin en métal','2.1 m3',12,649.00,'68234285.jpg'),
    ('67359922','Armoire de jardin en métal','2.1 m3',12,649.00,'67359922.jpg'),
    ('66211796','Coffre de jardin en métal','0.58 m3',12,369.00,'66211796.jpg'),

    ('68232430','Pouf Bachette',' brun taupe n°3 40x30 cm',17,24.90,'68232430.jpg'),
    ('69076231','Coussin de sol Cléa INSPIRE rose rose n°6',' 40x40 cm',17,9.95,'69076231.jpg'),
    ('68453196','Galette de chaise ronde imperméable rouge rouge n°3',' 40x40 cm',17,9.90,'68453196.jpg'),
    ('68453203','Galette de chaise ronde imperméable brun chocolat n°1',' 40x40 cm',17,9.90,'68453203.jpg'),
    ('69076224','Coussin de sol Cléa INSPIRE violet aubergine n°6',' 40x40 cm',17,9.95,'69076224.jpg'),
    ('69076280','Coussin de sol Cléa INSPIRE blanc blanc n°0',' 40x40 cm',17,9.95,'69076280.jpg'),
    ('68232500','Poire Bachette brun chocolat n°1',' 79x100 cm',17,39.90,'68232500.jpg'),
    ('68232773','Coussin de sol Bachette brun chocolat n°1',' 40x40 cm',17,12.90,'68232773.jpg'),
    ('68453161','Galette de chaise ronde imperméable bleu atoll n°5',' 40x40 cm',17,9.90,'68453161.jpg'),
    ('68202820','Galette de chaise Cléa INSPIRE jaune anis n°5',' 40x40 cm',17,6.90,'68202820.jpg'),
    ('68232731','Coussin de sol Bachette gris galet n°1',' 40x40 cm',17,12.90,'68232731.jpg'),
    ('68232374','Pouf Bachette vert pistache n°3',' 40x30 cm',17,24.90,'68232374.jpg'),

    ('69047153','Lampe à poser Fagot','tissu écru 40 watts',22,59.90,'69047153.jpg'),
    ('68572574','Lampe à poser Delia INSPIRE','métal 40 watts',22,25.90,'68572574.jpg'),
    ('69144201','Lampe à poser Charlize','coton sur PVC taupe 40 watts',22,19.90,'69144201.jpg'),
    ('68137671','Lampe à poser Bari INSPIRE','métal métal 40 watts',22,12.99,'68137671.jpg'),
    ('68169472','Lampe à poser Georgia','coton chanvre 60 watts',22,35.00,'68169472.jpg'),
    ('68169493','Lampe à poser Léonie','coton gris 60 watts',22,34.00,'68169493.jpg'),
    ('67892636','Lampe à poser Arizona','coton prune 40 watts',22,12.00,'67892636.jpg'),

    ('63771351','Paillasson grille caoutchouc Sprint multi couleur','75 x 45cm',27,17.90,'63771351.jpg'),
    ('69124580','Paillasson grille caoutchouc demi lune noir','75 x 45cm',27,9.90,'69124580.jpg'),
    ('64413874','Tapis antipoussière Dakota gris','60 x 40cm',27,7.90,'64413874.jpg'),
    ('68343961','Tapis de cuisine Doormat home anthracite','60 x 40cm',27,11.90,'68343961.jpg'),
    ('67654692','Paillasson coco Funny multi couleur','60 x 40cm',27,9.50,'67654692.jpg'),
    ('67784353','Paillasson coco Home rouge','75 x 33cm',27,11.90,'67784353.jpg'),
    ('63220283','Paillasson grille caoutchouc Tekno multi couleur','75 x 44cm',27,16.90,'63220283.jpg'),
    ('64413860','Tapis antipoussière Dakota marron','60 x 40cm',27,7.90,'64413860.jpg'),
    ('69127275','Tapis antipoussière Home brun taupe n°3','90 x 60cm',27,21.90,'69127275.jpg'),
    ('69126960','Tapis antipoussière Eco gris','60 x 40cm',27,2.50,'69126960.jpg'),

    ('69495013','Rideau Manchester INSPIRE gris galet n°5','140x280 cm',30,29.90,'69495013.jpg'),
    ('69084036','Rideau Roma INSPIRE rouge rouge n°3','140x240 cm',30,12.90,'69084036.jpg'),
    ('69032831','Rideau occultant Country baby beige','145x260 cm',30,55.00,'69032831.jpg'),
    ('69083931','Rideau occultant Blackout INSPIRE gris galet n°5','140x260 cm',30,29.90,'69083931.jpg'),
    ('68797232','Rideau occultant Blackout INSPIRE blanc ivoire n°5','140x260 cm',30,29.90,'68797232.jpg'),
    ('68773663','Rideau occultant Oxford beige','140x240 cm',30,39.90,'68773663.jpg'),
    ('67602066','Rideau Bengale INSPIRE gris galet n°1','140x260 cm',30,14.90,'67602066.jpg'),
    ('68117784','Rideau Paille naturel','145x260 cm',30,59.00,'68117784.jpg'),

    ('69467461','Paire de vitrages Newline blanc',' 90x210 cm',33,19.90,'69467461.jpg'),
    ('69070295','Vitrage Cornélia blanc',' 90x210 cm',33,22.90,'69070295.jpg'),
    ('69035372','Paire de vitrages Etna blanc',' 45x90 cm',33,17.90,'69035372.jpg'),
    ('69466985','Paire de vitrages Diana blanc',' 70x160 cm',33,19.90,'69466985.jpg'),
    ('69507816','Paire de vitrages Banyan blanc',' 60x120 cm',33,17.90,'69507816.jpg'),
    ('69467454','Paire de vitrages Newline blanc',' 60x120 cm',33,14.90,'69467454.jpg'),
    ('69509713','Paire de vitrages Capucine blanc',' 45x90 cm',33,5.90,'69509713.jpg'),

    ('69466943','Voilage Tornade blanc','140x260 cm',34,39.90,'69466943.jpg'),
    ('69070260','Voilage Coral blanc','140x240 cm',34,24.90,'69070260.jpg'),
    ('68578083','Voilage grande largeur Branche blanc','300x240 cm',34,27.90,'68578083.jpg'),
    ('69467426','Voilage Newline blanc','140x240 cm',34,24.90,'69467426.jpg'),
    ('69070246','Voilage Forest blanc','140x240 cm',34,19.90,'69070246.jpg'),
    ('67458391','Voilage Calisia INSPIRE blanc blanc n°0','135x260 cm',34,9.90,'67458391.jpg'),
    ('68578076','Voilage grande largeur Branche blanc','420x240 cm',34,27.90,'68578076.jpg'),
    ('68577915','Voilage grande largeur Indie INSPIRE blanc blanc n°0','420x280 cm',34,19.90,'68577915.jpg'),
    ('68605915','Voilage Leiko blanc','140x260 cm',34,19.90,'68605915.jpg');



INSERT INTO Client(email, nom, prenom, mdp, adresse, tel) VALUES
    ('michel@hotmail.fr', 'Ain', 'Michel', 'michelclient', '64 de la corniche', 0756892361),
    ('pierrot@hotmail.fr', 'Caillou', 'Pierrot', 'pierrotclient', "12 rue de l'imagination", 0656943157),
    ('jacquie@hotmail.fr', 'Michel', 'Jacquie', 'jacquieclient', '56 avenue des colisées', 0784691542),
    ('ta4l@hotmail.fr', 'Taquatrelle',  'Jacky', 'ta4lclient', '47 rue de la rouille', 0612549845),
    ('ellest@hotmail.fr', 'Lavache', 'Thibault', 'ellestclient', '13 rue du malheur', 0695316487),
    ('pourrie@hotmail.fr', 'Michtaud', 'Philippe', 'pourrieclient', '420 boulevard de la détente', 0784615498),
    ('michou@hotmail.fr', 'Alacrème', 'Michou', 'michouclient', '45 rue des marchandes de bonheur', 0632159487),
    ('mivis@hotmail.fr', 'Tavie', 'Mivis', 'mivisclient', "404 rue de l'avenir", 0632984875),
    ('rosie@hotmail.fr', 'Déale', 'Rosie', 'rosieclient', '42 rue de la réponse', 0784365924),
    ('peter@hotmail.fr', 'Minet', 'Peter', 'peterclient', '21 rue de la réflexion', 0784698358),
    ('parker@hotmail.fr', 'Spidey', 'Parker', 'parkerclient', '2 avenue de Ferdonne', 0632213225),
    ('percy@hotmail.fr', 'Jackson', 'Percy', 'percyclient', '78948 bis de la très grande rue', 0748594862),
    ('homersimpson@hotmail.fr', 'Simpson', 'Homer', 'homersimpsonclient', '69 avenue des retournements de situation', 0748623259);

INSERT INTO Panier(email, ref, quantite) VALUES
    ('jacquie@hotmail.fr', '68393003',2),
    ('jacquie@hotmail.fr', '69612851',1),
    ('jacquie@hotmail.fr', '67641245',1),
    ('michou@hotmail.fr', '67641245',1),
    ('rosie@hotmail.fr', '68618312',2),
    ('pierrot@hotmail.fr', '66844624',1),
    ('pierrot@hotmail.fr', '69598326',1),
    ('peter@hotmail.fr', '68751396',1),
    ('peter@hotmail.fr', '69598326',1),
    ('peter@hotmail.fr', '69704026',1),
    ('mivis@hotmail.fr', '66844624',1),
    ('percy@hotmail.fr', '69598326',1);

INSERT INTO Commande(email, ref, quantite) VALUES
    ('michel@hotmail.fr', 69173685, 5),
    ('pierrot@hotmail.fr', 69598326, 16),
    ('jacquie@hotmail.fr', 69681136, 2),
    ('ta4l@hotmail.fr', 68385275, 4),
    ('ellest@hotmail.fr', 69608644, 3),
    ('pourrie@hotmail.fr', 69681136, 1),
    ('michou@hotmail.fr', 68137643, 20),
    ('mivis@hotmail.fr', 69497190, 14),
    ('rosie@hotmail.fr', 68618312, 11),
    ('peter@hotmail.fr', 68385275, 2),
    ('parker@hotmail.fr', 69706294, 3),
    ('percy@hotmail.fr', 69173685, 3),
    ('homersimpson@hotmail.fr', 69612781, 114);
