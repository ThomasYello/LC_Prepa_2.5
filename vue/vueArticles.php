<?php
 
 

 $prod = $tblprod[0];

 $pageCourante = $tblprod[1];

 $Nbprod = $tblprod[2];

 $Nbprod = intval($Nbprod);





?>
<section id="pageContent">
<br><br>

<article >
      <!-- ------------------------------------------- Formulaire Recherche  ---------------------------------------- -->
      <div class="search">
        <form action='index.php?action=Rechercher' method='POST'>

              <input type='text' name='nom_prod' id='nom_prod' placeholder="rechercher votre produit...">
              <input type='submit' name='action' value='Rechercher'>
          
        </form>
        </div>
    </article>
    
    <article >
      <div class="container">
          
      
        <?php
        
        
        echo "<tbody>";
          
          foreach ($prod as $produit) {
            
            
            echo "<form class='formproduit' action='index.php?action' method='POST'>";
            echo "<ul class='bloc'>".
                "<li> 
                  <center>
                  <input readonly type='text' name='num_prod' id='ide' value=".$produit['num_prod'].">
                  <img src='".$produit["img_prod"]."' alt='img_pdt' class='img_pdt'/>"
                  ."<p>".$produit['nom_prod']."</p> <br />"
                  ."<p><input type='number' name='qte' id='qte' value='1' min='1' max='100'>
                    <p>".$produit['prix_prod'] ."€ </p> <br />"
                  ."<p><input type='submit' name='action' value='Ajouter au panier' /> </p>
                  </center> 
                </li>".
            "</ul>";
            echo "</form>";
          }

          if (empty($prod)) {
            echo "<center>";
           echo "Aucun produit a été trouver a ce nom...";
           echo "</center>";
          }
        echo "</tbody>";
        ?>
        
        </div>
      

        </article>
       
        <div class="page">
        <center>
        <?php
       
        if ($recherche == 1){


        }else{

         if($_REQUEST['page'] !== 1) {
        
         

          echo '<a href="index.php?action=Prods&page='.($pageCourante-1).'">précèdent </a> ';
         }
            for($i=1;$i<=$Nbprod;$i++) {
              
              if($i == $pageCourante) {
                  echo $i.' ';
              } else {
                  
                  echo '<a href="index.php?action=Prods&page='.$i.'">'.$i.' </a> ';
                 
              }
               
            }
            if($_REQUEST['page'] !== $Nbprod) {

          echo '<a href="index.php?action=Prods&page='.($pageCourante+1).'">suivant </a> ';
            }

        }
        ?>
      <br/><br/>

      </center>
        </div>
        </section>