<?php
// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";
session_start();
if (isset($_SESSION['nom'])) {
    header('location:profile.php');
}

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Gestion de la soumission du formulaire
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Recherche de l'utilisateur par email
    $sql = "SELECT * FROM users WHERE email='$email' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Vérification du mot de passe
        if (password_verify($pass, $row['password'])) {
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['nom'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['etat'] = $row['etat'];
            header('location:profile.php');
            exit;
        } else {
            $message = "<script>
                Swal.fire({
                    title: 'Mot de passe incorrect',
                    text: 'Veuillez réessayer.',
                    icon: 'error'
                });
            </script>";
        }
    } else {
        $message = "<script>
            Swal.fire({
                title: 'Email non enregistré',
                text: 'Veuillez vous inscrire d\'abord.',
                icon: 'error'
            });
        </script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.css">
    <style>
        /* Votre CSS ici */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .left-panel {
            background-color: #000;
            color: #fff;
            padding: 40px;
            width: 40%;
        }
        .left-panel h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        .right-panel {
            padding: 40px;
            width: 60%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .right-panel h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        form {
            width: 100%;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #000;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>BIENVENUE !</h1>
        </div>
        <div class="right-panel">
            <h2>Connexion</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Mot de passe" required>
                </div>
                <button type="submit">Se connecter</button>
                <p>Vous n'avez pas de compte ? <a href="signup.php">Inscrivez-vous</a></p>
                <a href="page1.php" class="back-link">Retour</a>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.all.min.js"></script>
    <?php
    // Affichage du message SweetAlert si défini
    if (!empty($message)) {
        echo $message;
    }
    ?>
</body>
</html>