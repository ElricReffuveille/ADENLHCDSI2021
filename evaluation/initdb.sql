CREATE DATABASE blog;
USE blog;
CREATE TABLE Articles (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO Articles(title, content) VALUES (
    "King Crimson",
    "King Crimson est un groupe britannique de rock progressif, originaire de Londres, en Angleterre. Avec des albums tels que In the Court of the Crimson King (1969) ou Red (1974), il est considéré comme l'un des représentants majeurs du rock progressif3.    
La composition du groupe a continuellement changé tout au long de son histoire. Le guitariste Robert Fripp en est le seul membre permanent, mais il a déclaré qu'il ne se considérait pas nécessairement comme son chef. Pour lui, King Crimson est avant tout « une façon de faire les choses », une constance musicale qui a persisté à travers l'histoire du groupe."
);

INSERT INTO Articles(title, content) VALUES (
    "Talk Talk",
    "Talk Talk est un groupe de pop britannique, originaire de Londres, en Angleterre. Actif entre 1981 et 1992, il est d'abord affilié au mouvement new wave avant de s'en éloigner progressivement pour produire une musique plus expérimentale. Il est considéré comme l'un des pionniers du post-rock."
);

INSERT INTO Articles(title, content) VALUES (
    "Molchat Doma",
    "Molchat Doma (Молчат Дома en cyrilique, littéralement « les maisons sont silencieuses1 ») est un groupe de cold wave biélorusse originaire de Minsk2,3,4,5.

Fin 2020, le groupe accède à une certaine notoriété après qu'un de leurs morceaux, Судно (Борис Рижий) ou Sudno (Boris Ryzhy), fait le buzz sur la plateforme TikTok en étant utilisé dans plus de 150 000 clips6. "
);

INSERT INTO Articles(title, content) VALUES (
    "Ultravox",
    "Ultravox est un groupe britannique de musique new wave fondé en 1973 par John Foxx avec Chris Cross (de son vrai nom Christopher Allen) à la basse et Stevie Shears à la guitare, rejoints l'année suivante par Warren Cann à la batterie, ainsi que Billy Currie aux claviers et au violon. Le groupe s'appelle alors Tiger Lily puis change son nom pour Ultravox en 1976. "
);