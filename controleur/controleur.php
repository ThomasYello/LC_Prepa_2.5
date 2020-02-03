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
    
    $strSQL = "INSERT INTO utilisateur (nom, prenom, date_nais, tel, email, mdp) VALUES (?, ?,?, ?, ?, ?)";
    $tabValeur = array(
      $tblemp['nom'],
      $tblemp['prenom'],
      $tblemp['date'],
      $tblemp['tel'],
      $tblemp['mail'],
      sha1($tblemp['mdp'])
    );
    $ins = $this->Requete($strSQL, $tabValeur);
    return $ins;
}

  function setUpdate($tblemp){

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
   
    
    $strSQL = "SELECT * FROM produit 
                WHERE nom_prod LIKE  :nom 
                OR type     LIKE  :type
              ";

    empty($tblprod['nom_prod'])  ? $tblprod['nom_prod'] = '*' : $tblprod['nom_prod']; 
    empty($tblprod['type'])     ? $tblprod['type']    = '*' : $tblprod['type'];

    $tabValeur = array(
          'nom'  => "%".$tblprod['nom_prod']."%", 
          'type'   => "%".$tblprod['type']."%"
        );

    $sch = $this->Requete($strSQL, $tabValeur);
    
    return $sch;
    }
  
  function getArticle() {
    $strSQL="SELECT * FROM `produit` ORDER BY rand() limit 0,4 ";
    $tabValeur = array("*");
    return $this->Requete($strSQL,$tabValeur);
  }

  function getArticles() {
    
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
    
    $limite = 4;
    
    $debut = ($page - 1) * $limite;
    
    $strSQL="SELECT * FROM `produit` limit $limite offset $debut";
    $tabValeur = array("*");
    return $this->Requete($strSQL,$tabValeur);
  }

  function prodpanier($idprod){
    $strSQL="SELECT * FROM `produit` where num_prod = :num";
    $tabValeur = array(
      'num'  => $idprod['num_prod']
    );

    return $this->Requete($strSQL,$tabValeur);
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
      $tblcomment['pseudo'],
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