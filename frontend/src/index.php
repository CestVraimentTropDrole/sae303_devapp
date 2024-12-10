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

        <div class="grid grid-cols-3 gap-3">
            <?php
            $donnees = requete_capteurs($db);
            ?>

            <!--Affichage de l'heure-->
            <div class='p-3 rounded-md bg-gray flex flex-col gap-4 justify-center items-center'>
                <div>
                    <h2 class='font-montserrat text-lg font-bold text-center capitalize'>MàJ</h2>
                    <p class='font-montserrat text-base text-center capitalize'><?php echo($donnees['time']); ?></p>
                </div>
            </div>

            <!--Affichage de la température-->
            <div class='p-3 rounded-md bg-gray flex flex-col gap-4 justify-center items-center'>
                <div>
                    <h2 class='font-montserrat text-lg font-bold text-center capitalize'>T°</h2>
                    <p class='font-montserrat text-base text-center capitalize'><?php echo($donnees['temperature']); ?>°C</p>
                </div>
            </div>

            <!--Affichage de l'humidité-->
            <div class='p-3 rounded-md bg-gray flex flex-col gap-4 justify-center items-center'>
                <div>
                    <h2 class='font-montserrat text-lg font-bold text-center capitalize'>Humidité</h2>
                    <p class='font-montserrat text-base text-center capitalize'><?php echo($donnees['humidite']); ?>%</p>
                </div>
            </div>
        </div>

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
        //Fonction qui active le changement de statut au clic
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