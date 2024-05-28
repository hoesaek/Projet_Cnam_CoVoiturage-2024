<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Covoiturage CNAM</title>
    <link rel="stylesheet" href="/../../public/css/AccueilVisu.css">
</head>
<body>
    <div class="container">
        <header>
            <input type="text" class="search-bar" placeholder="Search...">
            <input type="text" class="date-filter" placeholder="Dates">
            <div class="profile-menu">
                <div class="profile-icon"></div>
                <div class="profile-dropdown">
                    <button>Mon Compte</button>l
                    <button>Mes Réservations</button>
                    <button>Paramètres</button>
                </div>
            </div>
        </header>
        <main>
            <div class="card">
                <p><strong>Départ :</strong> 13H Nord</p>
                <p><strong>Date :</strong> 28 Mai</p>
                <p><strong>Conducteur :</strong> Jean Dupont</p>
                <p><strong>Nombre de places :</strong> 3</p>
            </div>
            <div class="card">
                <p><strong>Départ :</strong> 14H Sud</p>
                <p><strong>Date :</strong> 29 Mai</p>
                <p><strong>Conducteur :</strong> Marie Curie</p>
                <p><strong>Nombre de places :</strong> 2</p>
            </div>
            <div class="card">
                <p><strong>Départ :</strong> 15H Est</p>
                <p><strong>Date :</strong> 30 Mai</p>
                <p><strong>Conducteur :</strong> Albert Einstein</p>
                <p><strong>Nombre de places :</strong> 4</p>
            </div>
        </main>
        <footer>
            <button class="footer-btn">Publication</button>
            <button class="footer-btn">Message</button>
            <button class="footer-btn">Se Deconnecté</button>
        </footer>
    </div>
    

    <script>
        function toggleDropdown() {
    document.getElementById("profileDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!event.target.matches('.profile-icon')) {
        var dropdowns = document.getElementsByClassName("profile-dropdown");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

    </script>
</body>
</html>

