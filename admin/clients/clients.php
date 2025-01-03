<?php
session_start();
include("../clients/../../database/db.php");
<<<<<<< HEAD
$page = "clients";
$conected = false;
if (isset($_SESSION['user_id'])) {
    $conected = true;
}
=======

>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
// delete
if (isset($_GET['delete'])) {
    $id_client = $_GET['delete'];
    $del_req = "DELETE FROM clients WHERE id_client = ?";
    $sql_state = $conx->prepare($del_req);
    if ($sql_state->execute([$id_client])) {
        header("Location: ./clients.php?deleted");
    } else {
        echo "Error";
    }
}
// Ajouter
if (isset($_POST['ajouter'])) {
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['tel']) && !empty($_POST['pass'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $tel = $_POST['tel'];
        $rol = $_POST['role'];
        $pass = $_POST['pass'];
        $add_req = "INSERT INTO clients  VALUES (null,?,?,?,?,?,?)";
        $sql_state = $conx->prepare($add_req);
        if ($sql_state->execute([$nom, $email, $adresse, $tel, $pass, $rol])) {
            header("Location: ./clients.php?success");
        } else {
            echo "Error";
        }
    } else {
        header("Location: ./clients.php?empty");
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
        if ($sql_state->execute([$hotel, $type, $lits, $prix, $id_chambre])) {
            header("Location: ./rooms.php?updated");
        } else {
            echo "Error";
        }
    } else {
        header("Location: ./rooms.php?empty");
    }
}
<<<<<<< HEAD
=======
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
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14


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
        <div class="w-4/5 grow">

        <?php include("../clients/../../sections/toasts.php") ?>

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
                    <a href="../clients/../dashboard/dashboard.php"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <span class="material-icons text-gray-400 mr-3 ml-2">dashboard</span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="../clients/clients.php"
                        class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                        <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                            aria-hidden="true"></span>

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
                    <a href="../reservation/reservations.php" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                        hover:bg-gray-100">
                        <span class="material-icons text-gray-400 mr-3 ml-2">event</span>

                        Reservation
                    </a>
                </li>


            </ul>
        </div>
        <!-- Main Content -->
        <div class="w-4/5">

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
                    <p class="text-blue-800  font-bold">Modifiére avec succès</p>
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
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
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


<<<<<<< HEAD
            </div> 
            <div class=" flex items-center justify-between m-6">
=======
            </div>
            <div class="flex items-center justify-between m-6">
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
                <h2 class="text-2xl font-semibold">Gerer les Clients</h2>
                <button class="add_btn px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                    <i class="fa-solid fa-plus"></i>
                    Add Clients
                </button>
            </div>
            <!-- popup 1 -->
            <div
                class="popup-ajouter w-full h-full fixed top-0 left-0 z-10 bg-black bg-opacity-50 flex items-center justify-center hidden ">
                <form method="post" class=" update_form   bg-white p-6 rounded-lg shadow-md w-full max-w-3xl    ">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-2 text-center"> Ajouter de Nouvelles Clients
                    </h2>
                    <p class="text-sm text-gray-500 mb-10 text-center">Veuillez saisir les informations relatives à
                        votre chambre.</p>

                    <!-- General Information Section -->
                    <div class="mb-6">
                        <div class="grid grid-cols-2 gap-4">

                            <div>
                                <label class="text-sm text-gray-600 block mb-1 ">
                                    Nom
                                </label>
                                <input type="text" name="nom" require placeholder="nom client"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1 ">
                                    Email
                                </label>
                                <input type="email" name="email" require placeholder="email client"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1 ">
                                    adresse
                                </label>
                                <input type="text" name="adresse" require placeholder="adresse client"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Telephone</label>
                                <input type="number" name="tel" require placeholder="phone"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Password</label>
                                <input type="text" name="pass" require placeholder="password"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Role</label>

                                <select name="role"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                                    <option value="Admin">Admin</option>
                                    <option value="Client">Client</option>
                                </select>
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
            <div class="flex space-x-4 m-6">
                <button class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM  clients";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    All Clients <span class="bg-white px-2 rounded-full text-blue-700"><?= $counter['count'] ?></span>
                </button>
                <button class=" hover:bg-blue-100 text-blue-700 rounded-full px-3 py-1 border">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM clients where role='Admin'";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    Admins
                    <span class="ml-1"><?= $counter['count'] ?></span></button>
                <button class=" hover:bg-blue-100 text-blue-700 rounded-full px-3 py-1 border">
                    <?php
                    $count_Req = "SELECT COUNT(*) as count FROM clients where role='Client'";
                    $sql_state = $conx->prepare($count_Req);
                    $sql_state->execute();
                    $counter = $sql_state->fetch(PDO::FETCH_ASSOC) ?>
                    Client
                    <span class="ml-1"><?= $counter['count'] ?></span></button>
            </div>


            <!-- Project List -->
            <div class="m-6 bg-white shadow rounded-lg">
                <div class="flex items-center justify-between px-4 py-2 border-b bg-gray-50">
                    <input type="text" placeholder="Search or filter results..."
                        class="w-2/3 px-4 py-2 border rounded-md">
                </div>

                <div class="p-4">
                    <table class="min-w-full">
                        <thead class="bg-gray-200 text-gray-600 uppercase text-xs">

                            <tr>
                                <th></th>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Adresse</th>
                                <th class="px-4 py-2">Téléphone</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <?php
                            $req = "SELECT * FROM  clients ORDER BY role ";
                            $stmt = $conx->prepare($req);
                            $stmt->execute();

                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr class="<?= $row['role'] == "Admin" ? 'bg-green-50':'' ?> hover:bg-gray-100">
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
                                <td class="border-y px-4 py-2"><?= $row['id_client'] ?></td>
                                <td class="border-y px-4 py-2"><?= $row['nom'] ?></td>
                                <td class="border-y px-4 py-2"> <?= $row['email'] ?> </td>
                                <td class=" border-y px-4 py-2"><?= $row['adresse'] ?></td>
                                <td class="border-y px-4 py-2"><?= $row['telephone'] ?></td>
                                <td class="border-y px-4 py-2"><?= $row['role'] ?></td>

                                <td class="relative border-y space-x-2">
                                    <a href="./clients.php?delete=<?= $row['id_client'] ?>" title="Delete"
                                        class="  rounded-md   "
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?');">
                                        <i class="fa-regular fa-trash-can text-xl text-gray-500 hover:text-red-400"></i>
                                    </a>
                                    <a href="./update.php?id=<?= $row['id_client'] ?>" class="  rounded-md   ">
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
    <script src="../clients/../../js/app.js"></script>
</body>

</html>