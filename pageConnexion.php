<?php
session_start();


require_once 'connexion.php';

$connexion = db_connexion();



if(isset($_POST['connexion'])){

    $pseudoconnexion = htmlspecialchars((trim($_POST['pseudoconnexion'])));
    $_SESSION['pseudoconnexion']=  $pseudoconnexion ;
    $mdpconnexion = htmlspecialchars((trim($_POST['mdpconnexion'])));
    $cguconnexion = $_POST['checkboxconnexion'];

    if(empty($pseudoconnexion) OR empty($mdpconnexion)){
        $erreur ="veuillez remplir les champs demandés";
        
    }  
        if(!isset($cguconnexion)){
            $erreur ="veuillez accepter les cgu";
        } 
            if(!empty($pseudoconnexion) and !empty($mdpconnexion) and !empty($cguconnexion)){

                $requete = $connexion->prepare('SELECT * FROM users WHERE pseudo = ? and mdp = ?');
                $requete ->execute([$pseudoconnexion, $mdpconnexion]);
                $userexist = $requete->rowCount();
                if($userexist == 1){
                    header("location:pageDeJeux.php");
                }
            }else{
                $erreur= "users non reconnus";
            }     
    }         




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page connexion</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>

<nav style="height: 60px;background-color:#468566 " class="navbar navbar-light justify-content-between">
  <a class="navbar-brand"><i style="font-size:40px" class="fas fa-american-sign-language-interpreting"></i> </a>
  <form class="form-inline">
    <a style="color:white" class="mx-5" href="">LOGIN</a>
    <a style="color:white" href="index.php">REGISTER</a>    
  </form>
</nav>

<div class="container ">

    <div class="card" style="width: 300px; margin: 30px auto;">
        <img src="https://register.wyfegypt.com/images/form-wizard-login.jpg" class="card-img-top" alt="icone">
        <div class="card-body" >
            <p class="card-text"> 
            <form id="formcreer" method="post" action="">
                <?php if(isset($erreur)) { ?>
                    <p style="color: red;"> <?= $erreur ?>
                <?php } ?>    
                    <input  type="text" class="form-control" id="pseudo" placeholder="entrez votre pseudo" name="pseudoconnexion">
                    <input  type="text" class="form-control" id="mdp" placeholder="entrez votre mot de passe" name="mdpconnexion">
                    
                    <p ><input type="checkbox" id="checkbox" name="checkboxconnexion"> j'accepte les termes d'utilisations.</p>

                    <button id="connexion" name="connexion" type="submit" class="btn btn-info col-md-12">connexion</button>
                   <a href="index.php"> <p> vous n'avez pas compte? créez-en un ici </p> </a>             
                </form>                 

            </p>
        </div>
    </div>
    
</div>




<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous" defer></script>
<script src="script.js"></script>
</body>
</html>