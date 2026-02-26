<?php
include 'db_connect.php'; // Antsoina ilay fifandraisana teo ambony

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Alaina ny data avy amin'ny formulaire
    $anarana = $_POST['anarana'];
    $numero = $_POST['numero'];
    $facebook = $_POST['facebook'];
    $type_site = $_POST['type_site'];
    $description = $_POST['description'];

    try {
        // 2. Miomana hampiditra data (SQL)
        $sql = "INSERT INTO commandes (anarana, numero, facebook, type_site, description) 
                VALUES (:anarana, :numero, :facebook, :type_site, :description)";
        
        $stmt = $conn->prepare($sql);
        
        // 3. Tanterahina ny fandefasana
        $stmt->execute([
            ':anarana' => $anarana,
            ':numero' => $numero,
            ':facebook' => $facebook,
            ':type_site' => $type_site,
            ':description' => $description
        ]);

        // 4. Raha tafiditra dia averina any amin'ny pejy fisaorana
        header("Location: index.html?status=success");
        exit();
    } catch (PDOException $e) {
        echo "Nisy olana: " . $e->getMessage();
    }
}
?>