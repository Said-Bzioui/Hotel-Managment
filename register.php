<?php
require_once './database/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $query = "INSERT INTO clients (nom, email, adresse, telephone, password) VALUES (:name, :email, :adresse, :telephone, :password)";
        $stmt = $conx->prepare($query);

        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $stmt->bindValue(':password', $hashed_password, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header("location: login.php");
        } else {
            echo "Erreur lors de la création du compte.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .btn {
        background-color: orange !important;
        border: none !important;
        font-size: 20px;

        font-weight: 600;
    }

    .btn:hover {
        background-color: #d17a0e !important;
    }
    </style>
</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Créer un Compte</h2>

                        <form method="POST" action="register.php">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Entrez votre nom" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Entrez votre email" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="adresse" name="adresse"
                                    placeholder="Entrez votre adresse" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="telephone" name="telephone"
                                    placeholder="Entrez votre téléphone" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Entrez votre mot de passe" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" placeholder="Confirmez votre mot de passe" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Créer un compte</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p class="text-muted">Vous avez déjà un compte ?
                                <a href="login.php" class="text-decoration-none">Se connecter</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>