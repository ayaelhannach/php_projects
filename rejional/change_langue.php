<?php
// Changer la langue et rediriger vers accueil.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['langue'])) {
    $langue = $_POST['langue'];
    setcookie('langue', $langue, time() + (86400 * 30), "/"); // Le cookie expire dans 30 jours
    header("Location: " . $_SERVER['PHP_SELF'] . "?page=accueil");
    exit();
}

// Réinitialiser la langue
if (isset($_GET['reset'])) {
    setcookie('langue', '', time() - 3600, "/"); // Supprime le cookie en le faisant expirer
    header("Location: " . $_SERVER['PHP_SELF'] . "?page=accueil");
    exit();
}

// Déterminer la langue
$langue = isset($_COOKIE['langue']) ? $_COOKIE['langue'] : 'fr';

// Textes en différentes langues
$textes = [
    'fr' => [
        'bienvenue' => 'Bienvenue sur notre site web!',
        'reset' => 'Réinitialiser la langue',
        'choisir' => 'Choisissez votre langue',
        'changer' => 'Changer de langue'
    ],
    'en' => [
        'bienvenue' => 'Welcome to our website!',
        'reset' => 'Reset Language',
        'choisir' => 'Choose your language',
        'changer' => 'Change language'
    ],
    'es' => [
        'bienvenue' => '¡Bienvenido a nuestro sitio web!',
        'reset' => 'Restablecer el idioma',
        'choisir' => 'Elige tu idioma',
        'changer' => 'Cambiar idioma'
    ]
];

// Déterminer la page
$page = isset($_GET['page']) ? $_GET['page'] : 'index';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $textes[$langue]['choisir']; ?></title>
</head>
<body>

<?php if ($page == 'index'): ?>
    <h1><?php echo $textes[$langue]['choisir']; ?></h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <select name="langue">
            <option value="fr"<?php if ($langue == 'fr') echo ' selected'; ?>>Français</option>
            <option value="en"<?php if ($langue == 'en') echo ' selected'; ?>>English</option>
            <option value="es"<?php if ($langue == 'es') echo ' selected'; ?>>Español</option>
        </select>
        <input type="submit" value="<?php echo $textes[$langue]['changer']; ?>">
    </form>
<?php elseif ($page == 'accueil'): ?>
    <h1><?php echo $textes[$langue]['bienvenue']; ?></h1>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>?reset=1"><?php echo $textes[$langue]['reset']; ?></a>
<?php endif; ?>

</body>
</html>
