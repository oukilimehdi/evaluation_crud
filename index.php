<?php

require_once 'connexion.php';

$connexion = db_connexion();
// on verifie les données recuperées avec $_post:

$message = "";


 if (isset($_POST['enregistrer'])) {

        $pseudo = htmlspecialchars((trim($_POST['pseudo'])));
        $mdp = htmlspecialchars((trim($_POST['mdp'])));
        $mdp2 = htmlspecialchars((trim($_POST['mdp2'])));
        $cgu = $_POST['checkbox'];


    if(empty($pseudo)){

       $message = "veuillez entrer un pseudo";
    } 

    if(empty($mdp) or empty($mdp2)){
      $message = "veuillez entrer un mot de passe";
     
    }
    if(($mdp != $mdp2)){
        $message =  "veuillez entrer deux mots de passes identique";
    }

    if(!isset($cgu)){

        $message = "veuillez cocher les cgu";
        
    }
    
    //On traite la requete : INSERT
    if(!empty($pseudo) && !empty($mdp) && isset($_POST['checkbox']) && ($mdp === $mdp2)){

        $requete = "INSERT into users(pseudo, mdp) VALUES (?, ?)";
        header("location:pageconnexion.php");
        try {
            $requetePreparee = $connexion->prepare($requete);
            $requetePreparee->execute([$pseudo, $mdp]);
        } catch (Exception $exception) {
            $exception->getMessage();
        }
         
    }

    }    
  
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud-php-ajax-mysql</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>

    <nav style="height: 60px; background-color:#468566 " class="navbar navbar-light justify-content-between">
        <a class="navbar-brand"><i style="font-size:40px" class="fas fa-american-sign-language-interpreting"></i> </a>
        <form class="form-inline">
            <a style="color:white" class="mx-5" href="pageConnexion.php">LOGIN</a>
            <a style="color:white" href="">REGISTER</a>
        </form>
    </nav>

    <div style="margin-top:50px" class="container ">

        <div class="row">
            <div class="col-md-6" id="image" class="img-fluid"></div>

            <div class="col-md-4 my-auto">
                <h3>creer un compte</h3>
                <form id="formcreer" method="post">
                     <?php if($message){ ?>
                        <p style="color:red"> <?php echo $message ?> 
                    <?php } ?> 
                    
                    <input type="text" class="form-control" id="pseudo" placeholder="votre pseudo" name="pseudo">
                    <input type="text" class="form-control" id="mdp" placeholder="votre mot de passe" name="mdp">
                    <input type="text" class="form-control" id="mdp2" placeholder="repetez le mot de passe" name="mdp2">
                    <p><input type="checkbox" id="checkbox" name="checkbox"> j'accepte les termes d'utilisations.</p>

                    <button id="enregistrer" name="enregistrer" type="submit" class="btn btn-info col-md-12">s'enregistrer</button>
                    <a href="pageConnexion.php"> vous avez deja un compte? connectez-vous ici </a>
                </form>
               
            </div>
        </div>
    </div>
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous" defer></script>
    <script src="script.js"></script>
</body>

</html>