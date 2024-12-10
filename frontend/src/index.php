<?php
    include "../../backend/database.php";
    include "../../backend/affichage.php";
?>

<html class="w-full h-full">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="output.css" rel="stylesheet">
        <title>Gère ta baraque</title>
    </head>

    <body class="w-full h-full flex flex-col gap-4 p-6">
        <header class="w-full h-fit border-solid border-red border-b-2">
            <h1 class="text-center font-bold text-xl pb-3 text-white">Domotique</h1>
        </header>

        <div class="grid grid-cols-2 gap-3">
            <?php
                $donnees = requete_actionneurs($db); //On récupère les données des actionneurs

                foreach ($donnees as $ligne) { //On rentre dans une boucle pour afficher chaque actionneur
                    affiche_actionneurs($ligne['id'], $ligne['nom'], $ligne['etat']);
                }
            ?>
        </div>

    </body>

    <script>
        //Fonction qui récupère 
        function toggleState(element) {
            const deviceId = element.getAttribute('data-id');
            fetch('../../backend/traitement.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: deviceId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Change state visually based on the new state
                    element.querySelector('p').innerText = data.newState ? 'actif' : 'inactif';
                } else {
                    alert('Erreur lors de la mise à jour de l\'état.');
                }
            });
        }
    </script>
    
</html>