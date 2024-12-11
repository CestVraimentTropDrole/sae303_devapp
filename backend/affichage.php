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

//Fonction qui affiche chaque bloc d'actionneur sur la page
function affiche_actionneurs ($id, $name, $state) {
    //Boucle qui interprète l'état de l'actionneur pour l'afficher
    $status = "";
    if ($state == 1) {
        $status = "actif";
    }
    else {
        $status = "inactif";
    }

    echo "<div class='aspect-square p-3 rounded-md bg-gray flex flex-col gap-6 justify-center items-center' data-id='".$id."' onclick='toggleState(this)'>
                <div class='inline-flex rounded-full bg-lightgray items-center justify-center p-4 w-fit h-fit'>
                    <img src='../../asset/images/".$name.".svg' alt=".$name." class='w-[12dvw] h-[6dvh]'>
                </div>
                <div>
                    <h2 class='font-montserrat text-lg font-bold text-center capitalize'>".htmlspecialchars($name)."</h2>
                    <p class='font-montserrat text-base text-center capitalize'>".htmlspecialchars($status)."</p>
                </div>
            </div>";
}


//Fonction qui recherche chaque donnée de capteur dans la db
function requete_capteurs ($db) {
    $requete = "SELECT *
                FROM data
                ORDER BY data.time DESC";
                
    $resultat = $db->prepare($requete);
    $resultat->execute();
    $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);

    // Valeurs les plus récentes
    $time = null;
    $temperature = null;
    $humidite = null;

    if (count($donnees) > 0) {
        // Heure du premier enregistrement
        $time = $donnees[0]['time'];
    
        foreach ($donnees as $ligne) {
            if ($ligne['type'] === 'temperature' && $temperature === null) {
                $temperature = $ligne['value'];
            }
            if ($ligne['type'] === 'humidite' && $humidite === null) {
                $humidite = $ligne['value'];
            }
            if ($temperature !== null && $humidite !== null) {
                break;
            }
        }
    }

    return [
        'time' => $time,
        'temperature' => $temperature,
        'humidite' => $humidite,
    ];
}

?>