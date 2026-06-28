<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats du Sondage</title>
</head>
<body>

    <h1>Résultats du sondage : Quel langage préférez-vous ?</h1>

    <?php
    $fichier = 'resultats.json';

    if (file_exists($fichier)) {
        $contenuJson = file_get_contents($fichier);
        $donneesBrutes = json_decode($contenuJson, true);

        if (!empty($donneesBrutes)) {
            $resultats = [];
            $totalVotes = 0;

            // On filtre pour ne garder que les valeurs numériques (les votes)
            foreach ($donneesBrutes as $cle => $valeur) {
                if (is_numeric($valeur)) {
                    $resultats[$cle] = (int)$valeur;
                    $totalVotes += (int)$valeur;
                }
            }

            if (!empty($resultats)) {
                echo "<table border='1'>";
                echo "<tr>
                        <th>Option</th>
                        <th>Votes</th>
                        <th>Pourcentage</th>
                      </tr>";

                foreach ($resultats as $option => $votes) {
                    $pourcentage = $totalVotes > 0 ? round(($votes / $totalVotes) * 100, 1) : 0;
                    
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($option) . "</td>";
                    echo "<td>" . $votes . "</td>";
                    echo "<td>" . $pourcentage . " %</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                echo "<p>Total des votes : " . $totalVotes . "</p>";
            } else {
                echo "<p>Aucune donnée de vote numérique trouvée.</p>";
            }
        } else {
            echo "<p>Le fichier JSON est vide.</p>";
        }
    } else {
        echo "<p>Le fichier resultats.json est introuvable.</p>";
    }
    ?>

</body>
</html>