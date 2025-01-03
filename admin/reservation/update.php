<?php
include("../clients/../../database/db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datein = $_POST['datein'];
    $dateout = $_POST['dateout'];
    $id_client = $_POST['id_client'];
    $id_chambre = $_POST['id_chambre'];
    $status = $_POST['status'];
    $req = "UPDATE reservations SET date_arrivee = ?, date_depart = ?, id_client  = ?, id_chambre = ?, status = ? WHERE id_reservation = ?;";
    $stmt = $conx->prepare($req);
    $stmt->execute([$datein, $dateout, $id_client, $id_chambre, $status, $id]);
    
    if ($stmt) {
        header('Location: ./reservations.php?updated');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $id ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../clients/../../css/all.min.css">
</head>

<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php include("../clients/../../sections/sideBar.php") ?>


        <div class="w-4/5 grow ">
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
                        <?php
                        $req = "SELECT * FROM reservations 
                        WHERE id_reservation = ?;";
                        $stmt = $conx->prepare($req);
                        $stmt->execute([$id]);
                        $reservation = $stmt->fetch();

                        ?>
                        <div class="grid grid-cols-2 gap-4">
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

                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Clients</label>
                                <input
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500"
                                    type="text" value="<?= $reservation['id_client'] ?>" name="id_client" readonly>
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Chambre</label>
                                <input
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500"
                                    type="text" value="<?= $reservation['id_chambre'] ?>" name="id_chambre" readonly>

                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Status</label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="en attente" selected>en attente</option>
                                    <option value="confirmée">confirmée</option>
                                    <option value="annulée">annulée</option>
                                </select>
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