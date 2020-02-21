​

<section id="pageContent">

  <article>

    <br><h1>Votre Panier</h1>

  </article>

​

  <article>
    <?php
   if (isset($_SESSION["panierprod"])) {

    ?>
  <table class="tbl-cart" cellpadding="10" cellspacing="1">

      <tbody>

        <tr>

          <th class="tbl_head" colspan="2">

            <h4 class="tbl_head_txt">Produit</h4>

          </th>

          <th class="tbl_head">

            <h4 class="tbl_head_txt">Type</h4>

          </th>

          <th class="tbl_head">

            <h4 class="tbl_head_txt">Id produit</h4>

          </th>

          <th class="tbl_head" width="5%">

            <h4 class="tbl_head_txt">Quantité</h4>

          </th>

          <th class="tbl_head" width="10%">

            <h4 class="tbl_head_txt">Unité</h4>

          </th>

          <th class="tbl_head" width="10%">

            <h4 class="tbl_head_txt">Prix</h4>

          </th>

          <th class="tbl_head" width="5%">

            <h4 class="tbl_head_txt">Supprimer</h4>

          </th>

        </tr>

​

      <?php

      if (isset($_SESSION["panierprod"])) {

          $total_quantity = 0;

          $total_price = 0;

      }

      foreach ($_SESSION["panierprod"] as $prod) {

          $prod_prix = $prod["qte"] * $prod["prix"];
          ?>

                <td colspan="2">

                  <div class="pdt_line">

                    <?php

                      echo '<img src="'.$prod["img"].'" alt="img_pdt" class="img_pdt"/>';

                      echo '<p class="txt_pdt">'.$prod["nom"].'</p>';

                    ?>

                  </div>

                </td>

                <td> <?php echo $prod["type"]; ?> </td>

                <td> <?php echo $prod["idprod"]; ?> </td>

                <td> <?php echo $prod["qte"]; ?> </td>

                <td> <?php echo $prod["prix"]." €"; ?> </td>

                <td> <?php echo number_format($prod_prix, 2) . " €"; ?> </td>

                <td><a href="index.php?action=deletep&idprod=<?php echo $prod["idprod"]; ?>"><img src="./img/delete.png" alt="Supprimer Produit" /></a></td>

              </tr>

          <?php

              

            $total_quantity += $prod["qte"];

                $total_price += ($prod["prix"] * $prod["qte"]);

            }

          ?>


        <tr>

          <td colspan="2" align="right">Total:</td>

          <td align="right" colspan="5"><strong><?php echo number_format($total_price, 2) . " €"; ?></strong></td>

          <td></td>

        </tr>

      </tbody>

    </table>

    <?php
    }else {

            echo "<div class='empty'>

            <h1> Votre panier est actuellement vide ! </h1>

           </div>";


}
?>

  </article>

</section>

