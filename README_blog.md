# ADENLHCDSI2021
A git for ADEN Formation Le Havre CDSI

# Utilisation du Blog
Pour que le blog fonctionne, il suffit de réaliser une base de données, le code fera le reste.

#Aide
Pour creer une Base de données :

Allez dans votre terminale (Assurer vous d'être dans le bon dossier)

Coller chaque lignes dans votre terminal :

mysql -u root;
create databases "Mon_blog";
use databases "Mon_blog";
create table articles(
   idArticles INT NOT NULL AUTO_INCREMENT,
   titre VARCHAR(100) NOT NULL,
   contenu VARCHAR(500) NOT NULL,
   PRIMARY KEY ( idArticles )
);

#Made by Tristan Bassa.
