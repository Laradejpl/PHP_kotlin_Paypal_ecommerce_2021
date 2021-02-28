<?php
// Connexion à la base de données

/**
 * Un bloc try catch permet d'intercepter les erreurs de type Exception
 * une Exception est un objet de la classe Exception
 * 
 * on tente d'exécuter le code du bloc try
 * si une Exception est lancée durant l'exécution, le bloc catch sera exécuté
 */
try {
    $pdo = new PDO(
        sprintf('mysql:host=%s;dbname=%s;', DB_HOST, DB_NAME),
        DB_USER,
        DB_PASS,
        
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    );

} catch(Exception $e) {
    die('Erreur de connexion à MySQL: ' . $e->getMessage());
}