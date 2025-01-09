<?php
require_once './database/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
<<<<<<< HEAD
    $password = $_POST['password'];

=======
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }
>>>>>>> 5aa67878e00ad83373f6b1db16b73777eb16e682

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
<<<<<<< HEAD
        $query = "INSERT INTO clients (nom, email, password) VALUES (:name, :email, :password)";
=======
        $query = "INSERT INTO clients (nom, email, adresse, telephone, password) VALUES (:name, :email, :adresse, :telephone, :password)";
>>>>>>> 5aa67878e00ad83373f6b1db16b73777eb16e682
        $stmt = $conx->prepare($query);

        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
<<<<<<< HEAD
=======
        $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);
>>>>>>> 5aa67878e00ad83373f6b1db16b73777eb16e682
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
<<<<<<< HEAD
    <link rel="stylesheet" href="./css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</head>

<body class="bg-light d-flex align-items-center justify-content-center vh-100">


    <section class="bg-gray-50 ">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="w-fit mx-auto text-xl font-bold leading-tight tracking-tight text-gray-500 md:text-2xl ">
                        Create New Account
                    </h1>
                    <form class="max-w-sm mx-auto" method="POST">
                        <div class="mb-5">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Full Name</label>
                            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="xxxxxxx" required />
                        </div>
                   
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                            <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@flowbite.com" required />
                        </div>
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
                            <input type="password" name="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                        </div>
                
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 "  />
                            </div>
                            <label for="terms" class="ms-2 text-sm font-medium text-gray-900 ">I agree with the <a href="#" class="text-blue-600 hover:underline ">terms and conditions</a></label>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Register new account</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
=======
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

>>>>>>> 5aa67878e00ad83373f6b1db16b73777eb16e682
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>