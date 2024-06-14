<?php
try {
    $madb = new PDO('sqlite:bdd/CaveAVin.db');
    $producteur = $_GET['Producteur'];
    $annee = $_GET['Annee'];
    $nomVin = $_GET['NomVin'];

    $rq = "SELECT Quantite FROM Vin WHERE Producteur = '$producteur' AND Annee = '$annee' AND NomVin = '$nomVin'";
    $resultats = $madb->query($rq);
    $Quantite = $resultats->fetchColumn();

    echo $Quantite;
} catch (Exception $e) {
    echo "<p>Erreur lors de la connexion à la BDD: " . $e->getMessage() . "</p>";
}
?>