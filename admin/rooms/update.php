<?php
include("../clients/../../database/db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_id = $_POST['hotel'];
    $id_type = $_POST['type'];
    $prix = $_POST['prix'];
    $status = $_POST['disponibilite'];
    $n_lits = $_POST['nombre_lits'];
    $query = "UPDATE chambres SET 
    id_hotel = :hotel_id,
    id_type = :id_type,
    prix = :prix,
    disponibilite = :status,
    nombre_lits = :n_lits
    WHERE id_chambre = :id";
    $stmt = $conx->prepare($query);
    $stmt->bindParam(':hotel_id', $hotel_id, PDO::PARAM_INT);
    $stmt->bindParam(':id_type', $id_type, PDO::PARAM_INT);
    $stmt->bindParam(':prix', $prix, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_INT);
    $stmt->bindParam(':n_lits', $n_lits, PDO::PARAM_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header('Location: ./rooms.php?updated');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$id ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../clients/../../css/all.min.css">
</head>

<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php include("../clients/../../sections/sideBar.php") ?>


        <div class="w-4/5  grow">
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
            <!-- Main Content -->

            <div class="container p-6 w-full h-full ">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold">Modifiére les donneé de Clients</h2>

                </div>
                <!-- popup 1 -->

                <form method="post" class=" update_form mx-auto mt-5 w-full max-w-3xl bg-blue-50  p-6 rounded-md ">
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
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">disponibilite</label>
                                <select name="dispobilite"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                                    <option value="1">Disponible</option>
                                    <option value="0">Non Disponible</option>
                                </select>

                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Number Lits</label>
                                <?php
                                $id = $_GET['id'];
                                $req = "SELECT nombre_lits FROM chambres WHERE id_chambre  = ?;";
                                $stmt = $conx->prepare($req);
                                $stmt->execute([$id]);
                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($results as $room) { ?>
                                <input
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500"
                                    type="text" value="<?= $room['nombre_lits'] ?>" name="nombre_lits" require>
                                <?php } ?>


                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Prix</label>
                                <?php
                                $id = $_GET['id'];
                                $req = "SELECT prix FROM chambres WHERE id_chambre  = ?;";
                                $stmt = $conx->prepare($req);
                                $stmt->execute([$id]);
                                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($results as $room) { ?>
                                <input
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500"
                                    type="text" value="<?= $room['prix'] ?>" name="prix" require>
                                <?php } ?>
                            </div>


                        </div>
                    </div>


                    <!-- Actions Section -->
                    <div class="flex justify-between items-center mt-6">
                        <div class=" w-full flex items-center justify-end">
                            <a href="./rooms.php"
                                class="cuncel bg-gray-200 font-semibold cursor-pointer text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-300">
                                Cuncel</a>
                            <button class="bg-blue-500 font-semibold  text-white px-4 py-2 rounded-md hover:bg-blue-600"
                                name="update">update</button>
                        </div>
                    </div>


                </form>


            </div>

        </div>
    </div>
</body>

</html>