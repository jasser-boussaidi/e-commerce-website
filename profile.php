<?php
session_start();
if (!isset($_SESSION['nom'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion réussie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.css">
</head>
<style>
    .a {
        margin-top: 40px;
    }
</style>
<body>
<?php
include "nav.php";
?>
<div class="container">
    <nav class="a">
        <h1>Bonjour, <span class="text-primary"><?php echo htmlspecialchars($_SESSION['nom']); ?></span></h1>
        <h2>Email : <?php echo htmlspecialchars($_SESSION['email']); ?></h2>
    </nav>
</div>

<?php
include "footer.php";
?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.14.5/sweetalert2.all.min.js"></script>
<script>
    Swal.fire({
        title: 'Connexion réussie !',
        text: 'Bienvenue, <?php echo htmlspecialchars($_SESSION['nom']); ?> !',
        icon: 'success'
    });
</script>
</html>