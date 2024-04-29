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
              <a href="profil.php" class="link">
              <img src="../PROJETWEB/img/utilisateur.png" alt="Save Offres" class="icon">
              <p class="picon">Profil</p>
              </a>
          </li>
          <li class="navitem">
                    <a href="Mesoffre.php" class="link">
                    <p class="picon">Mes Offre</p>
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
          <div class="labelinput1">
            <label for="nom" class="nom">Nom</label>
            <input type="text" id="nom" value="<?php echo $utilisateur['nom']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="prenom" class="prenom">Prénom</label>
            <input type="text" id="prenom" value="<?php echo $utilisateur['prenom']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="email" class="email">Email</label>
            <input type="text" id="email" value="<?php echo $utilisateur['email']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="tel" class="tel">Numéro de téléphone</label>
            <input type="text" id="tel" value="<?php echo $utilisateur['tel']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="dateNaissance" class="dateNaissance">Date de naissance</label>
            <input type="text" id="dateNaissance" value="<?php echo $utilisateur['datenaiss']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="genre" class="genre">Genre</label>
            <input type="text" id="genre" value="<?php echo $utilisateur['genre']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="role" class="role">Rôle</label>
            <input type="text" id="role" value="<?php echo $utilisateur['role']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="eduLevel" class="eduLevel">Niveau</label>
            <input type="text" id="eduLevel" value="<?php echo $utilisateur['niveau']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="etablissement" class="etablissement">etablisement</label>
            <input type="text" id="etablissement" value="<?php echo $utilisateur['etablisement']; ?>" class="inputinscrit1" readonly>
          </div>
          <div class="labelinput1">
            <label for="description" class="description">Description</label>
            <textarea id="description" class="inputinscrit1" readonly><?php echo $utilisateur['description']; ?></textarea>
          </div>
            
          </div>
          <button type="button" class="bottom1" onclick="window.location.href='modifierProfil.php'">Modifier</button>
          
        </form> 
      </div>
    </div> 
  </div>
</body>
</html>
