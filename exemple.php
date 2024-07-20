<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Services</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulaire de Réservation</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupération des données du formulaire
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $service = htmlspecialchars($_POST['service']);
            $hours = (int) $_POST['hours'];

            // Définition des tarifs par heure pour chaque service
            $prices = [
                "cleaning" => 20,
                "gardening" => 15,
                "plumbing" => 25
            ];

            // Calcul du total
            $total = $hours * $prices[$service];

            // Affichage du résumé
            echo "<h2>Résumé de la Réservation</h2>";
            echo "<p>Nom: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Service: $service</p>";
            echo "<p>Nombre d'heures: $hours</p>";
            echo "<p>Total: $" . number_format($total, 2) . "</p>";
        } else {
            // Affichage du formulaire
            echo '
            <form action="" method="post">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="service">Sélectionnez le Service :</label>
                <select id="service" name="service" required>
                    <option value="cleaning">Nettoyage</option>
                    <option value="gardening">Jardinage</option>
                    <option value="plumbing">Plomberie</option>
                </select><br><br>

                <label for="hours">Nombre d\'heures :</label>
                <input type="number" id="hours" name="hours" min="1" required><br><br>

                <input type="submit" value="Calculer le Total">
            </form>
            ';
        }
        ?>
    </div>
</body>
</html>


