CREATE DATABASE cdsiblog;

USE cdsiblog;

CREATE TABLE Article (
    id INT AUTO_INCREMENT NOT NULL ,
    title varchar(255) NOT NULL,
    content text NOT NULL,

    CONSTRAINT Article_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#Some data.
INSERT INTO Article (title, content) VALUES
(
    "Article 1",
    "This is the first article"
),
(
    "Article 2",
    "This is the second article"
 ),
(
    "Article 3",
    "This is the third article"
);


