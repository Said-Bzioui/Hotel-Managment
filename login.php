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
<<<<<<< HEAD
                    header('Location: ./hotels.php');
=======
                    header('Location: ./rooms.php');
>>>>>>> 5aa67878e00ad83373f6b1db16b73777eb16e682
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
<<<<<<< HEAD
    <script src="https://cdn.tailwindcss.com"></script>
=======

>>>>>>> 5aa67878e00ad83373f6b1db16b73777eb16e682
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .btn {
        border: none !important;
        font-size: 20px;
        font-weight: 600;
    }
    </style>

</head>

<body class="bg-light">
<<<<<<< HEAD
<section class="bg-gray-50 ">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
 
      <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="w-fit mx-auto text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                  Sign in
              </h1>
              <form class="space-y-4 md:space-y-6" method="POST">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required >
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                  </div>
                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 ">Remember me</label>
                          </div>
                      </div>
                      <a href="#" class="text-sm font-medium text-primary-600 hover:underline ">Forgot password?</a>
                  </div>
                  <button type="submit" class="w-full text-white bg-blue-400 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Sign in</button>
                  <p class="text-sm font-light text-gray-500 ">
                      Don’t have an account yet? <a href="./register.php" class="font-medium text-primary-600 hover:underline ">Sign up</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>
=======
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

>>>>>>> 5aa67878e00ad83373f6b1db16b73777eb16e682
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>