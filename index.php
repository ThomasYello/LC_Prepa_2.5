<?php 
  // Cela signifie que vous ne souhaitez pas voir le résultat de votre script mis une fois pour toutes en cache, 
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  
  try {

      if (isset($_REQUEST['action']) || !empty($_REQUEST['action'])) 
      {
        session_start();
        require "./vue/vueHeader.php";
        require "./controleur/controleur.php";
        require "./vue/vueMenu.php";
        $employe = new Employes();
        $prod = new Produit();
        $comment = new Forum();
        


       

        if ($_REQUEST['action'] == 'Supprimer') {
          
          $employe->setdelete(intval($_POST['ide']));
         
        } 
        
        if ($_REQUEST['action'] == 'deletep') {
        if(!empty($_SESSION["panierprod"])) {

              foreach($_SESSION["panierprod"] as $k => $v) {

                if($_REQUEST["idprod"] == $k)

                  unset($_SESSION["panierprod"][$k]);	
           		
                if(empty($_SESSION["panierprod"]))
                  unset($_SESSION["panierprod"]);
            }


            }


            include './vue/vuePanier.php';
          
          
        
      }
        if ($_REQUEST['action'] == 'Ajouter') {
          
          include "./vue/vueInscription.php";
         
        } 
         if ($_REQUEST['action'] == 'Inscrire') {
          
          $employe->setAdd($_POST);
         
        } 

        if ($_REQUEST['action'] == 'Modifier') {
          if (!empty($_SESSION['user'])){
          $employe->setUpdate($_POST);

          $_SESSION['user'][0][1] = $_POST['nom'];
          $_SESSION['user'][0][2] = $_POST['prenom'];
          $_SESSION['user'][0][3] = $_POST['id'];
          $_SESSION['user'][0][4] = $_POST['date'];
          $_SESSION['user'][0][5] = $_POST['tel'];
          }

          include "./vue/vueProfil.php";
        } 

        if ($_REQUEST['action'] == 'Rechercher') {
          $recherche = 1;

          $tblprod = $prod->Search($_POST);
          include "./vue/vueArticles.php";
        }

        //if($_REQUEST['action'] == 'Prods'){
          //$tblprod = $prod->getArticles();
          //include "./vue/vueArticles.php";
        //}

        if($_REQUEST['action'] == 'Ajouter au panier'){
          
          
        $tblpanier = $prod->panier($_POST);
        
          include "vue/vuePanier.php";
        }


        if ($_REQUEST['action'] == 'Inserer'){
          $prod->setProd($_POST);
        }

        if ($_GET['action'] == 'panier') {
          
          include "./vue/vuePanier.php";
        }


        if ($_GET['action'] == 'formLog') {
          
          

        if (!empty($_SESSION['userId'])) {

          $tblEmp = $employe->getSelect();
          
          include "./vue/vueDashboard.php"; 
          
          }
          else {

            include "./vue/vueLogin.php";         

          }

      }

      if ($_GET['action'] == 'comment'){
       
          if (!empty($_SESSION["userId"]) || !empty($_SESSION["user"])) {

        require_once "./controleur/membre.php";
        require_once "./controleur/controleur.php";
        $comment = new Forum();
        $membre = new Membre();
            $tblcomment = $comment->Commentaire($_POST);
            $tblcomment = $comment->getcomments();
          include "./vue/vueForum.php";
        }
        else{
      
      include 'vue/erreurLogin.php'; 


      }

    }


  if ($_GET['action'] == 'profil'){
    if (!empty($_SESSION['user'])){

      include "./vue/vueProfil.php";

    }
  }

  if ($_GET['action'] == 'profilm'){
    if (!empty($_SESSION["userId"])){

      include "./vue/vueProfilm.php";

    }
  }
 if ($_GET['action'] == 'Prods' || $_GET['action'] == 'page'){
      $recherche = null;
       

        $tblprod = $prod->getArticles();

    if (!empty($_SESSION["userId"]) || !empty($_SESSION["user"])) {

          include "./vue/vueArticles.php";
        
       
    }else{
      
      include 'vue/erreurLogin.php'; 

      }
    }

    if ($_REQUEST['action'] == 'Suppr') {
      $supcomment = new Forum();
      $supcomment->setSup(intval($_POST['num']));
      require_once "./vue/vueDashboard.php";
    }



        if ($_GET['action'] == 'forum'){
     
      if (!empty($_SESSION["userId"]) || !empty($_SESSION["user"])) {

            $tblcomment = $comment->getcomments();
            include "./vue/vueForum.php";
          
          
         
      }else{
        
        include 'vue/erreurLogin.php'; 

        }
      }

        if ($_GET['action'] == 'modifProfil'){

          if(!empty($_SESSION['user'])){

            include "./vue/vueProfilm.php";
            
          }
        }

        if ($_GET['action'] == 'Login') {
    
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
              
          
          }else{
  
            header ("Location: index.php?action=Accueil");
          }

        }


        if ($_GET['action'] == 'Se connecter') {
    
          $username = filter_var($_POST["login"], FILTER_SANITIZE_STRING);
          $password = filter_var($_POST["mdp"], FILTER_SANITIZE_STRING);
         
          require_once "controleur/membre.php";
          require_once  "controleur/controleur.php";
          $membre = new Membre();

          $isLoggedInUser = $membre->verifUser($username, $password);


          
          if (! $isLoggedInUser) {
              $_SESSION["erreurMessages"] = "Les informations d'identification sont invalides !";
              include "vue/vueLogin.php";
          
          }else{
  
            header ("Location: index.php?action=Accueil");

          }

        }
          
        
        if ($_GET['action'] == 'Accueil') {
         // $tblprod = $prod->getArticle();
          include "./vue/vue.php";
        } 
        
        if ( $_GET['action'] == 'Deco') {

        session_destroy();

        $tblprod = $prod->getArticle();
        
        header("Location: index.php?action=Accueil");

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
