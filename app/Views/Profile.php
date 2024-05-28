<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="/../../public/css/ProfileVisu.css">
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
            <h1>Profil</h1>
            <form id="profile-form">
                <label for="name">Nom Prénom :</label>
                <input type="text" id="name" name="name" required>

                <label for="city">Ville :</label>
                <input type="text" id="city" name="city" required>

                <label for="school">École :</label>
                <input type="text" id="school" name="school" required>

                <label for="vehicle">Type de véhicule :</label>
                <input type="text" id="vehicle" name="vehicle" required>

                <label for="study">Études :</label>
                <input type="text" id="study" name="study" required>

                <div class="button-container">
                    <button type="button" class="submit-btn" onclick="editProfile()">Modifier</button>
                    <button type="button" class="cancel-btn" onclick="cancelEdit()">Annuler</button>
                    
                </div>
            </form>
        </main>
        <footer>
                    <button class="footer-btn" onclick="window.location.href='Accueil.php'">Accueil</button>
                    <button class="footer-btn" onclick="window.location.href='publication.php'">Publication</button>
                    <button class="footer-btn">Message</button>
        </footer>
    </div>
    <script>
        function toggleDropdown() {
            var dropdown = document.querySelector('.profile-dropdown');
            dropdown.style.display = (dropdown.style.display === 'none') ? 'block' : 'none';
        }
    </script>
</body>
</html>
