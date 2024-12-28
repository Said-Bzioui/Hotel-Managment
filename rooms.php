<?php
session_start();
require_once './database/db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="./css/rooms.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
</head>

<body>
    <header>
        <div class="container">
            <div class="hour">
                <i class="fa-regular fa-clock"></i>
                <div class="time">23:09:59</div>
            </div>
            <div class="region">
                <div class="contry"><i class="fa-solid fa-globe"></i>Morocco</div>

                <div class="user">
                    <i class="fa-regular fa-circle-user"></i>
                    <?= $_SESSION['user_name']; ?>
                </div>
                <div class="usertoogle">
                    <a href="settings.php" class="item"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
                    <a href="rooms.php?login" class="item"><i class="fa-solid fa-right-to-bracket"></i><span>Log
                            In</span></a>
                    <a href="romms.php?logout" class="logout"><span>Log out</span> <i
                            class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="searching">
        <form class="container">
            <div class="card">
                <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="form-inputs">
                    <label for="">Location</label>
                    <select name="ville" id="ville">
                        <?php
                        $req = "SELECT ville FROM hotels";

                        $stmt = $conx->prepare($req);
                        $stmt->execute();

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value=<?= $row['ville'] ?>><?= $row['ville'] ?></option>
                        <?php } ?>
                    </select>

                </div>
            </div>
            <button class="serch_btn">
                Search
            </button>
            <a class="reset_btn" href="./rooms.php">Reset</a>
        </form>
    </div>
    <div class="rooms-show">
        <div class="container">
            <div class="content">
                <div class="settings">
                    <div class="res-counter">0 reasults</div>
                    <div class="sorting">
                        <span> Sort By </span>
                        <select>
                            <option value="">Best Quality</option>
                        </select>
                    </div>
                </div>
                <div class="list">
                    <?php
                    try {
                        if (isset($_GET['ville']) && !empty($_GET['ville'])) {
                            $ville = $_GET["ville"];
                            $req = "SELECT
                    c.id_chambre,
                    c.prix,
                    t.type_chambre,
                    t.description,
                    h.nom_hotel,
                    h.ville
                FROM chambres c
                INNER JOIN types_chambres t ON c.id_type = t.id_type
                INNER JOIN hotels h ON c.id_hotel = h.id_hotel
                WHERE c.disponibilite = 1 AND h.ville = :ville";

                            $stmt = $conx->prepare($req);
                            $stmt->bindParam(':ville', $ville, PDO::PARAM_STR);
                        } else {
                            $req = "SELECT
                    c.id_chambre,
                    c.prix,
                    t.type_chambre,
                    t.description,
                    h.nom_hotel,
                    h.ville
                FROM chambres c
                INNER JOIN types_chambres t ON c.id_type = t.id_type
                INNER JOIN hotels h ON c.id_hotel = h.id_hotel
                WHERE c.disponibilite = 1";

                            $stmt = $conx->prepare($req);
                        }

                        $stmt->execute();
                        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if ($rooms) {
                            foreach ($rooms as $room) { ?>
                    <div class="room__card">
                        <div class="room__card__image">
                            <img src="./assets/room-1.jpg" alt="room" />
                            <div class="ville"><?= htmlspecialchars($room['ville']) ?></div>
                        </div>
                        <div class="room__card__details">
                            <h3><?= htmlspecialchars($room['type_chambre']) ?></h3>
                            <p><?= htmlspecialchars($room['description']) ?></p>
                            <div class="foot">
                                <span>$<?= htmlspecialchars($room['prix']) ?><br>
                                    <span class="det">Per day</span>
                                </span>
                                <a class="btn book-btn"
                                    href="./reserv.php?id=<?= htmlspecialchars($room['id_chambre']) ?>">Book Now</a>
                            </div>
                        </div>
                    </div>
                    <?php }
                        } else {
                            echo "<p>No rooms available.</p>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>

    <script defer src="./js/main.js"></script>

</body>

</html>