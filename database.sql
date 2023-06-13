-- Active: 1685438740545@@127.0.0.1@3306@blog_db
DROP TABLE IF EXISTS categorie;
CREATE TABLE categorie (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    label VARCHAR(128) NOT NULL
);
 INSERT INTO categorie (label) VALUES 
 ('Voyage en Europe'), 
 ('Voyage en Asie'),
 ('Voyage en Amérique'),
 ('Voyage en Amérique'),
 ('Voyage en Océanie');

--SELECT * FROM categorie;

DROP TABLE IF EXISTS article;
CREATE TABLE article (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    auteur VARCHAR(128) NOT NULL,
    datePublication VARCHAR(128) NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,  
    id_categorie INT, 
    Foreign Key (id_categorie) REFERENCES categorie(id)
);

INSERT INTO article (auteur, datePublication, title, content, image, id_categorie) VALUES
('Julie', '2023-06-12','Voyage à Paris','Notre-Dame, le Louvre, la tour Eiffel, les Invalides, la place de la Concorde, le Sacré-Cœur sur la butte Montmartre…', 'https://www.shutterstock.com/fr/image-photo/beautiful-panorama-paris-skyline-1079825693',1),
('Kate', '2023-06-12','Voyage à Rome','La ville se situe le long du fleuve Tibre et a été construite sur sept collines, nommées le Palatin, le Capitole, le Cælius, le Quirinal et le Viminal.', 'https://www.shutterstock.com/fr/image-photo/basilica-sagrada-familia-barcelona-2024563775',1),
('Thomas', '2023-06-13','Voyage à Barcelone','La capitale catalane brille par sa culture, son architecture, son climat, sa gastronomie, sa mythique équipe de football et, surtout, sa bonne humeur.', 'https://www.shutterstock.com/fr/image-photo/piazza-di-spagna-rome-italy-spanish-1439825942',1);

--SELECT * FROM article;

Drop TABLE if EXISTS commentaire;
CREATE TABLE commentaire (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
    userName VARCHAR(128) NOT NULL, 
    commentaire TEXT NOT NULL, 
    dateInsertion VARCHAR(128) NOT NULL,
    id_article INT,
    Foreign Key (id_article) REFERENCES article(id)
);
INSERT INTO commentaire (userName, commentaire, dateInsertion, id_article) VALUES
('Nicolas', 'J\'aime bien mon voyage à Paris', '2023-06-12', 1),
('Nicolas', 'J\'aime bien mon voyage à Barcelone', '2023-06-12', 3),
('Nina', 'J\'aime bien revenir à Rome', '2023-06-13', 2);
--SELECT * FROM commentaire;