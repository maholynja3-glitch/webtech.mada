<?php
// Ireo credentials avy ao amin'ny Supabase Connection String
$host     = "https://ziuwvkxxkrfjeoeszplk.supabase.co"; // Soloy ilay Host-nao
$port     = "5432";
$dbname   = "postgres";
$user     = "postgres";
$password = "TAYPIPI"; // Ilay password tany am-boalohany

try {
    // Ity andalana ity no tena mampifandray azy
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Tsy nandeha ny fifandraisana: " . $e->getMessage());
}
?>