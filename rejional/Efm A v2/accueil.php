<?php
    $def ='clair';
    if(isset($_COOKIE['theme'])){
        $theme = $_COOKIE['theme'];
    }
    else{
        $theme = $def ;
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
            if($theme == 'clair'){
                echo 'body{ background-color : white ; color: black;}';

            }elseif($theme == 'sombre'){
                echo 'body{ background-color : pink ; color: black ;}';
            }elseif($theme == 'colore'){
                echo 'body { background-color: #FFDDC1; color: #FF5733; }' ;
            }
        ?>
    </style>
</head>
<body>
    <h1>Bienvenue sur notre site</h1>
    <p>Votre thème actuel est : <?php echo htmlspecialchars($theme); ?></p>
    <a href="index.php">Changer de thème</a><br>
    <a href="reset_theme.php">Réinitialiser le thème</a>

</body>
</html>