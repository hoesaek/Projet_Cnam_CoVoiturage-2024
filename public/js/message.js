window.onload = function() {
    const btnSend = document.getElementById('btn-send-message');

    console.log(btnSend);
    
    btnSend.addEventListener('click', () => {
            // URL de la page PHP vers laquelle vous souhaitez rediriger
            var urlPhp = '../Views/msg-process.php';
            console.log(urlPhp);
    
            // Envoyer une requête fetch à la page PHP
            fetch(urlPhp)
            .then(response => {
                // Vérifier si la requête s'est bien déroulée
                if (!response.ok) {
                    throw new Error('Erreur lors de la récupération de la page PHP.');
                }
                // Rediriger l'utilisateur vers la page PHP
                window.location.href = urlPhp;
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
    })
}


