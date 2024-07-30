<?php
header('Content-Type: application/json');

// Inclure le fichier de connexion à la base de données
include "../backend/db.php"; // Assurez-vous que le chemin et le nom du fichier sont corrects

// Vérifier si les données ont été envoyées en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lire les données JSON de la requête
    $input = json_decode(file_get_contents('php://input'), true);

    // Vérifier que les données JSON ont été décodées correctement
    if (json_last_error() === JSON_ERROR_NONE) {
        // Récupérer les valeurs des données JSON
        $nom = isset($input['nom']) ? $input['nom'] : '';
        $prenom = isset($input['prenom']) ? $input['prenom'] : '';
        $age = isset($input['age']) ? (int) $input['age'] : 0;

        try {
            // Préparer la requête SQL
            $stmt = $db->prepare("INSERT INTO utilisateur (nom, prenom, age) VALUES (?, ?, ?)");
            
            // Exécuter la requête avec les valeurs des variables
            $result = $stmt->execute([$nom, $prenom, $age]);

            // Répondre avec le résultat de l'opération
            echo json_encode(['success' => $result]);

        } catch (PDOException $e) {
            // Gérer les erreurs de connexion ou d'exécution de la requête
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'Invalid JSON']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
