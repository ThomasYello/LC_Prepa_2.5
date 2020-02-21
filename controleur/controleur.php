<?php

require_once("./modele/modele.php");

class Employes extends DB {

  function getSelect(){

    $strSQL = "SELECT * FROM utilisateur ";
    $tabValeur = array("*");
    $sel = $this->Requete($strSQL, $tabValeur);
    return $sel;
  }

  function setDelete($id){

    $strSQL = "DELETE FROM utilisateur WHERE num = ?";
    $tabValeur = array($id);
    $del = $this->Requete($strSQL, $tabValeur);
    return $del;
  }

  function setAdd($tblemp){
    
    $strSQL = "INSERT INTO utilisateur (nom, prenom, login, date_nais, tel, email, mdp) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $tabValeur = array(
      $tblemp['nom'],
      $tblemp['prenom'],
      $tblemp['login'],
      $tblemp['date'],
      $tblemp['tel'],
      $tblemp['mail'],
      sha1($tblemp['mdp'])
    );
    $ins = $this->Requete($strSQL, $tabValeur);
    return $ins;
}

  function setUpdate($tblemp){

    $strSQL = "UPDATE utilisateur SET prenom = :pnom, nom = :nom, date_nais = :date, tel = :tel WHERE login = :id;";

    $tabValeur = array(
      'pnom'  => $tblemp['prenom'], 
      'nom'   => $tblemp['nom'], 
      'id' => $tblemp['id'],
      'date' => $tblemp['date'],
      'tel' => $tblemp['tel']
    );
   
    $update = $this->Requete($strSQL, $tabValeur);
   
    return $update;
  }

  function setUpdateuti($tblemp){

    $strSQL = "UPDATE utilisateur SET prenom = :pnom, nom = :nom, date_nais = :date, email = :mail, tel = :tel WHERE num = :ide;";

    $tabValeur = array(
      'pnom'  => $tblemp['prenom'], 
      'nom'   => $tblemp['nom'], 
      'date'   => $tblemp['date'],
      'mail'   => $tblemp['mail'],
      'tel'   => $tblemp['tel'],
      'ide'   => $tblemp['ide']
    );
   
    $upd = $this->Requete($strSQL, $tabValeur);
    
    return $upd;
  }

   
}

class Pagination extends DB {
 
  private $requete;            // valeur liée à une fonction
  private $value_bind_func;    // valeur liée à une fonction
  private $page;
  private $limite;
  private $nombreLignes;
  private $nombreElementsTotal;
  private $nombreDePages;
  private $debut;

  function compteLignes() {

    $strSQL = "SELECT SQL_CALC_FOUND_ROWS * FROM tbl_employe ORDER BY emp_nom  LIMIT :limite OFFSET :debut";
    $strSQL->bindValue('limite',$limite,PDO::PARAM_INT);
    $strSQL->bindValue('debut',$debut,PDO::PARAM_INT);
    $tabValeur = array("*");
    ;
    return $this->Requete($strSQL, $tabValeur);
  }

}

