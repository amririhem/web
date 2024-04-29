<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Offres</title>
    <link rel="stylesheet" href="Mesoffre.css">
</head>
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
  <br><br><br><br>
  <h2>Mes offre</h2>
  <br>
  <a href='ajouteroffre.html'><button>Ajouter Offre</button></a>
<body>
    <?php
    session_start(); 
    $serveur = "localhost"; 
    $utilisateur = "root"; 
    $mot_de_passe = ""; 
    $base_de_donnees = "etudjobweb"; 

    $connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);
    if (!$connexion) {
        die("La connexion à la base de données a échoué : " . mysqli_connect_error());
    }
    
    $id_utilisateur = $_SESSION['id_user'];

    $requete = "SELECT * FROM offre WHERE id_user = $id_utilisateur";
    $resultat = mysqli_query($connexion, $requete);

    $html_offres = "";
    if (mysqli_num_rows($resultat) > 0) {
        while ($row = mysqli_fetch_assoc($resultat)) {
            $html_offres .= "<div class='offre'>";
            $html_offres .= "<div class='part'>";
            $html_offres .= "<h3 class='titreOffre'>" . $row['titre'] . "</h3>";
            $html_offres .= "<div class='iconplusp'>";
            $html_offres .= "<img src='../PROJETWEB/home/description.png' alt='' class='iconi' />";
            $html_offres .= "<p class='desc'>" . $row['description'] . "</p>";
            $html_offres .= "</div>";
            $html_offres .= "<div class='iconplusp'>";
            $html_offres .= "<img src='../PROJETWEB/home/localisation.png' alt='' class='iconi' />";
            $html_offres .= "<p class='lieu'><strong>Lieu de l'offre:</strong> " . $row['lieu'] . "</p>";
            $html_offres .= "</div>";
            $html_offres .= "<div class='iconplusp'>";
            $html_offres .= "<img src='../PROJETWEB/home/fixe.png' alt='' class='iconi' />";
            $html_offres .= "<p class='lieu'><strong>Tel:</strong> " . $row['tel'] . "</p>";
            $html_offres .= "</div>";
            $html_offres .= "<div class='iconplusp'>";
            $html_offres .= "<img src='../PROJETWEB/home/email.png' alt='' class='iconi' />";
            $html_offres .= "<p class='lieu'><strong>Email:</strong> " . $row['email'] . "</p>";
            $html_offres .= "</div>";
            $html_offres .= "<form action='DeletOffre.php' method='post'>";
            $html_offres .= "<input type='hidden' name='id_offre' value='" . $row['id_offre'] . "'>";
            $html_offres .= "<input type='submit' value='Supprimer'>";
            $html_offres .= "</form>";
            $html_offres .= "</div>";
            $html_offres .= "<div class='imageCat'>";
            $html_offres .= "</div>";
            $html_offres .= "</div>";
        }
    } else {
        $html_offres = "Aucune offre disponible pour le moment.";
    }

    echo $html_offres;

    mysqli_close($connexion);
    ?>
</body>
</html>
