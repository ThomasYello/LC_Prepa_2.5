<?php
if (!empty($_SESSION["userId"])) {
    require_once "./controleur/membre.php";
    $membre = new Membre();
    $membreResultat = $membre->getMemberById($_SESSION["userId"]);
    if(!empty($membreResultat[0]["nom_mbr"])) {
        $afficherNom = ucwords($membreResultat[0]["nom_mbr"]);
    } else {
        $afficherNom = $membreResultat[0]["pseudo_mbr"];
    }
}
include "vueHeader.php";
include "vueMenu.php";
?>
<section id="pageContent">
    <article>
        <br><h1> Annuaire des employés </h1>
    </article>
        <br><br>
        Bonjour <strong><?php echo $afficherNom; ?></strong>
        Pour sortir cliquez sur <a href="index.php?action=Admin" >Déconnexion</a>
        <br><br>
    </article>
    <table class="table_annuaire">
        <?php
        echo "<thead>";
          echo "<tr>";
            echo "<th>#</th>";
            echo "<th>Prénom</th>";
            echo "<th>Nom</th>";
            echo "<th>Téléphone</th>";
          echo "</tr>";
        echo "</thead>";
        
        echo "<tbody>";
          $tblEmp = (empty($tblEmp) ? $tblEmp=array() : $tblEmp);
          foreach ($tblEmp as $employe) {
            echo "<form action='index.php?action=Accueil' method='POST'>";
            echo 
            "<tr>" 
                ."<td>"."<input readonly type='text' name='ide' id='ide' value=".$employe['emp_id']."></td>" 
                ."<td>"."<input type='text' name='prenom' id='prenom' value='".$employe['emp_pnom'] . "'></td>" 
                ."<td>"."<input type='text' name='nom' id='nom' value='".$employe['emp_nom'] . "'></td>" 
                ."<td>"."<input type='text' name='tel' id='tel' maxlength='10' value='".$employe['emp_tel'] . "'></td>"
                ."<td>"."<input type='submit' name='action' value='Supprimer'></td>"
                ."<td>"."<input type='submit' name='action' value='Modifier'></td>".


            "</tr>";
            echo "</form>";
          }
        echo "</tbody>";
        ?>
      </table>
</section>
  <?php include "vueFooter.php"; ?>