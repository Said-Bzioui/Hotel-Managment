<<<<<<< HEAD



<div class="w-1/5 sm:w-52 bg-white shadow-lg p-4 ease-in-out ">
    <!-- Search Box -->
    <div class="mb-5 text-center">
        <h2 class="md:text-2xl font-semibold ease-in-out"> Tableau de bord</h2>
=======
<div class="w-1/5 bg-white shadow-lg p-4">
    <!-- Search Box -->
    <div class="mb-5 text-center">
        <h2 class="text-2xl font-semibold"> Tableau de bord</h2>
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
    </div>
    <hr>
    <!-- Navigation Menu -->
    <ul class="space-y-2 mt-4">
        <!-- Single Item -->
        <li>
<<<<<<< HEAD
            <?php
            if($page == 'dashboard'){ ?>
=======
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
            <a href="../dashboard/dashboard.php"
                class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                    aria-hidden="true"></span>
<<<<<<< HEAD
                <span class="material-icons text-gray-400 mr-3 ml-2">dashboard</span>
                <span class='hidden sm:block '>Dashboard</span>
            </a>
            <?php } else{ ?>
                <a  href="../dashboard/dashboard.php"
                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                <span class="material-icons text-gray-400 mr-3 ml-2">dashboard</span>
                <span class='hidden sm:block '>dashboard</span>
            </a>
            <?php } ?>


        </li>
        <li>
            <?php
            if($page == 'clients'){ ?>
            <a href="../clients/clients.php"
                class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                    aria-hidden="true"></span>
                <span class="material-icons text-gray-400 mr-3 ml-2">group</span>
                <span class='hidden sm:block '>clients</span>
            </a>
            <?php } else{ ?>
                <a href="../clients/clients.php"
                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                <span class="material-icons text-gray-400 mr-3 ml-2">group</span>
                <span class='hidden sm:block '>clients</span>
            </a>
            <?php } ?>
        </li>
        <li>

            <?php
            if($page == 'chambres'){ ?>
            <a href="../rooms/rooms.php"
                class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                    aria-hidden="true"></span>
                    <i class="fa-solid fa-bed text-xl text-gray-400 mr-3 ml-2"></i>
                <span class='hidden sm:block '>Chambres</span>
            </a>
            <?php } else{ ?>
                <a href="../rooms/rooms.php"
                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                <i class="fa-solid fa-bed text-xl text-gray-400 mr-3 ml-2"></i>
                <span class='hidden sm:block '>Chambres</span>
            </a>
            <?php } ?>
        </li>
        <li>
            <?php
            if($page == 'reserv'){ ?>
            <a href="../reservation/reservations.php"
                class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md bg-blue-50">
                <span class="block w-1.5 h-4/5 absolute left-1 top-1/2 -translate-y-1/2 rounded-md  bg-blue-500"
                    aria-hidden="true"></span>
                    <span class="material-icons text-gray-400 mr-3 ml-2">event</span>

                <span class='hidden sm:block '>Reservation</span>
            </a>
            <?php } else{ ?>
                <a href="../reservation/reservations.php"
                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                <span class="material-icons text-gray-400 mr-3 ml-2">event</span>
                <span class='hidden sm:block '>Reservation</span>
            </a>
            <?php } ?>
=======

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
            <a href="../rooms/rooms.php" class="relative flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md
                    hover:bg-gray-100"> <i class="fa-solid fa-bed text-xl text-gray-400 mr-3 ml-2"></i>
                Chambres
            </a>
        </li>
        <li>
            <a href="../reservation/reservations.php"
                class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 rounded-md hover:bg-gray-100">
                <span class="material-icons text-gray-400 mr-3 ml-2">event</span>

                Reservation
            </a>
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
        </li>


    </ul>
</div>