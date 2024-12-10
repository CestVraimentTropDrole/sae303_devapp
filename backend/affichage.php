<?php

//Fonction qui recherche chaque actionneur dans la base de données
function requete_actionneurs ($db) {
    // Requête SQL sécurisée
    $requete = "SELECT device.id, device.nom, device.etat
                FROM device
                WHERE device.type = 'actionneur'";

    $resultat = $db->prepare($requete);
    $resultat->execute();
    $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);

    return $donnees;
}

//Fonction qui affiche chaque bloc d'actionneur dans la base de données
function affiche_actionneurs ($id, $nom, $etat) {
    //Boucle qui interprète l'état de l'actionneur pour l'afficher
    $statut = "";
    if ($etat == 1) {
        $statut = "actif";
    }
    else {
        $statut = "inactif";
    }

    echo "<div class='aspect-square p-3 rounded-md bg-gray flex flex-col gap-6 justify-center items-center' data-id='".$id."' onclick='toggleState(this)'>
                <div class='inline-flex rounded-full bg-lightgray items-center justify-center p-4 w-fit h-fit'>
                    <img src='../../asset/images/".$nom.".svg' alt=".$nom." class='w-[12dvw] h-[6dvh]'>
                </div>
                <div>
                    <h2 class='font-montserrat text-lg font-bold text-center capitalize'>".htmlspecialchars($nom)."</h2>
                    <p class='font-montserrat text-base text-center capitalize'>".htmlspecialchars($statut)."</p>
                </div>
            </div>";
}

?>