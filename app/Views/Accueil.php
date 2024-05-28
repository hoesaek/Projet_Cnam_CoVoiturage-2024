<?php require_once __DIR__ . 'header.php'; ?>
    <div class="container">
        <header>
            <input type="text" class="search-bar" placeholder="Search...">
            <input type="text" class="date-filter" placeholder="Dates">
            <div class="profile-menu">
                <div class="profile-icon"></div>
                <div class="profile-dropdown">
                    <button>Mon Compte</button>
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
        </footer>
    </div>
    
</body>
</html>
