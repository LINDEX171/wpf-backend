<?php
// echo 'ok'; // Si vous souhaitez afficher "ok" pour vérifier que le script est exécuté

$db_name = "bdpersonne";
$db_server = "127.0.0.1";
$db_port = "3307"; // Spécifier le port
$db_user = "root";
$db_pass = "passer";

try {
    // Création de la connexion PDO avec le port spécifié
    $db = new PDO("mysql:host={$db_server};port={$db_port};dbname={$db_name};charset=utf8", $db_user, $db_pass);
    
    // Configuration des attributs PDO
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Si la connexion est réussie, vous pouvez ajouter un message ou une autre logique ici
    echo 'Connexion réussie';

} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    echo 'Erreur de connexion : ' . $e->getMessage();
}
?>
