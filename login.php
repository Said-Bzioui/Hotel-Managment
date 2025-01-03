<?php
session_start();
require_once './database/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $query = "SELECT * FROM clients WHERE email = :email";
        $stmt = $conx->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id_client'];
                $_SESSION['user_name'] = $user['nom'];
                if ($user['role'] == 'Admin') {
                    header('Location: ./admin/dashboard/dashboard.php');
                    exit;
                }else{
                    header('Location: ./rooms.php');
                    exit;
                }
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Aucun compte trouvé avec cet email.";
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .btn {
<<<<<<< HEAD
        border: none !important;
        font-size: 20px;
        font-weight: 600;
    }
=======
        background-color: orange !important;
        border: none !important;
        font-size: 20px;

        font-weight: 600;
    }

    .btn:hover {
        background-color: #d17a0e !important;
    }
>>>>>>> af5a82bb98bde7130c5e563c444348cbae929b14
    </style>

</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Log in</h3>
            <form method="POST" action="login.php">
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email"
                        required>
                </div>
                <div class=" mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>
                <img src=" about.jpg" alt="">
                <button type="submit" class="btn btn-primary w-100">Log in</button>
                <div class="text-center mt-3">
                    <small>Vous n'avez pas de compte ? <a href="./register.php">Cree account</a></small>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>