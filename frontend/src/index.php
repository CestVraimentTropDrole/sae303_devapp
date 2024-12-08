<?php

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
            <div class="aspect-square p-3 rounded-md bg-gray flex flex-col gap-6 justify-center items-center">
                <div class="inline-flex rounded-full bg-lightgray items-center justify-center p-4 w-fit h-fit">
                    <img src="../../asset/images/radiator.svg" alt="Chauffage" class="w-[50px] h-[50px]">
                </div>
                <div>
                    <h2 class="font-montserrat text-lg font-bold text-center">Chauffage</h2>
                    <p class="font-montserrat text-base text-center">Statut</p>
                </div>
            </div>

            <div class="aspect-square p-3 rounded-md bg-gray flex flex-col gap-6 justify-center items-center">
                <div class="inline-flex rounded-full bg-lightgray items-center justify-center p-4 w-fit h-fit">
                    <img src="../../asset/images/Ampoule.svg" alt="Lumière" class="w-[50px] h-[50px]">
                </div>
                <div>
                    <h2 class="font-montserrat text-lg font-bold text-center">Lumière</h2>
                    <p class="font-montserrat text-base text-center">Statut</p>
                </div>
            </div>

            <div class="aspect-square p-3 rounded-md bg-gray flex flex-col gap-6 justify-center items-center">
                <div class="inline-flex rounded-full bg-lightgray items-center justify-center p-4 w-fit h-fit">
                    <img src="../../asset/images/Volets.svg" alt="Volets" class="w-[50px] h-[50px]">
                </div>
                <div>
                    <h2 class="font-montserrat text-lg font-bold text-center">Volets</h2>
                    <p class="font-montserrat text-base text-center">Statut</p>
                </div>
            </div>

            <div class="aspect-square p-3 rounded-md bg-gray flex flex-col gap-6 justify-center items-center">
                <div class="inline-flex rounded-full bg-lightgray items-center justify-center p-4 w-fit h-fit">
                    <img src="../../asset/images/Store.svg" alt="Store" class="w-[50px] h-[50px]">
                </div>
                <div>
                    <h2 class="font-montserrat text-lg font-bold text-center">Store</h2>
                    <p class="font-montserrat text-base text-center">Statut</p>
                </div>
            </div>
        </div>
    </body>
</html>