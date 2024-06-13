<?php
if (isset($_POST['choix_vin'])) {
    $madb = new PDO('sqlite:bdd/CaveAVin.db');
    list($producteur, $annee, $nomVin) = explode('|', $_POST['choix_vin']);
    $rq2 = "SELECT Stock_cave.Quantite FROM Stock_cave INNER JOIN Vin ON Stock_cave.NoVin = Vin.Novin WHERE Vin.Producteur = :producteur AND Vin.Annee = :annee AND Vin.NomVin = :nomVin";
    $stmt = $madb->prepare($rq2);
    $stmt->execute([
        ':producteur' => $producteur,
        ':annee' => $annee,
        ':nomVin' => $nomVin
    ]);
    $Quantite = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $options = '';
    foreach ($Quantite as $quantite) {
        $options .= "<option value=\"".$quantite['Quantite']."\">".$quantite['Quantite']."</option>";
    }
    echo $options;
}
?>