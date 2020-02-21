
<section id="pageContent">

      <article class="ar_prof">

      <div class="container-profil">
        <center>
       <h1>Profil</h1>
        <br>

        <img src="./img/avatar1.png" alt="avatar">
        <div class="formProfil">
            
              
            
          <ul >
          <form action='index.php?action=Modifier' method='POST'>

              <li> Nom : <input name='nom' type="text" value="<?php echo $_SESSION['user'][0][1] ?>"> </li>
              <li> Prénom : <input name='prenom' type="text" value="<?php echo $_SESSION['user'][0][2] ?>"></li>
              <li> Identifiant : <input name='id' type="text" value="<?php echo $_SESSION['user'][0][3] ?>"> </li>
              <li> Date de naissance : <input name='date' type="text" value="<?php echo date($_SESSION['user'][0][4]) ?>"> </li>
              <li> Téléphone : <input name='tel' type="text" value="<?php  echo $_SESSION['user'][0][5] ?>"> </li>
 
              <input type='submit' name='action' value='Modifier' >
          </form>
          </ul>
          
        </div>
  </center>
      </div>
      </article>


</section>