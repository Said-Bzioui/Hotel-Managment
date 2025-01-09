<?php
session_start();
require_once './database/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$conected = false;
if (isset($_SESSION['user_id'])) {
    $conected = true;
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ./login.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <!-- <link rel="stylesheet" href="./css/rooms.css" /> -->
    <link rel="stylesheet" href="./css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <!-- <style>
    .landing{
    background-image: url(../assets/hotel/hotel-1.jpg) !important;
}
</style> -->
</head>

<body>
    <header>
        <div class="container py-2 mx-auto flex items-center justify-between ">
            <div class="bg-green-500 p-1 rounded-md text-white flex items-center justify-between">
                <i class="fa-regular fa-clock"></i>
                <div class="ml-2">23:09:59</div>
            </div>
            <div class="flex items-center justify-between ">
                <div class="mr-3"><i class="fa-solid fa-globe text-gray-500 mr-1"></i>Morocco</div>
                <div class="bg-gray-200 p-1 rounded-md">
                    <i class="fa-regular fa-circle-user"></i>
                    <?= $_SESSION['user_name']; ?>
                </div>
                <div class="usertoogle hidden">
                    <a href="settings.php" class="item"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
                    <?php if (!$conected) { ?>
                        <a href="rooms.php?login" class="item"><i class="fa-solid fa-right-to-bracket"></i><span>Log
                                In</span></a>
                    <?php } ?>
                    <a href="index.php?logout" class="logout"><span>Log out</span> <i
                            class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            </div>
        </div>
    </header>
    <section class="relative bg-[url(./assets/hotel/hotel-1.jpg)] h-96 bg-cover bg-center mb-32">
        <div class="absolute w-full h-full bg-slate-500 opacity-50"></div>
        <div class="searching absolute z-10 left-1/2 -bottom-10 -translate-x-1/2 bg-white w-2/4 shadow-lg p-3 rounded">
            <form class="container flex items-center justify-around">

                <select id="countries" class="bg-gray-50 w-32 text-gray-500 mx-5 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5">
                    <?php
                    $req = "SELECT ville FROM hotels";

                    $stmt = $conx->prepare($req);
                    $stmt->execute();

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value=<?= $row['ville'] ?>><?= $row['ville'] ?></option>
                    <?php } ?>
                </select>

                <div id="date-range-picker" date-rangepicker class="flex items-center mr-6">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 " placeholder="Select date end">
                    </div>
                </div>
                <div class=" justify-self-end">
                    <button type="button" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 ">Search</button>
                    <a class="text-white   bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 " href="./rooms.php">Reset</a>
                </div>
            </form>
        </div>
    </section>

    <div class="rooms-show ">
        <div class="container mx-auto min-h-screen">
            <div class="content">

                <div class="list">
                    <?php
                    $req = "SELECT * FROM hotels ";
                    $stmt = $conx->prepare($req);
                    $stmt->execute();
                    $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($hotels) {
                        $counter = 0;
                        foreach ($hotels as $hotel) {
                            $counter += 1   ?>
                            <?php if ($counter % 2 == 0) { ?>
                                
                                <div class="mx-auto my-8 h-56 w-3/4 bg-white border border-gray-200 rounded-lg shadow flex">
                                    <div class=" w-2/4 ">
                                        <img class="h-full object-cover w-full rounded " src="./assets/hotel/hotel-3.jpg" alt="" />
                                    </div>
                                    <a href="./rooms.php?id_hotel=<?= $hotel['id_hotel'] ?>" class=" p-2 flex-1">
                                        <div class="ml-10 pt-5 flex-1">
                                          
                                                <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-600 ">
                                                    <?= $hotel['nom_hotel'] ?>
                                                </h5>
                                           
                                            <div class="flex items-center mb-10 space-x-1 ">
                                                <p class=" font-normal text-gray-500 ">
                                                    <?= $hotel['adresse'] ?>
                                                </p>
                                                <p class=" font-normal text-md h-fit  bg-gray-200 text-slate-400 rounded-full px-2 py-1">
                                                    <?= $hotel['ville'] ?>
                                                </p>
                                            </div>
                                            <p class="mb-3 font-normal text-gray-500">
                                                <?= $hotel['description'] ?>
                                            </p>



                                            <div class="flex items-center mb-4 text-sm font-medium text-gray-500">
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
                                                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
                                                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
                                            </div>



                                        </div>
                                    </a>
                                </div>

                            <?php } else { ?>
                                <div class="mx-auto my-8 h-56 w-3/4 flex flex-row-reverse bg-white border border-gray-200 rounded-lg shadow ">
                                    <div class=" w-2/4 ">
                                        <img class="h-full object-cover w-full rounded " src="./assets/hotel/hotel-2.jpg" alt="" />
                                    </div>
                                    <a href="./rooms.php?id_hotel=<?= $hotel['id_hotel'] ?>" class=" p-2 flex-1">
                                        <div class="ml-10 pt-5 flex-1">
                                          
                                                <h5 class="mb-1 text-2xl font-bold tracking-tight text-gray-600 ">
                                                    <?= $hotel['nom_hotel'] ?>
                                                </h5>
                                           
                                            <div class="flex items-center mb-10 space-x-1 ">
                                                <p class=" font-normal text-gray-500 ">
                                                    <?= $hotel['adresse'] ?>
                                                </p>
                                                <p class=" font-normal text-md h-fit  bg-gray-200 text-slate-400 rounded-full px-2 py-1">
                                                    <?= $hotel['ville'] ?>
                                                </p>
                                            </div>
                                            <p class="mb-3 font-normal text-gray-500">
                                                <?= $hotel['description'] ?>
                                            </p>



                                            <div class="flex items-center mb-4 text-sm font-medium text-gray-500">
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                    <path
                                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                </svg>
                                                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
                                                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
                                                <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
                                            </div>



                                        </div>
                                    </a>
                                </div>
                    <?php }
                        }
                    } ?>



                </div>
            </div>
        </div>
    </div>

    <script defer src="./js/main.js"></script>

</body>

</html>