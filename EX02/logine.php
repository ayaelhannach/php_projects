
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .contener{
            width: 400px;
            margin: auto;
            /* border: 1px solid; */
            box-shadow: 2px 2px 15px ;
            border-radius: 10px;
            p{
                margin: 10px 20px ;
                font-size: 1.1em;   
                color:red;
            }
            h1{
                text-align: center;
                text-transform: uppercase;
                padding-top: 20px;
                margin: 30px 0 ;
                font-size: 1.4em;
            }
            form{
                padding: 10px;
                font-size: 1.3em;
                span{
                    color: red;
                }
                label{
                    text-transform: uppercase;
                    font-weight: bold;
                    margin: 20px 10px;
                    padding: 10px;
                }
                input[type="text"],[type="password"]{
                    width: 80%;
                    margin: 20px 10px;
                    padding: 10px;
                    outline: none;
                    border: none;
                    border-bottom: 2px solid orangered;
                    font-size: 1.2em;
                }
                input[type="submit"]{
                    background-color: orangered;
                    color: #fff;
                    cursor: pointer;
                    width: 80%;
                    outline: none;
                    border: none;
                    padding: 10px 0;
                    border-radius: 15px;
                    /* margin-bottom: 20px; */
                    margin: 10px 10%;
                    font-size: 1.3em;
                }
            }
        }
    </style>
</head>
<body>
    <?php
    session_start();
    $erour='';
    if (isset($_POST['btn'])){
        $user=$_POST['usr'];
        $pasw=$_POST['pss'];
        $bonusers="hamza@";
        $bonpasword="12345";
        $vistusr="12345";
        $vistpaswrd="hamza@";
        if($bonpasword === $pasw && $bonusers ===$user){
            $_SESSION['autoriser']='oui';
            header('location:ex2.php');
        }
        if($vistpaswrd === $pasw && $vistusr ===$user){
            $_SESSION['autoriser']='oui';
            header('location:listeproduits.php?vis=1');
        }
        else{
            $erour="Mauvais login ou mot de passe !";
        }
    }
    ?>
    <div class="contener">
        <h1>logine your account</h1>
        <p><?=@$erour?></p>
        <form action="" method="POST">
            <label for="">username</label><br>
            <input type="text" name="usr" placeholder="enter your name"><br>
            <label for="">password</label><br>
            <input type="password" name="pss" placeholder="enter your password"><br>
            <input type="submit" name="btn" value="submit">
        </form>
    </div>
</body>
</html>