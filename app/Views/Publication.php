<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication de Covoiturage CNAM</title>
    <link rel="stylesheet" href="PublicationVisu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="profile-menu">
                <div class="profile-icon" onclick="toggleDropdown()"></div>
                <div class="profile-dropdown">
                    <button onclick="window.location.href='mon_compte.html'">Mon Compte</button>
                    <button onclick="window.location.href='mes_reservations.html'">Mes Réservations</button>
                    <button onclick="window.location.href='parametres.html'">Paramètres</button>
                </div>
            </div>
        </header>
        <main class="form-container">
            <h1>Publier une offre de covoiturage</h1>
            <form id="publication-form">
                <label for="title">Intitulé :</label>
                <input type="text" id="title" name="title" required>

                <label for="departure">Départ :</label>
                <input type="text" id="departure" name="departure" required>

                <label for="date">Date et heure :</label>
                <input type="text" id="date" name="date" class="datetimepicker" required>

                <label for="seats">Nombre de places :</label>
                <select id="seats" name="seats" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <label for="vehicle">Type de véhicule :</label>
                <input type="text" id="vehicle" name="vehicle" required>

                <button type="submit" class="submit-btn">Publier</button>
            </form>
        </main>
        <footer>
            <button class="footer-btn" onclick="window.location.href='index.html'">Accueil</button>
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
    <script src="profileDropdown.js"></script>

</body>
</html>
