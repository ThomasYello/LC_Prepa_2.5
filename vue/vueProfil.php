<section id="pageContent">

      <article class="ar_prof">

      <div class="container-profil">
        <center>
       <h1>Profil</h1>
        <br>

        <img src="./img/avatar1.png" alt="avatar">

        <div class="formProfil">
            
              
            
          <ul >
              
              <li> Nom : <b><?php echo $_SESSION['user'][0][1] ?></b> </li>
              <li> Prénom : <b><?php echo $_SESSION['user'][0][2] ?> </b></li>
              <li> Identifiant : <b><?php echo $_SESSION['user'][0][3] ?></b> </li>
              <li> Date de naissance : <b><?php echo $_SESSION['user'][0][4] ?></b> </li>
              <li> Téléphone : <b><?php  echo $_SESSION['user'][0][5] ?></b> </li>
                <a href="index.php?action=modifProfil"> Modifier mon profil </a>
          </ul>
          
        </div>
  </center>
      </div>
      </article>


</section>