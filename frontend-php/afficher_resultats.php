<?php

$cheminJson = __DIR__ . '/resultats.json';

if (!file_exists($cheminJson)) {
    die("Erreur : le fichier resultats.json est introuvable. "
        . "Avez-vous lance SondageAPI cote backend ?");
}

$contenu = file_get_contents($cheminJson);
$resultats = json_decode($contenu, true);

if ($resultats === null) {
    die("Erreur : le fichier resultats.json n'a pas pu etre decode (JSON invalide).");
}

$totalVotes = array_sum($resultats);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Resultats du sondage</title>
</head>
<body>
    <h1>Resultats du sondage : Quel langage preferez-vous ?</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>Option</th>
            <th>Votes</th>
            <th>Pourcentage</th>
        </tr>
        <?php foreach ($resultats as $option => $votes): ?>
            <tr>
                <td><?php echo htmlspecialchars($option); ?></td>
                <td><?php echo (int) $votes; ?></td>
                <td>
                    <?php
                    $pourcentage = $totalVotes > 0
                        ? round(($votes / $totalVotes) * 100, 1)
                        : 0;
                    echo $pourcentage . " %";
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>Total des votes : <?php echo $totalVotes; ?></p>
</body>
</html>
