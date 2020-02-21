<?php

if (!empty($_SESSION['userId']) ) {
  
  $afficherNom = $_SESSION['userId'][0][3];
  $deco = "<li><a href='index.php?action=Deco'> Déconnexion </a></li>";
} else if (!empty($_SESSION['user'])) {

  $afficherNom = $_SESSION['user'][0][1];
  $deco = "<li><a href='index.php?action=Deco'> Déconnexion </a></li>";

}


?>
  <header>
    <div id="logo"><img src="./img/logo.png" alt="Logo"></div>
    

    <div class="caddie"><a href="index.php?action=panier"><img src='./img/cart.png' width='50px'></div></a>
      <!-- ------------------------------------------- Menu ---------------------------------------- -->
    <nav>  
        <ul>
            <li ><a href="index.php?action=Accueil"> Accueil</a></li><li><a href="index.php?action=Prods&page"> Produits </a></li><li><a href="index.php?action=forum"> Forum</a></li><li><a href="index.php?action=Ajouter"> Inscription</a></li>
            
                <?php
                  if (!empty($afficherNom) && !empty($deco)){
                    echo "<li class='deroulant'> <a>Connecté, ".$afficherNom."</a> 
                            <ul class='sous'>";
                            if ($afficherNom === 'Administrateur'){

                            echo "<li><a href='index.php?action=formLog'> Administrateur</a></li>";

                            }else {

                            echo "<li><a href='index.php?action=profil'> Profil </a></li>";
                            
                            }
                            echo $deco;
                      
                      echo "</ul></li>";
                      
                  }else{

                    echo "<li><a href='index.php?action=formLog'> Connexion</a></li>";
                  }
                ?>
         
        </ul> 
    </nav>
  </header>
  


  