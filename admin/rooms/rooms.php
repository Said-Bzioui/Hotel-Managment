<?php
session_start();
include("../clients/../../database/db.php");
<<<<<<< HEAD
$page = "chambres";

=======
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../login.php");
    exit;
}
<<<<<<< HEAD
$conected = false;
if (isset($_SESSION['user_id'])) {
    $conected = true;
}
=======
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../../login.php");
    exit;
}

// delete
if (isset($_GET['delete'])) {
    $id_room = $_GET['delete'];
    $del_req = "DELETE FROM chambres WHERE id_chambre = ?";
    $sql_state = $conx->prepare($del_req);
    if ($sql_state->execute([$id_room])) {
        header("Location: ./rooms.php?deleted");
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
// UPDATE
if (isset($_POST['update'])) {
    if (!empty($_POST['hotel']) && !empty($_POST['type']) && !empty($_POST['lits']) && !empty($_POST['prix'])  && !empty($_POST['up_room_id'])) {
        $id_chambre  = $_POST['up_room_id'];
        $hotel = $_POST['hotel'];
        $type = $_POST['type'];
        $lits = $_POST['lits'];
        $prix = $_POST['prix'];
        $add_req = "UPDATE chambres SET id_hotel=?,id_type=?,nombre_lits=? ,prix=? WHERE id_chambre =?";
        $sql_state = $conx->prepare($add_req);
        if ($sql_state->execute([$hotel, $type, $lits, $prix ,$id_chambre ])) {
            header("Location: ./rooms.php?updated");
        } else {
            echo "Error";
        }
    } else {
        header("Location: ./rooms.php?empty");
        
    }
}
// ---------------------Toast-------------------------
$success = false;
$error = false;
$deleted = false;
$updated = false;
$empty = false;
if (isset($_GET['success'])) {
    $success = true;
}
if (isset($_GET['deleted'])) {
    $deleted = true;
}
if (isset($_GET['updated'])) {
    $updated = true;
}
if (isset($_GET['empty'])) {
    $empty = true;
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

</head>

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
<<<<<<< HEAD
        <?php include("../clients/../../sections/sideBar.php") ?>
        <!-- Main Content -->

        <div class="relative w-4/5 pb-6 grow">
=======
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
                        class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
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
                        class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                        <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                            aria-hidden="true"></span>
                        <i class="fa-solid fa-bed text-xl text-gray-400 mr-3 ml-2 "></i>
                        Chambres
                    </a>
                </li>
                <li>
                    <a href="../reservation/reservations.php"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <span class="material-icons text-gray-400 mr-3 ml-2">event</span>

                        Reservation
                    </a>
                </li>


            </ul>
        </div>
        <!-- Main Content -->

        <div class="relative w-4/5 pb-6">
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
            <!-- empty -->
            <?php
            if ($empty) { ?>

            <div class="fixed left-2/4 top-5 w-100 h-16 bg-gray-200 rounded-t-md border-red-500  mb-4 toast">
                <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
                    <i class="fa-solid fa-circle-exclamation text-red-500 mr-3"></i>
                    <p class="text-red-800  font-bold">Tous Les Champ sont Obligatoire </p>
                    <span class="h-1 w-full absolute bg-red-500 block left-0 bottom-0  "></span>
                </div>
            </div>
            <?php } ?>
            <!-- Success -->
            <?php
            if ($success) { ?>

            <div class="fixed left-2/3 top-5 w-60 h-16 bg-gray-200 rounded-t-md border-green-500  mb-4 toast">
                <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
                    <i class="fa-solid fa-square-check text-green-500 mr-3"></i>
                    <p class="text-green-800  font-bold">Ajouté avec succès</p>
                    <span class="h-1 w-full absolute bg-green-500 block left-0 bottom-0  "></span>
                </div>
            </div>
            <?php } ?>
            <!-- Update -->
            <?php
            if ($updated) { ?>

            <div class="fixed left-2/3 top-5 w-60 h-16 bg-gray-200 rounded-t-md border-blue-500  mb-4 toast">
                <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
                    <i class="fa-solid fa-square-check text-blue-500 mr-3"></i>
                    <p class="text-blue-800  font-bold">Ajouté avec succès</p>
                    <span class="h-1 w-full absolute bg-blue-500 block left-0 bottom-0  "></span>
                </div>
            </div>
            <?php } ?>
            <!-- deleted -->
            <?php
            if ($deleted) { ?>

            <div class="fixed left-2/3 top-5 w-60 h-16 bg-gray-200 rounded-t-md border-green-500  mb-4 toast">
                <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
                    <i class="fa-solid fa-square-check text-green-500 mr-3"></i>
                    <p class="text-green-800  font-bold">supprimer avec succès</p>
                    <span class="h-1 w-full absolute bg-green-500 block left-0 bottom-0  "></span>
                </div>
            </div>
            <?php } ?>
            <!-- header -->
            <div class="shadow-md ">
                <nav class="bg-white">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                        <div class="flex h-16 items-center justify-end">

                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">

                                    <!-- Profile dropdown -->
                                    <div class="relative">
                                        <button type="button"
<<<<<<< HEAD
                                            class="menu-btn relative flex max-w-xs items-center rounded-full text-white py-1 px-2 bg-gray-800 text-sm focus:outline-none focus:ring-2"
=======
                                            class="relative flex max-w-xs items-center rounded-full text-white py-1 px-2 bg-gray-800 text-sm focus:outline-none focus:ring-2"
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                            <?=$_SESSION['user_name'];?>
                                            <i class="fa-regular fa-user text-slate-50 p-2"></i>
                                        </button>
<<<<<<< HEAD
                                        <div
                                            class="usertoogle absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 hidden">
=======

                                        <!-- تصميم القائمة المنسدلة -->
                                        <div
                                            class="usertoogle absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 ">
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                                            <a href="settings.php"
                                                class=" px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                                <i class="fa-solid fa-gear mr-2"></i><span>Settings</span>
                                            </a>
<<<<<<< HEAD
                                      <?php 
                                      if(!$conected){?>
=======
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                                            <a href="rooms.php?login"
                                                class=" px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                                <i class="fa-solid fa-right-to-bracket mr-2"></i><span>Log In</span>
                                            </a>
<<<<<<< HEAD
                                      <?php    } ?>
=======
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                                            <a href="rooms.php?logout "
                                                class=" px-4 py-2 text-sm text-gray-700 hover:bg-red-500 hover:text-white flex items-center">
                                                <span>Log out</span> <i
                                                    class="fa-solid fa-arrow-right-from-bracket ml-2"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                </nav>


            </div>
            <div class=" flex items-center justify-between m-6">
                <h2 class="text-2xl font-semibold">Gerer les Chombres</h2>
                <button class="add_btn  px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                    <i class="fa-solid fa-plus "></i>
                    Add chambres
                </button>
            </div>
            <!-- popup 1 -->
            <div
                class="popup-ajouter w-full h-full fixed top-0 left-0 z-10 bg-black bg-opacity-50 flex items-center justify-center hidden ">
                <form method="post" class=" update_form   bg-white p-6 rounded-lg shadow-md w-full max-w-3xl    ">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2 text-center"> Ajouter de Nouvelles chambres
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
                                    <option value="<?= $hotel['id_hotel'] ?>"><?= $hotel['nom_hotel'] ?>
                                    </option>
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
                                    <option value="<?= $type['id_type'] ?>"><?= $type['type_chambre'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1 ">Number lits
                                </label>
                                <input type="number" name="lits" require placeholder="Number lits"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Prix</label>
                                <input type="number" name="prix" require placeholder="prix"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
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
                                name="ajouter">Ajouter</button>
                        </div>
                    </div>


                </form>

            </div>
            <!-- Tabs -->
            <div class=" flex space-x-4 mt-4 mx-6">
                <button class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  chambres";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    All Chambres <span class="bg-white px-2 rounded-full text-blue-700"><?= $counter['count'] ?></span>
                </button>
                <button class="text-gray-600 hover:bg-blue-100 hover:text-blue-700 rounded-full px-3 py-1 border">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  chambres where disponibilite =1";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    Disponible
                    <span class="ml-1"><?= $counter['count'] ?></span></button>
                <button class="text-gray-600 hover:bg-blue-100 hover:text-blue-700 rounded-full px-3 py-1 border">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  chambres where disponibilite =0";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    Non Disponible
                    <span class="ml-1"><?= $counter['count'] ?></span></button>
            </div>


            <!-- Project List -->
            <div class="mt-4 bg-white shadow rounded-lg mx-6">
                <div class="flex items-center justify-between px-4 py-2 border-b bg-gray-50">
                    <input type="text" placeholder="Search or filter results..."
                        class="w-2/3 px-4 py-2 border rounded-md">
                </div>

                <div class="p-4">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                            <tr>
                                <th></th>
                                <th class="px-4 py-2  text-center"># id </th>
                                <th class="px-4 py-2  text-center">Hotel Name</th>
                                <th class="px-4 py-2  text-center">Type</th>
                                <th class="px-4 py-2  text-center">Prix</th>
                                <th class="px-4 py-2  text-center">Nomber lits</th>
                                <th class="px-4 py-2  text-center">Status</th>
                                <th class="px-4 py-2  text-center">Actions</th>

                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php
                            $req = "SELECT *
                                FROM chambres c
                                INNER JOIN types_chambres t ON c.id_type = t.id_type
                                INNER JOIN hotels h ON c.id_hotel = h.id_hotel";
                            $stmt = $conx->prepare($req);
                            $stmt->execute();
                            $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($rooms as $room) { ?>
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
                                <td class="border-y px-4 py-2"><?= $room['id_chambre'] ?></td>
                                <td class="border-y px-4 py-2"><?= $room['nom_hotel'] ?></td>
                                <td class="border-y px-4 py-2"><?= $room['type_chambre'] ?></td>

                                <td class=" border-y px-4 py-2">$<?= $room['prix'] ?>
                                </td>
                                <td class="border-y px-4 py-2"><?= $room['nombre_lits'] ?></td>
                                <td class="dispo border-y px-4 py-2 ">
                                    <span
                                        class="w-full <?= $room['disponibilite'] == 1 ? "bg-green-200" : "bg-red-200" ?>  text-xs px-2 py-1 rounded"><?= $room['disponibilite'] == 1 ? "disponible" : "Non disponible" ?>
                                    </span>
                                </td>
                                <td class="relative border-y space-x-2">
                                    <a href="./rooms.php?delete=<?= $room['id_chambre'] ?>" title="Delete"
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
        </div>
    </div>
    <script src="../../js/app.js"></script>
</body>

</html>