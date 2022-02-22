<?php

namespace blog;

use PDO;
use PDOException;

    function connexion($host = "db_docker_symfony")
    {
        try{
            $conn = new PDO("mysql:host=$host; dbname=Mon_blog", "root", "");#connexion à la base de donnée
            return $conn;
        }
        catch(PDOException $e)
        {
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit;
        }
    }