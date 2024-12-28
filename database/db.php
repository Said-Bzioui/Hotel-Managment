<?php
try {
    $conx = new PDO("mysql:host=localhost;dbname=hotelres", "root", "");
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Not Connected : " . $e->getMessage();
}

?>