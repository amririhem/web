<?php
session_start();

// Vérifiez si l'ID de l'utilisateur est présent dans la session
if (isset($_SESSION['id_user']) && !empty($_SESSION['id_user'])) {
    // L'ID de l'utilisateur est présent dans la session
    // Vous pouvez continuer à utiliser cet ID pour récupérer les informations de l'utilisateur
    $user_id = $_SESSION['id_user'];
    
    // Connectez-vous à la base de données ou effectuez d'autres opérations nécessaires
    $serveur = "localhost"; 
    $utilisateur = "root"; 
    $mot_de_passe = ""; 
    $base_de_donnees = "etudjobweb"; 

    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

    // Vérifiez la connexion à la base de données
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }

    // Requête SQL pour récupérer les informations de l'utilisateur à partir de son ID
    $query = "SELECT * FROM user WHERE id_user = $user_id";
    $resultat = mysqli_query($connexion, $query);

    // Vérifiez si la requête a réussi
    if ($resultat) {
        // Récupérez les données de l'utilisateur
        $utilisateur = mysqli_fetch_assoc($resultat);
    } else {
        // Gérez les erreurs de requête SQL
    }

    // Fermez la connexion à la base de données
    mysqli_close($connexion);
} else {
    // L'ID de l'utilisateur n'est pas présent dans la session
    // Redirigez l'utilisateur vers la page de connexion ou affichez un message d'erreur
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
        <form class="mef" name='f1' action="modifier.php" method="post">
          <p class="p1inscrit">Votre profil</p>
          <div class="labelinput1">
          <div class="labelinput1">
            <label for="nom" class="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php echo $utilisateur['nom']; ?>" class="inputinscrit1"   >
          </div><br>
          <div class="labelinput1">
            <label for="prenom" class="prenom">Prénom</label>
            <input type="text" id="prenom"  name="prenom" value="<?php echo $utilisateur['prenom']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="email" class="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $utilisateur['email']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="tel" class="tel">Numéro de téléphone</label>
            <input type="text" id="tel" name="tel" value="<?php echo $utilisateur['tel']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="dateNaissance" class="dateNaissance">Date de naissance</label>
            <input type="text" id="dateNaissance"  name="dateNaissance" value="<?php echo $utilisateur['datenaiss']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="genre" class="genre">Genre</label>
            <input type="text" id="genre" name="genre" value="<?php echo $utilisateur['genre']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="role" class="role">Rôle</label>
            <input type="text" id="role"  name="role" value="<?php echo $utilisateur['role']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="eduLevel" class="eduLevel">Niveau</label>
            <input type="text" id="eduLevel" name="eduLevel" value="<?php echo $utilisateur['niveau']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="etablissement" class="etablissement">Établissement</label>
            <input type="text" id="etablissement" name="etablissement" value="<?php echo $utilisateur['etablisement']; ?>" class="inputinscrit1"   >
          </div>
          <div class="labelinput1">
            <label for="description" class="description">Description</label>
            <textarea id="description1" name="description1" class="inputinscrit1"   ><?php echo $utilisateur['description']; ?></textarea>
          </div>
          <button type="submit" class="bottom1">Modifier</button>
          </div>
          
        </form> 
      </div>
    </div> 
  </div>
</body>
</html>
