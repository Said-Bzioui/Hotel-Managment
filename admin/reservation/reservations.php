<?php
session_start();
include("../clients/../../database/db.php");

// delete
if (isset($_GET['delete'])) {
    $id_reserv = $_GET['delete'];
    $del_req = "DELETE FROM reservations WHERE id_reservation = ?";
    $sql_state = $conx->prepare($del_req);
    if ($sql_state->execute([$id_reserv])) {
        header("Location: ./reservations.php?deleted");
    } else {
        echo "Error";
    }
}
// Ajouter
if (isset($_POST['ajouter'])) {
    if (!empty($_POST['hotel']) && !empty($_POST['type']) && !empty($_POST['lits']) && !empty($_POST['prix'])) {
        $hotel = $_POST['hotel'];
        $type = $_POST['type'];
        $lits = $_POST['lits'];
        $prix = $_POST['prix'];
        $add_req = "INSERT INTO chambres (id_hotel,id_type,nombre_lits,prix) VALUES (?,?,?,?)";
        $sql_state = $conx->prepare($add_req);
        if ($sql_state->execute([$hotel, $type, $lits, $prix])) {
            header("Location: ./rooms.php?success");
        } else {
            echo "Error";
        }
    } else {
        header("Location: ./rooms.php?empty");
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../clients/../../css/all.min.css">
    <link rel="stylesheet" href="../clients/../../css/toast.css">
    <style>
    td {
        text-align: center !important;
    }

    td.dispo {
        text-align: start !important;
        padding-right: 0 !important;
    }
    </style>

</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-1/5 bg-white shadow-lg p-4">
            <!-- Search Box -->
            <div class="mb-5 text-center">
                <h2 class="text-2xl font-semibold"> Tableau de bord</h2>
            </div>
            <hr>
            <!-- Navigation Menu -->
            <ul class="space-y-2 mt-4">
                <!-- Single Item -->
                <li>
                    <a href="../dashboard/dashboard.php"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <span class="material-icons text-gray-400 mr-3 ml-2">dashboard</span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../clients/clients.php"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <span class="material-icons text-gray-400 mr-3 ml-2">group</span>
                        Clients
                    </a>
                </li>
                <li>
                    <a href="../rooms/rooms.php"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <i class="fa-solid fa-bed text-xl text-gray-400 mr-3 ml-2"></i>
                        Chambres
                    </a>
                </li>
                <li>
                    <a href="../reservation/reservations.php"
                        class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                        <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                            aria-hidden="true"></span>
                        <span class="material-icons text-gray-400 mr-3 ml-2">event</span>
                        Reservation
                    </a>
                </li>


            </ul>
        </div>
        <!-- Main Content -->
        <div class="w-4/5 ">
            <!-- header -->
            <div class="shadow-md ">
                <nav class="bg-white">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex h-16 items-center justify-end">

                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">
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


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </nav>


            </div>
            <div class="flex items-center justify-between m-6">
                <h2 class="text-2xl font-semibold">Gerer les Reservation</h2>
                <button class="add_btn px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                    <i class="fa-solid fa-plus"></i>
                    Add Reservation
                </button>
            </div>
            <!-- popup 1 -->
            <div
                class="popup-ajouter w-full h-full fixed top-0 left-0 z-10 bg-black bg-opacity-50 flex items-center justify-center hidden ">
                <form method="post" class=" update_form   bg-white p-6 rounded-lg shadow-md w-full max-w-3xl    ">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2 text-center"> Ajouter de Nouvelles reservation
                    </h2>
                    <p class="text-sm text-gray-500 mb-10 text-center">Veuillez saisir les informations relatives à
                        votre chambre.</p>

                    <!-- General Information Section -->
                    <div class="mb-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Hotel Name</label>
                                <select name="hotel"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                                    <?php
                                    $req = "SELECT * FROM hotels;";
                                    $stmt = $conx->prepare($req);
                                    $stmt->execute();
                                    $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($hotels as $hotel) { ?>
                                    <option value="<?= $hotel['id_hotel'] ?>"><?= $hotel['nom_hotel'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Type</label>
                                <select name="type"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                                    <?php
                                    $req = "SELECT * FROM types_chambres;";
                                    $stmt = $conx->prepare($req);
                                    $stmt->execute();
                                    $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($types as $type) { ?>
                                    <option value="<?= $type['id_type'] ?>"><?= $type['type_chambre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="relative max-w-sm">
                                <label class="text-sm text-gray-600 block mb-1">Date In </label>
                                <input datepicker id="default-datepicker" type="datetime-local"
                                    value="<?= $reservation['date_arrivee'] ?>" name="datein"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5  "
                                    placeholder="Select date">
                            </div>

                            <div class="relative max-w-sm">
                                <label class="text-sm text-gray-600 block mb-1">Date In </label>
                                <input datepicker id="default-datepicker" type="datetime-local" name="dateout"
                                    value="<?= $reservation['date_depart'] ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                                    placeholder="Select date">
                            </div>


                        </div>
                    </div>


                    <!-- Actions Section -->
                    <div class="flex justify-between items-center mt-6">
                        <div class=" w-full flex items-center justify-end">
                            <span
                                class="cuncel bg-gray-200 font-semibold cursor-pointer text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300">
                                Cuncel</span>
                            <button class="bg-blue-500 font-semibold  text-white px-4 py-2 rounded-md hover:bg-blue-600"
                                name="ajouter" disabled>Ajouter</button>
                        </div>
                    </div>


                </form>

            </div>
            <!-- Tabs -->
            <div class="flex space-x-4 m-6">
                <button class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  reservations";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    All reservations <span
                        class="bg-white px-2 rounded-full text-blue-700"><?= $counter['count'] ?></span></button>
                <button class=" hover:bg-blue-100 text-blue-700 rounded-full px-3 py-1 border">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  reservations where status ='confirmée'";      
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    confirmée
                    <span class="ml-1"><?= $counter['count'] ?></span></button>
                <button class=" hover:bg-blue-100 text-blue-700 rounded-full px-3 py-1 border">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  reservations where status ='en attente'";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    en attente
                    <span class="ml-1"><?= $counter['count'] ?></span></button>
                <button class=" hover:bg-blue-100 text-blue-700 rounded-full px-3 py-1 border">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  reservations where status ='annulée'";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    annulée
                    <span class="ml-1"><?= $counter['count'] ?></span></button>
            </div>


            <!-- Project List -->
            <div class="mt-4 bg-white shadow rounded-lg m-6">
                <div class="flex items-center justify-between px-4 py-2 border-b bg-gray-50">
                    <input type="text" placeholder="Search or filter results..."
                        class="w-2/3 px-4 py-2 border rounded-md">
                </div>

                <div class="p-4">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                            <tr>
                                <td></td>
                                <th class="px-4 py-2 ">ID</th>
                                <th class="px-4 py-2">Date in</th>
                                <th class="px-4 py-2">Date out</th>
                                <th class="px-4 py-2">id client</th>
                                <th class="px-4 py-2">id Chombre</th>
                                <th class="px-4 py-2">Status</th>
                                <th class="px-4 py-2">Actions</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php
                            $req = "SELECT * FROM  reservations";
                            $stmt = $conx->prepare($req);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
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
                                <td class="border-y px-4 py-2"><?= $row['id_reservation'] ?></td>
                                <td class="border-y px-4 py-2"><?= $row['date_arrivee'] ?></td>
                                <td class="border-y px-4 py-2"><?= $row['date_depart'] ?></td>
                                <td class="border-y px-4 py-2"><?= $row['id_client'] ?></td>

                                <td class=" border-y px-4 py-2"><?= $row['id_chambre'] ?>
                                </td>
                                <td class="border-y px-4 py-2">
                                    <span
                                        class="w-full  text-sm <?= $row['status'] == 'confirmée' ? 'bg-green-300':'bg-yellow-300' ?>  px-2 py-1 rounded">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td class="relative border-y space-x-2">
                                    <a href="./reservations.php?delete=<?= $row['id_reservation'] ?>" title="Delete"
                                        class="  rounded-md   "
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?');">
                                        <i class="fa-regular fa-trash-can text-xl text-gray-500 hover:text-red-400"></i>
                                    </a>
                                    <a href="./update.php?id=<?= $row['id_reservation'] ?>" class="rounded-md">
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
        </div>
    </div>
    <script src="../../js/app.js"></script>
</body>

</html>