Class Produit extends DB {

  function Search($tblprod){
    $limite = 4;

    $SQL="SELECT count('num_prod') FROM `produit`";
    $tab = array("*");

    $Nb = $this->Requete($SQL, $tab);
    
    $Nbprod = $Nb[0];
    
    $Nbtotalpage = ceil($Nbprod[0]/$limite);
    if(isset($_REQUEST['page']) AND !empty($_REQUEST['page']) AND $_REQUEST['page'] > 0 AND $_REQUEST['page'] <= $Nbprod) {

      $_REQUEST['page'] = intval($_REQUEST['page']);
      $pageCourante = $_REQUEST['page'];
    
    } else {
    
      $pageCourante = 1;
    }
   
    
    $strSQL = "SELECT * FROM produit 
                WHERE nom_prod LIKE  :nom 
                OR type     LIKE  :nom
              ";

    empty($tblprod['nom_prod'])  ? $tblprod['nom_prod'] = '*' : $tblprod['nom_prod']; 
   

    $tabValeur = array(
          'nom'  => "%".$tblprod['nom_prod']."%"
        );

    $sch = $this->Requete($strSQL, $tabValeur);
    
    return array($sch, $pageCourante, $Nbtotalpage);
    }
  
  function getArticle() {
    $strSQL="SELECT * FROM `produit` ORDER BY rand() limit 0,4 ";
    $tabValeur = array("*");
    return $this->Requete($strSQL,$tabValeur);
  }

  function getArticles() {
    
    $limite = 6;

    $SQL="SELECT count('num_prod') FROM `produit`";
    $tab = array("*");

    $Nb = $this->Requete($SQL, $tab);
    
    $Nbprod = $Nb[0];
    
    $Nbtotalpage = ceil($Nbprod[0]/$limite);
    if(isset($_REQUEST['page']) AND !empty($_REQUEST['page']) AND $_REQUEST['page'] > 0 AND $_REQUEST['page'] <= $Nbprod) {

      $_REQUEST['page'] = intval($_REQUEST['page']);
      $pageCourante = $_REQUEST['page'];
    
    } else {
    
      $pageCourante = 1;
    }
 
 $depart = ($pageCourante-1)*$limite;

    $strSQL="SELECT * FROM `produit`  limit ".$depart.",".$limite;
    $tabValeur = array("*");
    
    $valeur = $this->Requete($strSQL,$tabValeur);

    return array($valeur,$pageCourante,$Nbtotalpage);
  
  }

  
  function prodpanier($idprod){

    $strSQL="SELECT * FROM `produit` where num_prod = ".$idprod['num_prod'];
    $tabValeur = array("*");
    
    
    $prodResultat = $this->Requete($strSQL, $tabValeur);
    
        if(!empty($prodResultat)) {
            $_SESSION["prod"] = array();
            $_SESSION["prod"] = $prodResultat;
            
          var_dump($_SESSION["prod"]);
          exit;

            return true;
        }
    
  
  }


  function panier($prod){
    $strSQL="SELECT * FROM `produit` where num_prod = ".$prod['num_prod'];
    $tabValeur = array("*"
    );
    
    
    $prodResultat = $this->Requete($strSQL, $tabValeur);

    

      $itemArray = array($prodResultat[0]["num_prod"]=>array('nom'=>$prodResultat[0]["nom_prod"], 'type'=>$prodResultat[0]["type"], 'qte'=>$prod["qte"], 'prix'=>$prodResultat[0]["prix_prod"], 'img'=>$prodResultat[0]["img_prod"], 'idprod'=>$prodResultat[0]["idprod"]));
         
          if(!empty($_SESSION["panierprod"])) {
            if(in_array($prodResultat[0]["num_prod"],array_keys($_SESSION["panierprod"]))) {
              foreach($_SESSION["panierprod"] as $k => $v) {
                  if($prodResultat[0]["num_prod"] == $k) {
                    if(empty($_SESSION["panierprod"][$k]["qte"])) {
                      $_SESSION["panierprod"][$k]["qte"] = 0;
                    }
                    $_SESSION["panierprod"][$k]["qte"] += $_POST["qte"];
                  }
              }
            } else {
              $_SESSION["panierprod"] = array_merge($_SESSION["panierprod"],$itemArray);
            }
          } else {
            $_SESSION["panierprod"] = $itemArray;
          }
         
            return $_SESSION["panierprod"];
        
    
  
  }


  function setProd($tblprod){
    
    $strSQL = "INSERT INTO produit (nom_prod, type, prix_prod, desc_prod, img_prod) VALUES (?, ?,?, ?, ?)";
    $tabValeur = array(
      $tblprod['nom_prod'],
      $tblprod['type'],
      $tblprod['prix'],
      $tblprod['desc'],
      "<img src='./img/".$tblprod['img']."' width='150px'>"
    );
    $ins = $this->Requete($strSQL, $tabValeur);
    return $ins;
}

}

   

class Forum extends DB{

  function Commentaire($tblcomment){

    $strSQL = "INSERT INTO forum (pseudo, sujet, comment) VALUES (?, ?,?)";
    $tabValeur = array(
      $_SESSION['user'][0][3],
      $tblcomment['sujet'],
      $tblcomment['com']
    );
    $ins = $this->Requete($strSQL, $tabValeur);
    return $ins;

  }

  function getcomments(){

    $strSQL = "SELECT * FROM forum ";
    $tabValeur = array("*");
    $forum = $this->Requete($strSQL, $tabValeur);
    return $forum;
  }

  function setSup($id){

    $strSQL = "DELETE FROM forum WHERE num = ?";
    $tabValeur = array($id);
    $sup = $this->Requete($strSQL, $tabValeur);
    return $sup;
  }


}



?>