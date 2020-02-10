
<section id="pageContent">
  <article>
    <br><h1>Votre Panier</h1>
  </article>
  
  <article>
 <form action='index.php?action=commande' method='POST'>
     <?php

     
        if (isset($_SESSION["panier"])){
        

          
              echo "<tbody>";

            
                foreach ($_SESSION["panier"] as $produit) {
     
                  echo 
                  "<tr>" 
                      ."<td>".$produit."</td>"
                      

                  ."</tr>";
                  echo "</form>";
                }
                echo "</tbody>";

              }else {


                echo "<div class='empty'>

                        <h1> Votre panier est actuellement vide ! </h1>

                      </div>";


              }
    ?>

</form>
</article>

<tr>
            <td colspan='2'> <input type='submit' name='action' value='Commander' ></td>
            
</tr>


