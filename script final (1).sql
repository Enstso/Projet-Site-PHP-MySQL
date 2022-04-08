CREATE DATABASE site DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;

USE site;

CREATE TABLE UTILISATEUR(
	id INTEGER NOT NULL Auto_Increment,
	identifiant varchar(100) NOT NULL,
	mot_de_passe varchar(40) NOT NULL,
	email varchar(100) NOT NULL,
	Status varchar(7),
	PRIMARY KEY(id)
);

CREATE TABLE CATALOGUE(
	num_catalogue INTEGER NOT NULL Auto_Increment,
	nom_catalogue varchar(50),
	PRIMARY KEY(num_catalogue)
);

CREATE TABLE Produit(
	num_article INTEGER NOT NULL Auto_Increment,
	nom_article varchar(100),
	num_catalog INTEGER NOT NULL,
	description varchar(1000),
	prix_article float,
	image varchar(100),
	PRIMARY KEY(num_article),
	FOREIGN KEY(num_catalog) REFERENCES CATALOGUE(num_catalogue)
);

CREATE TABLE PANIER(
	num_panier INTEGER NOT NULL Auto_Increment,
	quantite INTEGER NOT NULL,
	num_produit INTEGER,
	num_utilisateur INTEGER,
	PRIMARY KEY(num_panier),
	FOREIGN KEY(num_produit) REFERENCES Produit(num_article),
	FOREIGN KEY(num_utilisateur) REFERENCES UTILISATEUR(id)
);


insert into utilisateur (identifiant,mot_de_passe,email,Status) values ("Zunaid","siojjr","mzunaid2003@gmail.com","admin");
insert into utilisateur (identifiant,mot_de_passe,email,Status) values ("Léo","siojjr","tranleo95820@gmail.com","admin");
insert into utilisateur (identifiant,mot_de_passe,email,Status) values ("Enstso","siojjr","enstso@outlook.fr","admin");
insert into utilisateur (identifiant,mot_de_passe,email,Status) values ("Sami","siojjr","samie17030@gmail.com","admin");
insert into utilisateur (identifiant,mot_de_passe,email,Status) values ("test","sio","enstso@icloud.com","NULL");

insert into catalogue (nom_catalogue) values ("aspirateur");
insert into catalogue (nom_catalogue) values ("réfrigérateur");
insert into catalogue (nom_catalogue) values ("télévision");


insert into produit (nom_article,num_catalog,description,prix_article,image) values ("Aspirateur sans fil Dyson V15 Detect™ Absolute (Nickel)",1,"balai électrique - Autonomie 80 min - Temps de charge 4 h - Capacité 0.70 - Tension 21.6 V ",749.00,"aspi1.png");
insert into produit (nom_article,num_catalog,description,prix_article,image) values ("DYSON Aspirateur balai V8 Motorhead",1,"balai électrique - Autonomie 40 min - Temps de charge 5 h - Capacité 0.54 - Tension 21.6 V",329.00,"aspi2.png"); 
insert into produit (nom_article,num_catalog,description,prix_article,image) values ("Série 8 Aspirateur rechargeable Unlimited Blanc ",1,"Balai électrique - autonomie 40 min - Temps de charge 5 h- capacité 0.50 - Tension 18,0 V",315.00,"aspi3.png"); 


insert into produit (nom_article,num_catalog,description,prix_article,image) values ("Réfrigérateur SAMSUNG",2,"Réfrigérateur de 636 L (idéal pour 6 personnes et +) – Congélateur : 400 L - multi-portes",2199.00,"refri1.png"); 
insert into produit (nom_article,num_catalog,description,prix_article,image) values ("Réfrigérateur HAIER",2,"Réfrigérateur de 428 L (idéal pour 4 personnes et +) - Congélateur : 200 L - multi-portes ",1549.00,"refri2.png"); 
insert into produit (nom_article,num_catalog,description,prix_article,image) values ("Réfrigérateur Américain Samsung",2,"Réfrigérateur de 389 L (idéal pour 3 personnes et +) - Congélateur : 225 L – multi portes",2449.00,"refri3.png"); 


insert into produit (nom_article,num_catalog,description,prix_article,image) values ("Télévision Samsung QLED 65Q60A 2021, SERIE 6",3,"Des couleurs éclatantes avec les Quantum Dots - QLED 100% Color Volume - Design ultra fin 25mm - Résolution 1800x2000",999.00,"tv1.png"); 
insert into produit (nom_article,num_catalog,description,prix_article,image) values ("Tv LG oled 55 LG OLED55A1",3,"Des couleurs Pétillante avec les Quantum Dots - OLED 100% Color Volume - 75mm – Résolution 1500x2000",1500.00,"tv2.png"); 
insert into produit (nom_article,num_catalog,description,prix_article,image) values ("TV LED SONY KD43X85J Google TV 2021",3,"Des couleurs éclatantes avec des led – OLED 100% Color Volume – 90mm – 1400x1800",900.00,"tv3.png"); 