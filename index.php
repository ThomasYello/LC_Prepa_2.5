<?php 
  // Cela signifie que vous ne souhaitez pas voir le résultat de votre script mis une fois pour toutes en cache, 
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  
  try {

      if (isset($_REQUEST['action']) || !empty($_REQUEST['action'])) 
      {
        include "./vue/vueHeader.php";

        include "./vue/vueMenu.php";
        require "./controleur/controleur.php";
        $employe = new Employes();
        $prod = new Produit();
        $comment = new Forum();
        

        if ($_REQUEST['action'] == 'Supprimer') {
          
          $employe->setdelete(intval($_POST['ide']));
         
        } 

        if ($_REQUEST['action'] == 'Ajouter') {
          
          include "./vue/vueInscription.php";
         
        } 
         if ($_REQUEST['action'] == 'Inscrire') {
          
          $employe->setAdd($_POST);
         
        } 

        if ($_REQUEST['action'] == 'Modifier') {
          $_POST['ide']=intval($_POST['ide']);
          $employe->setUpdate($_POST);
        } 

        if ($_REQUEST['action'] == 'Rechercher') {
          $tblprod = $prod->Search($_POST);
          include "./vue/vueArticles.php";
        }

        //if($_REQUEST['action'] == 'Prods'){
          //$tblprod = $prod->getArticles();
          //include "./vue/vueArticles.php";
        //}

        if($_REQUEST['action'] == '+'){
          session_start();
          
        $tblprod = $prod->prodpanier($_POST);
          include "vue/vuePanier.php";
        }

        if ($_REQUEST['action'] == 'Inserer'){
          $prod->setProd($_POST);
        }

        if ($_GET['action'] == 'Admin') {
          
          session_start();

        if (!empty($_SESSION['userId'])) {

          $employe = new Employes();
          $tblEmp = $employe->getSelect();
          
          include "./vue/vueDashboard.php"; 
          
          }else {

            include "./vue/vueLogin.php";         

          }
        

        
      }

      if ($_GET['action'] == 'comment'){
        session_start();
    if (!empty($_SESSION["userId"])) {

        require_once "./controleur/membre.php";
        require_once "./controleur/controleur.php";
        $comment = new Forum();
        $membre = new Membre();
        $membreResultat = $membre->getMemberById($_SESSION["userId"]);
       
        if(!empty($membreResultat[0]["login"])) {
            $afficherNom = ucwords($membreResultat[0]["login"]);
            $tblcomment = $comment->Commentaire($_POST);
            $tblcomment = $comment->getcomments();
          include "./vue/vueForum.php";
        }

        
       
    }else{
      
      echo "
      <center>
      <article class='table_annuaire'> 
      <h3>Vous devez vous connecter pour voir le forum</h3> 
      </article>
      </center>";
      }
    }

 if ($_GET['action'] == 'Prods'){
        session_start();
        $tblprod = $prod->getArticles();
    if (!empty($_SESSION["userId"])) {

        require_once "./controleur/membre.php";
        //require_once "./controleur/controleur.php";
        
        $membre = new Membre();
        $membreResultat = $membre->getMemberById($_SESSION["userId"]);
       
        if(!empty($membreResultat[0]["login"])) {
            $afficherNom = ucwords($membreResultat[0]["login"]);
            
          include "./vue/vueArticles.php";
        }

        
       
    }else{
      
      echo "
      <section>
      <center>
      <article class='table_annuaire'> 
      <h3>Vous devez vous connecter pour voir le Panier</h3> 
      </article>
      </center></section>";

      }
    }

    if ($_REQUEST['action'] == 'Suppr') {
      $supcomment = new Forum();
      $supcomment->setSup(intval($_POST['num']));
      require_once "./vue/vueDashboard.php";
    }



      if ($_GET['action'] == 'Util') {
          include "./vue/vueLogin.php";
        }

        if ($_GET['action'] == 'forum'){
          session_start();
      if (!empty($_SESSION["userId"])) {

          require_once "./controleur/membre.php";
          require_once "./controleur/controleur.php";
          $comment = new Forum();
          $membre = new Membre();
          $membreResultat = $membre->getMemberById($_SESSION["userId"]);
         
          if(!empty($membreResultat[0]["login"])) {
              $afficherNom = ucwords($membreResultat[0]["login"]);
              $tblcomment = $comment->getcomments();
            include "./vue/vueForum.php";
          }

          
         
      }else{
        
        echo "
        <center>
        <article class='table_annuaire'> 
        <h3>Vous devez vous connecter pour voir le forum <br> Cliquez ici pour vous <a href='index.php?action=Admin'>connecter</a></h3>
        </article>
        </center>";
        }
      }


        if ($_GET['action'] == 'Login') {
          session_start();
          $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
          $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
         
          require_once "controleur/membre.php";
          require_once  "controleur/controleur.php";
          $membre = new Membre();
         
          $tblcomment = $comment->getcomments();
          $tblEmp = $employe->getSelect();
          
          $isLoggedIn = $membre->verifLogin($username, $password);


          if (! $isLoggedIn) {
              $_SESSION["erreurMessage"] = "Les informations d'identification sont invalides !";
              include "vue/vueLogin.php";
              exit();
          }else{
       
          include "vue/vueDashboard.php";
          exit();
          }
        }
        if ($_GET['action'] == 'Accueil') {
         // $tblprod = $prod->getArticle();
          include "./vue/vue.php";
        } 
        
        if ( $_GET['action'] == 'Deco') {

        session_start();

        session_destroy();

        $tblprod = $prod->getArticle();
        include "./vue/vue.php";

       }

       include "./vue/vueFooter.php";
       
      }else {

        include "./vue/vueHeader.php";
       
        include "./vue/vueMenu.php";
        require "./controleur/controleur.php";
        $employes = new Employes();
        $prod = new Produit();
        $tblprod = $prod->getArticle();
        $tblEmp = $employes->getSelect();
        include "./vue/vue.php";
        include "./vue/vueFooter.php";
      }

      
    }catch (Exception $e) {
      erreur($e->getMessage());
  }  
  
?>
