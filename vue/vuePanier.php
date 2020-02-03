<section id="pageContent">
  <article>
    <br><h1>Votre Panier</h1>
  </article>
  
  <article>
 <form action='index.php?action=commande' method='POST'>
     <?php
        
        
        echo "<tbody>";
          $tblprod = (empty($tblprod) ? $tblprod=array() : $tblprod);
          foreach ($tblprod as $produit) {
    
            echo 
            "<tr>" 
                ."<td><input readonly type='text' name='num_prod' id='ide' value=".$produit['num_prod']."></td>"
                ."<td>".$produit['img_prod']."</td>"
                ."<td>".$produit['nom_prod']."</td>"
                ."<td>".$produit['type'] ."</td>"
                ."<td>".$produit['prix_prod'] ."€ </td>"

            ."</tr>";
            echo "</form>";
          }
          echo "</tbody>";

    ?>

</form>
</article>

<tr>
            <td colspan='2'> <input type='submit' name='action' value='Commander' ></td>
            
</tr>


