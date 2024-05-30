<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication de Covoiturage CNAM</title>
    <link rel="stylesheet" href="/../../public/css/PublicationVisu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="profile-menu">
                <div class="profile-icon" onclick="toggleDropdown()"></div>
                <div class="profile-dropdown" style="display: none;">
                    <button onclick="window.location.href='mon_compte.html'">Mon Compte</button>
                    <button onclick="window.location.href='mes_reservations.html'">Mes Réservations</button>
                    <button onclick="window.location.href='parametres.html'">Paramètres</button>
                </div>
            </div>
        </header>
        <main class="form-container">
            <h1>Publier une offre de covoiturage</h1>
            <form action="./Account/Publication-process.php" method="POST" id="publication-form">
                <label for="title">Intitulé :</label>
                <input type="text" id="title" name="title" required>

                <label for="departure">Départ :</label>
                <input type="text" id="departure" name="departure" required>

                <label for="arrive">Arriver :</label>
                <input type="text" id="arrive" name="arrive" required>

                <label for="dateDep">Date et heure départ :</label>
                <input type="text" id="dateDep" name="date-depart" class="datetimepicker" required>

                <label for="dateArr">Date et heure Arrivée :</label>
                <input type="text" id="dateArr" name="date-arriver" class="datetimepicker" required>

                <label for="seats">Nombre de places :</label>
                <select id="seats" name="seats" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label for="vehicule">Type de véhicule :</label>
                <input type="text" id="vehicule" name="vehicule" required>

                <button type="submit" class="submit-btn">Publier</button>
            </form>
        </main>
        <footer>
            <button class="footer-btn" onclick="window.location.href='./Accueil.php'">Accueil</button>
            <button class="footer-btn">Message</button>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <script>
        flatpickr(".datetimepicker", {
            enableTime: true, // Activer la sélection de l'heure
            dateFormat: "d-m-Y H:i", // Format de date et d'heure
        });
        function toggleDropdown() {
            var dropdown = document.querySelector('.profile-dropdown');
            dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
        }
    </script>
</body>
</html>
