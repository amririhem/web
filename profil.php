<?php
session_start();
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
    $user_id = $_SESSION['id_user'];
    $serveur = "localhost"; 
    $utilisateur = "root"; 
    $mot_de_passe = ""; 
    $base_de_donnees = "etudjobweb"; 

    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
    $query = "SELECT * FROM user WHERE id_user = $user_id";
    $resultat = mysqli_query($connexion, $query);
    if ($resultat) {
        $utilisateur = mysqli_fetch_assoc($resultat);
    } else {
          echo("erreur de connection");
    }
    mysqli_close($connexion);
} else {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil</title>
  <link rel="stylesheet" href="profil.css">
</head>
<body>
  <div class="background">
    <div class="navbar"> 
      <header class="header">
          <img src="../PROJETWEB/img/etud.png" alt="" class="logo">
          <ul class="navlist">
          <li class="navitem">
              <a href="etudiant.html" class="link">
              <img src="../PROJETWEB/img/maison.png" alt="Acceuil" class="icon">
              <p class="picon">Acceuil</p>
              </a>
          </li>
          <li class="navitem">
              <a href="profil.html" class="link">
              <img src="../PROJETWEB/img/utilisateur.png" alt="Save Offres" class="icon">
              <p class="picon">Profil</p>
              </a>
          </li>
          <li class="navitem">
              <a href="Acceuil.html" class="link">
              <img src="../PROJETWEB/img/bloquer.png" alt="Log Out" class="icon">
              <p class="picon">Deconnexion</p>
              </a>
          </li>
          </ul>
      </header>
  </div>
    <div class="loginbody">
      <div class="tabcontent">
        <form class="mef">
          <p class="p1inscrit">Votre profil</p>
          <div class="labelinput1">
            <label for="user_name" class="nom">Nom</label>
            <input type="text" id="user_name" value="<?php echo $utilisateur['nom']; ?>"  class="inputinscrit1" readonly>
            <p for="prenom" class="prenom">Prénom</p>
            <input type="text" id="prenom" value="<?php echo $utilisateur['prenom']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput">
            <label for="email">Email</label>
            <input type="email" id="user_email"  value="<?php echo $utilisateur['email']; ?>" class="inputinscrit" readonly>
            <label for="tel">Numéro de tél</label>
            <input type="text" id="tel" value="<?php echo $utilisateur['tel']; ?>"  class="inputinscrit" readonly>
          </div>
          <div class="labelinput">
            <label for="dateNaissance" class="labele">Date de Naissance</label>
            <input type="text" id="dateNaissance"   value="<?php echo $utilisateur['datenaiss']; ?>" class="inputinscrit" readonly>
          </div>
          <p class="pgenre">Genre</p>
          <div class="labelinput4">
            <div class="radioWrapper">
              <input class="inputinscrit4" type="radio" name="genre" value="male" checked> 
              <label class="lab4"> Homme </label>
            </div>
            <div class="radioWrapper"> 
              <input class="inputinscrit4" type="radio" name="genre" value="female"> 
              <label class="lab4"> Femme</label> 
            </div>
          </div>
          <div class="labelinput5">
            <label for="eduLevel">Niveau</label>
            <input type="text" id="eduLevel" value="<?php echo $utilisateur['niveau']; ?>" readonly class="inputinscrit5">
            <p for="etablissement" class="petab">Établissement</p>
            <input type="text" id="etablissement"  value="<?php echo $utilisateur['etablisement']; ?>"  readonly class="inputinscrit5">
          </div>
          <div class="inputinscrit6">
            <label for="Description" class="labeled">Description</label>
            <textarea type="text" id="Description"  value="<?php echo $utilisateur['descrip']; ?>"class="inputinscrit6text" readonly> Description text here </textarea>                        
          </div>
          <button type="button" class="bottom1" onclick="window.location.href='modifierProfil.php' >Modifier</button>
        </form> 
      </div>
    </div> 
  </div>
</body>
</html>
