<?php

class Membre
{

    function __construct()
    {
        require_once "./modele/modele.php";
        $this->ds = new DB();
    }

    function getMemberById($idMembre)
    {
        $strSQL = "select * FROM admin WHERE id = ?";
        $paramTab = array($idMembre);
        $membreResultat = $this->ds->Requete($strSQL, $paramTab);
        return $membreResultat;
    }

    public function verifLogin($username, $password) {
        $passwordHash = sha1($password);
        $strSQL = "select * FROM admin WHERE login = ? AND mdp = ?";
        $paramTab = array($username, $passwordHash);
        $membreResultat = $this->ds->Requete($strSQL, $paramTab);
        if(!empty($membreResultat)) {
            $_SESSION["userId"] = $membreResultat;
            return true;
        }
    }

    public function verifUser($username, $password) {
        $passwordHash = sha1($password);
        $strSQL = "select * FROM utilisateur WHERE login = ? AND mdp = ?";
        $paramTab = array($username, $passwordHash);
        $membre = $this->ds->Requete($strSQL, $paramTab);
        if(!empty($membre)) {

            $_SESSION["user"] = $membre;
            return true;
        }
    }
    
}
