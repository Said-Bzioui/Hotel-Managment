<?php
session_start();
include("../clients/../../database/db.php");
<<<<<<< HEAD
$page = "dashboard";

$conected = false;
if (isset($_SESSION['user_id'])) {
    $conected = true;
}
=======
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../clients/../../css/all.min.css">
    <link rel="stylesheet" href="../clients/../../css/toast.css">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Barre latérale -->
        <?php include("../clients/../../sections/sideBar.php") ?>
        <!-- Contenu principal -->
        <main class="flex-1 ">
            <!-- header -->
            <div class="shadow-md ">
                <nav class="bg-white">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex h-16 items-center justify-end">

                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">
<<<<<<< HEAD
                                 

                                <!-- Profile dropdown -->
                                <div class="relative">
                                        <button type="button"
                                            class="menu-btn relative flex max-w-xs items-center rounded-full text-white py-1 px-2 bg-gray-800 text-sm focus:outline-none focus:ring-2"
                                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <?=$_SESSION['user_name'];?>
                                            <i class="fa-regular fa-user text-slate-50 p-2"></i>
                                        </button>
                                        <div
                                            class="usertoogle absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 hidden">
                                            <a href="settings.php"
                                                class=" px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                                <i class="fa-solid fa-gear mr-2"></i><span>Settings</span>
                                            </a>
                                      <?php 
                                      if(!$conected){?>
                                            <a href="rooms.php?login"
                                                class=" px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                                <i class="fa-solid fa-right-to-bracket mr-2"></i><span>Log In</span>
                                            </a>
                                      <?php    } ?>
                                            <a href="rooms.php?logout "
                                                class=" px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white flex items-center">
                                                <span>Log out</span> <i
                                                    class="fa-solid fa-arrow-right-from-bracket ml-2"></i>
                                            </a>
                                        </div>
=======
                                    <button type="button"
                                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">View notifications</span>
                                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true" data-slot="icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                        </svg>
                                    </button>

                                    <!-- Profile dropdown -->
                                    <div class="relative ml-3">
                                        <div>
                                            <button type="button"
                                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                                <span class="absolute -inset-1.5"></span>
                                                <span class="sr-only">Open user menu</span>
                                                <img class="size-8 rounded-full"
                                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="">
                                            </button>
                                        </div>


>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </nav>


            </div>
            <h1 class="text-2xl font-bold m-4">Bienvenue dans l'espace d'administration</h1>
<<<<<<< HEAD
       <div class="container flex flex-col-reverse  px-6">
       <div class="  ">
       <div class="p-4">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                            <tr>
                                <th></th>
                                <th class="px-4 py-2  text-center"># id </th>
                                <th class="px-4 py-2  text-center">Hotel Name</th>
                                <th class="px-4 py-2  text-center">Address</th>
                                <th class="px-4 py-2  text-center">telephone</th>
                                <th class="px-4 py-2  text-center">ville</th>
                                <th class="px-4 py-2  text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php
                            $req = "SELECT *  FROM hotels ";
                            $stmt = $conx->prepare($req);
                            $stmt->execute();
                            $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($hotels as $hotel) { ?>
                            <tr class="hover:bg-gray-100">
                                <td class="border-y px-4 py-2">
                                    <div class="inline-flex items-center">
                                        <label class="flex items-center cursor-pointer relative">
                                            <input type="checkbox"
                                                class="peer h-4 w-4 cursor-pointer transition-all appearance-none rounded shadow hover:shadow-md border border-slate-300 checked:bg-blue-600 checked:border-blue-600"
                                                id="check1" />
                                            <span
                                                class="absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5"
                                                    viewBox="0 0 20 20" fill="currentColor" stroke="currentColor"
                                                    stroke-width="1">
                                                    <path fill-rule="evenodd"
                                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                        </label>
                                    </div>
                                </td>
                                <td class="border-y px-4 py-2"><?= $hotel['id_hotel'] ?></td>
                                <td class="border-y px-4 py-2"><?= $hotel['nom_hotel'] ?></td>
                                <td class="border-y px-4 py-2"><?= $hotel['adresse'] ?></td>
                                <td class="dispo border-y px-4 py-2 "><?= $hotel['telephone'] ?> </td>
                                <td class="dispo border-y px-4 py-2 "><?= $hotel['ville'] ?> </td>
                                <td class="relative border-y space-x-2">
                                    <a href="./hotels.php?delete=<?= $room['id_chambre'] ?>" title="Delete"
                                        class="  rounded-md   "
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?');">
                                        <i class="fa-regular fa-trash-can text-xl text-gray-500 hover:text-red-400"></i>
                                    </a>
                                    <a href="./update.php?id=<?= $room['id_chambre'] ?>" class="rounded-md">
                                        <i
                                            class="fa-regular fa-pen-to-square text-xl text-gray-500 hover:text-blue-400"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php  }
                            ?>

                        </tbody>
                    </table>
                </div>
            
       </div>
       <div class="w-4/6 grid grid-cols-1 md:grid-cols-5 gap-6 p-6 ">
                <div class="bg-blue-100 p-4 rounded shadow w-fit">
                    <h2 class="text-md font-semibold w-fit">Nombre de clients</h2>
=======
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mx-6">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">Nombre de clients</h2>
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                    <?php
                    $count_Req = "SELECT COUNT(*) FROM  clients where role='client'";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    <p class="text-blue-600 text-2xl"><?= $counter['COUNT(*)'] ?></p>
                </div>
<<<<<<< HEAD
                <div class="bg-blue-100 p-4 rounded shadow w-fit">
                    <h2 class="text-md font-semibold w-full">Nombre de chambres</h2>
=======
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">Nombre de chambres</h2>
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                    <?php
                    $count_Req = "SELECT COUNT(*) FROM  chambres";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    <p class="text-green-600 text-2xl"><?= $counter['COUNT(*)'] ?></p>
                </div>
<<<<<<< HEAD
                <div class="bg-blue-100 p-4 rounded shadow w-fit">
                    <h2 class="text-md font-semibold">Réservations en attente</h2>
                    <?php
                    $count_Req = "SELECT COUNT(*) FROM  reservations WHERE status ='en attente'";
=======
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">Réservations en attente</h2>
                    <?php
                    $count_Req = "SELECT COUNT(*) FROM  reservations";
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    <p class="text-red-600 text-2xl"><?= $counter['COUNT(*)'] ?></p>
                </div>
<<<<<<< HEAD
                <div class="bg-blue-100 p-4 rounded shadow w-fit">
                    <h2 class="text-md font-semibold">Montant</h2>
                    <?php
                    $count_Req = "SELECT SUM(montant_total) FROM  factures ";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    <p class="text-red-600 text-2xl"><?= $counter['SUM(montant_total)'] ?> MAD</p>
                </div>
       </div>
       </div>
        </main>
    </div>

    <script src="../../js/app.js"></script>
=======
            </div>
        </main>
    </div>
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
</body>

</html>