<?php
if (!empty($_SESSION['userId']) ) {

?>
<section id="pageContent">
    <article>
        <br><h1> Annuaire des utilisateurs de Lc Prépa !</h1>
   
    <article>
    <table class="table_client">
        <?php
        echo "<thead>";
          echo "<tr>";
            echo "<th>#</th>";
             echo "<th>Nom</th>";
            
            echo "<th>Date de naissance</th>";
            
            echo "<th>Adresse email</th>";
          echo "</tr>";
        echo "</thead>";
        
        echo "<tbody>";
         
          
          foreach ($tblEmp as $client) {
            echo "<form action='index.php?action=Admin' method='POST'>";
            echo 
            "<tr>" 
                ."<td>"."<input readonly type='text' name='ide' id='ide' value=".$client['num']."></td>"
                ."<td>"."<input type='text' name='nom' id='nom' value='".$client['nom'] . "'></td>"  
                
                ."<td>"."<input type='text' name='date' id='date' value='".$client['date_nais'] . "'></td>" 
                
                ."<td>"."<input type='text' name='mail' id='mail'  value='".$client['email'] . "'></td>"
                ."<td>". "<input type='submit' name='action' value='Supprimer'></td>"
                ."<td>". "<input type='submit' name='action' value='Modifier'></td>".
            "</tr>";
            echo "</form>";
          }
        echo "</tbody>";
        ?>
      </table>
        </article>

      <acticle>
      <table>
      <tr>

 
        <td>
      <h2>Ajouter un produit</h2><br>
      <form action="index.php?action=Admin" method="POST">


          <label for="nomprod">Nom du produit</label><br>
          <input type="text" name="nom_prod" id="nom_prod" ><br><br>
          
          <label for="prenom">type</label><br>
          <input type="text" name="type" id="prenom" > <br><br>

          <label for="prix">Prix</label><br>
          <input type="numeric" name="prix" id="prix"><br><br>

          <label for="description">Description</label><br>
          <textarea id="desc" name="desc" rows="5" cols="33">

          </textarea><br><br>

          <label for="img">Image du produit</label><br>
          <input type="text" name="img" id="img"><br><br>
            
            
            <input  type="submit" name="action" value="Inserer">
            <br><br>

            
    </form>
    
</td>
</tr>
</table>
</article>

<?php

} else{

  header("Location: ./index.php?action=formLog");
 
 }
?>
</section>
