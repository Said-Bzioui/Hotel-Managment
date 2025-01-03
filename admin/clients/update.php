<?php
include("../clients/../../database/db.php");
$id;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM clients WHERE id_client = :id";
    $stmt = $conx->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $row['nom'];
        $email = $row['email'];
        $adresse = $row['adresse'];
        $tel = $row['telephone'];
        $pass = $row['password'];
        $rol = $row['role'];
    }
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['nom'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];
    $rol = $_POST['role'];
    $pass = $_POST['pass'];
    $query = "UPDATE clients SET nom = :nom, email = :email, adresse = :adresse, telephone = :tel,role = :rol, password = :pass WHERE id_client = :id";
    $stmt = $conx->prepare($query);
    $stmt->bindParam(':nom', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':rol', $rol, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header('Location: ./clients.php?updated');

} 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$name ?> </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../clients/../../css/all.min.css">
</head>

<body>
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
                    <a href="./dashboard.php"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <span class="material-icons text-gray-400 mr-3 ml-2">dashboard</span>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="./clients.php"
                        class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                        <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                            aria-hidden="true"></span>

                        <span class="material-icons text-gray-400 mr-3 ml-2">group</span>
                        Clients
                    </a>
                </li>
                <li>
                    <a href="./rooms.php"
                        class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                        <i class="fa-solid fa-bed text-xl text-gray-400 mr-3 ml-2"></i>
                        Chambres
                    </a>
                </li>
                <li>
                    <a href="./reservations.php" class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                        hover:bg-gray-100">
                        <span class="material-icons text-gray-400 mr-3 ml-2">event</span>

                        Reservation
                    </a>
                </li>


            </ul>
        </div>


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
            <!-- Main Content -->

            <div class="container p-6 w-full h-full ">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold">Modifiére les donneé de Clients</h2>

                </div>
                <!-- popup 1 -->

                <form method="post" class=" update_form mx-auto mt-20 w-full max-w-3xl bg-blue-50  p-6 rounded-md ">



                    <!-- General Information Section -->
                    <div class="mb-6">
                        <div class="grid grid-cols-2 gap-4">

                            <div>
                                <label class="text-md  text-gray-600  mb-1 ">
                                    Nom
                                </label>
                                <input type="text" value="<?=$name ?>" name="nom" require placeholder="nom client"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1 ">
                                    Email
                                </label>
                                <input type="email" value="<?=$email ?>" name="email" require placeholder="email client"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1 ">
                                    adresse
                                </label>
                                <input type="text" value="<?=$adresse ?>" name="adresse" require
                                    placeholder="adresse client"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Telephone</label>
                                <input type="number" value="<?=$tel ?>" name="tel" require placeholder="phone"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Password</label>
                                <input type="text" value="<?=$pass ?>" name="pass" require placeholder="password"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="text-sm text-gray-600 block mb-1">Role</label>
                                <select name="role"
                                    class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500">
                                    <option value="<?= $rol ?>"><?= $rol ?></option>
                                    <option value="<?= $rol == 'Client' ? 'Admin' : 'Client' ?>">
                                        <?= $rol == 'Client' ? 'Admin' : 'Client' ?></option>
                                </select>
                            </div>


                        </div>
                    </div>


                    <!-- Actions Section -->
                    <div class="flex justify-between items-center mt-6">
                        <div class=" w-full flex items-center justify-end">
                            <a href="./clients.php"
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