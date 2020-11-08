<?php

require_once 'connexion.php';

$connexion = db_connexion();

//On traite la requete : INSERT
$message = "";

 if ((isset($_POST['enregistrer']))) {

        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));
        $mdp2 = htmlspecialchars(trim($_POST['mdp2']));


    if(empty($pseudo)){
       $message = "veuillez entrer un pseudo";
    }

    if(empty($mdp) or empty($mdp2)){
      $message = "veuillez entrer un mot de passe";
       
    }
    if(($mdp != $mdp2)){
        $message =  "veuillez entrer deux mots de passes identique";
    }
    
    if(!empty($pseudo) && !empty($mdp) && ($mdp === $mdp2)){

        $requete = "INSERT into users(pseudo, mdp) VALUES (?, ?)";
        header("location:pageconnexion.php");
        try {
            $requetePreparee = $connexion->prepare($requete);
            $requetePreparee->execute([$pseudo, $mdp]);
        } catch (Exception $exception) {
            $exception->getMessage();
        }
  
    }else{
        
        header("location:index.php");
    }

    }    
   

 ?>