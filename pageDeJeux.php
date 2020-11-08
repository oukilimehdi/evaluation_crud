<?php
session_start();


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud-php-ajax-mysql</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>
<body>


<nav style="height: 60px; background-color:#468566 " class="navbar navbar-light justify-content-between">
  <a class="navbar-brand"><i style="font-size:40px" class="fas fa-american-sign-language-interpreting"></i> </a>
  <form class="form-inline">
    <a style="color:white" class="mx-5" href="deconnexion.php">LOGout</a>
     
  </form>
</nav>
  <div style="margin-top:60px">
       <?php if(isset($_SESSION['pseudoconnexion'])) {?> 
       <p> bonjour <?= $_SESSION['pseudoconnexion'] ?> </p>
      <?php }?>
      <div style="background-color:#468566;height:70px;" >
        <p style="color:white; text-align:center; padding-top: 10px; font-size:30px"> PAGE DE JEUX </p> 
      </div>
  </div>
  <div class="container, text-center" style="margin-top:60px">
      <h2 style="color: #0BA7F5">Voici votre défi du jour</h2>
      <form class="form-inline">
        <div class="form-group mx-md-1 mb-2 ">
            <input type="password" class="form-control" id="inputPassword2" placeholder="inscrire votre reponse ici">
        </div>
        <button style="background-color:#468566 ;" type="submit" name="valider" class="btn mb-2">valider</button>
       </form>
  </div> 
  <div class="container">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">MULTIPLICATION</th>
            <th scope="col">REPONSE</th>
            <th scope="col">CORRECT ?</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td></td>
            <td></td>
            <td>false</td>
          </tr> 
        </tbody>
      </table>
   </div>   







<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous" defer></script>
<script src="script.js"></script>
</body>
</html>