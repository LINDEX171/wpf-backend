<?php
header('Content-Type: application/json');

// Inclure le fichier de connexion à la base de données
include "../backend/db.php";

// Préparer la requête SQL pour récupérer toutes les entrées
$sql = "SELECT * FROM utilisateur";
$query = $db->query($sql);

$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Répondre avec les résultats en JSON
echo json_encode($results);
?>
