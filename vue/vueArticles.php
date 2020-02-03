<?php

$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$page = ($page <= 0 ? 1 :$page);
?>

<section id="pageContent">
<br><br>

<article>
      <!-- ------------------------------------------- Formulaire Recherche  ---------------------------------------- -->
      <form action='index.php?action=Rechercher' method='POST'>
        <table class="table_annuaire" >
          <tr> 
            <td> <input type='text' name='nom_prod' id='nom_prod'> </td>
            <td> <input type='text' name='type' id='type' ></td>
            <td colspan='2'> <input type='submit' name='action' value='Rechercher'></td>
          </tr>
        </table>
      </form>
    </article>
    
    <article>
      <center>
    
      <table class="table_annuaire">
        <?php
        
        
        echo "<tbody>";
          $tblprod = (empty($tblprod) ? $tblprod=array() : $tblprod);
          foreach ($tblprod as $produit) {
            echo "<form action='index.php?action=+' method='POST'>";
            echo 
            "<tr>" 
                ."<td><input readonly type='text' name='num_prod' id='ide' value=".$produit['num_prod']."></td>"
                ."<td>".$produit['img_prod']."</td>"
                ."<td>".$produit['nom_prod']."</td>"
                ."<td>".$produit['type'] ."</td>"
                ."<td>".$produit['prix_prod'] ."€ </td>"
                ."<td><input type='submit' name='action' value='+' /></td>".
            "</tr>";
            echo "</form>";
          }
        echo "</tbody>";
        ?>
        
      </table>
      
        </center>
        </article>
       
        <div class="page">
      <a href="?action=Prods&page=<?php echo $page - 1; ?>">page précédente</a>
      
      <a href="?action=Prods&page=<?php echo $page + 1; ?>">page suivante</a>
      <br/><br/>
        </div>
        </section>