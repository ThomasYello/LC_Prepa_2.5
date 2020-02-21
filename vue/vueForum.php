<?php



?>
<section id="pageContent">
    <article>
        <br><h1> Forum </h1>
    </article>


    

    <h3> Evolution Clio 1 Tuning 2015-2018 </h3><br>

    <video src="./video/Evolution_Clio_1_Tuning_2015-2018.mp4" alt="Evolution Clio 1 Tuning 2015-2018" controls></video><br> <br>

   

  

    <h3> voiture tuning 2 </h3><br>

    <video src="./video/voiture_tuning_2.mp4" alt="voiture tuning 2" controls></video><br> <br>

   </acticle>

    <hr>
    <article>

    <table>
    <tr>
    <th> Auteur </th>
    <th> sujet </th>
    <th> Commentaire </th>
    
    </tr>
    <tr>
    <?php
        
        
       
          $tblcomment = (empty($tblcomment) ? $tblcomment=array() : $tblcomment);
          foreach ($tblcomment as $comment) {
            echo "<form action='index.php?action=Accueil' method='POST'>";
            echo 
            "<tr>" 
                ."<td>".$comment['pseudo']."</td>"
                ."<td>".$comment['sujet']."</td>"
                ."<td>".$comment['comment'] ."</td>".
                
            "</tr>";
            echo "</form>";
          }
        ?>
    </tr>
    </table>
        

    <hr>

    
      <table>
      <tr>

        <td>
      <h2>commentaire :</h2><br>
      <form action="index.php?action=comment" method="POST">

          <label for="prenom">sujet</label><br>
          <input type="text" name="sujet" id="sujet" > <br><br>

          <label for="commentaire">Commentaire</label><br>
          <textarea id="com" name="com" cols="33">

          </textarea><br><br>
            
            <input  type="submit" name="action" value="comment">
            <br><br>

            
    </form>
    
</td>
</tr>
</table>
</article>

        
</section>