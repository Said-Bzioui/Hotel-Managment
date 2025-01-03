<?php
session_start();
require_once './database/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $req = "SELECT 
    c.id_chambre ,
    c.prix  ,
    c.nombre_lits,t.type_chambre,
    t.description ,
    h.nom_hotel 
    FROM chambres c 
    INNER JOIN types_chambres t
    ON  c.id_type=t.id_type 
    INNER JOIN hotels h 
    ON c.id_hotel=h.id_hotel
    WHERE id_chambre = :id";

    $stmt = $conx->prepare($req);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['confirme'])) {
    try {
        if (!empty($_POST['id']) && !empty($_POST['dateIn']) && !empty($_POST['dateOut'])) {
            $id = $_POST['id'];
            $dateIn = $_POST['dateIn'];
            $dateOut = $_POST['dateOut'];
            $id_client =$_SESSION['user_id'];

            $req = "INSERT INTO `reservations`
                    VALUES (NULL, :id_client, :id_chambre, :date_in, :date_out, 'en attente')";

            $stmt = $conx->prepare($req);
            $stmt->bindParam(':id_chambre', $id, PDO::PARAM_INT);
            $stmt->bindParam(':date_in', $dateIn, PDO::PARAM_STR);
            $stmt->bindParam(':date_out', $dateOut, PDO::PARAM_STR);
            $stmt->bindParam(':id_client', $id_client, PDO::PARAM_STR);

            $stmt->execute();

            header("Location: rooms.php?confirmed");
            exit();
        } else {
            echo "touts les champe sont obligatoire";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_POST['cancel'])) {
header("location: rooms.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/reserv.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" /> -->

</head>

<body>
    <div class="room-details close ">
        <div class="room-handel">
            <div class="content">
                <div class="deatails">
                    <h3><?= $row['nom_hotel'] ?></h3>
                    <div class="image">
                        <img src="./assets/room-1.jpg" alt="room">
                    </div>
                    <div class="room-info">
                        <span><i class="fa-solid fa-users"></i> x<?= $row['nombre_lits'] ?></span>
                        <span><?= $row['type_chambre'] ?></span>
                    </div>
                    <p> <?= $row['description'] ?></p>
                    <div class="features">
                        <h3>Features</h3>
                        <div class="features-list">
                            <i class="fa-solid fa-tachograph-digital"></i>
                            <i class="fa-solid fa-wifi"></i>
                            <i class="fa-solid fa-phone"></i>
                            <i class="fa-solid fa-utensils"></i>
                        </div>
                    </div>
                </div>
                <form method="POST" class="confirme">
                    <h3>Select Your Time</h3>
                    <input type="hidden" name="id" value=<?= $row['id_chambre'] ?>>
                    <div class="form-input">
                        <label for="start">Start</label>
                        <input type="datetime-local" name="dateIn" id="start" value="2024-11-11 00:00">
                    </div>
                    <div class="form-input">
                        <label for="end">End</label>
                        <input type="datetime-local" name="dateOut" id="end" value="2024-11-11 00:00">
                    </div>
                    <h3>Aditional Services</h3>
                    <div class="service-check">
                        <div class="check-box">
                            <input type="checkbox" id="Service1" disabled>
                            <label for="Service1">Cafering Services</label>
                        </div>
                        <span>+$20.00</span>
                    </div>
                    <div class="service-check">
                        <div class="check-box">
                            <input type="checkbox" id="Service2" disabled>
                            <label for="Service2">Cafering Services</label>
                        </div>
                        <span>+$20.00</span>
                    </div>
                    <div class="service-check">
                        <div class="check-box">
                            <input type="checkbox" id="Service3" disabled>
                            <label for="Service3">Cafering Services</label>
                        </div>
                        <span>+$20.00</span>
                    </div>
                    <h3>Discount code</h3>
                    <div class="discount-handel">
                        <input type="text">
                        <button>Apply</button>
                    </div>
                    <div class="total">
                        <span>Total</span>
                        <h2>$<?= $row['prix'] ?></h2>
                    </div>
                    <div class="btns">
                        <button class="confirm-btn" name="confirme">Confirme</button>
                        <a class="cancel_btn" href="./rooms.php">Cancel</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>